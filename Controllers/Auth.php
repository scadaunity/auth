<?php
/**
 * Scada Unity - Auth
 *
 * Sistema de autenticação Codeigniter 4
 *
 * Copyright (c) 2019 Scada Unity
 *
 * @package    ScadaUnity\Auth
 * @author     Paulo César Andrade Souza
 * @copyright  2019-2020 Scada Unity
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://scadaunity.tk
 * @since      Version 2.0.0
 * @filesource
 */

namespace Scadaunity\Auth\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Services;
use Firebase\JWT\JWT;
use Scadaunity\Auth\Models\AttemptModel;
use Scadaunity\Auth\Models\UserModel;

/**
 * Class Auth
 * @package Scadaunity\Auth\Controllers
 */
class Auth extends BaseController
{
    /**
     * @var UserModel
     */
    protected $userModel;
    /**
     * @var AttemptModel
     */
    protected $attemptModel;
    protected $email;
    /**
     * @var CodeIgniter\Config
     */
    protected $session;
    //protected $config;

    /**
     * Define o numero de tentativas de login para bloquear conta
     *
     * @var int
     */
    protected $tryLogin = 5;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->attemptModel = new AttemptModel();
        $this->session = Services::session();
        $this->email = Services::email();

    }

    //--------------------------------------------------------------------
    //--------------------------------------------------------------------
    // Pages
    //--------------------------------------------------------------------

    /**
     *
     */
    public function index()
    {
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\login');
        echo view('Scadaunity\Auth\Views\Template\footer');

    }

    public function login()
    {
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\login');
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

    public function register()
    {
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\register');
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

    public function forgot()
    {
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\forgot');
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

    public function reset()
    {
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\reset');
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

    /* Actions */
    //--------------------------------------------------------------------
    public function verify(array $user = null)
    {
        if ($user == null) 
        {
            $this->session->setFlashdata(['alert' => 'Dados invalidos', 'alert-cls' => 'danger']);
            return $this->login();
        }

        $data = array(
            'user' => $user,
        );

        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\verify', $data);
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

    //--------------------------------------------------------------------
    public function autenticate()
    {
        /** Valida o post */
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if ($email == '' || $password == '') {
            $this->session->setFlashdata(['alert' => 'Login invalido', 'alert-cls' => 'danger']);
            return redirect()->to('login');
        }

        /** Procura usuario */
        $user = $this->userModel->getByEmail($email);
        if (!is_array($user)) 
        {
            $this->session->setFlashdata(['alert' => 'Login invalido', 'alert-cls' => 'danger']);
            return redirect()->to('login');
        }

        /** Email verificado */
        if ($user['email_verified'] == 0) 
        {
            $this->session->setFlashdata(['alert' => 'Verifique sua caixa de email para <bold>ativar sua conta</bold>', 'alert-cls' => 'danger']);
            return $this->verify($user);
        }

        /** Verifica o estado da conta */
        if ($user['state'] == 0) 
        {
            $this->session->setFlashdata(['alert' => 'Sua Conta esta suspensa, entre em contato com o administrador', 'alert-cls' => 'danger']);
            return redirect()->to('login');
        }

        /** Verifica se a conta esta suspensa por tentativas de login */
        if ($this->attemptModel->countAttempt($user['email']) >= $this->tryLogin) {
            $this->session->setFlashdata(['alert' => 'Numero de tentativas excedidas ' . $this->attemptModel->countAttempt($user['email']) . '<br>Sua conta foi suspensa, tente novamente daqui a 1 hora', 'alert-cls' => 'danger']);
            return redirect()->to('login');
        }

        /** Email verificado */
        if ($user['email_verified'] == 0) {
            $this->session->setFlashdata(['alert' => 'Verifique sua caixa de email para <bold>ativar sua conta</bold>', 'alert-cls' => 'danger']);
            return $this->verify($user);
        }

        // Conta verificada
        if ($user['token'] == '') {
            $this->session->setFlashdata(['alert' => 'Conta não verificada', 'alert-cls' => 'danger']);
            return $this->verify();
        }



        //Valida o password
        $checkPassword = $this->userModel->checkPassword($password, $user['password']);
        if ($checkPassword == false) {
            $data = [
                'email' => $user['email'],
                'ip' => $this->request->getIPAddress()
            ];
            $this->attemptModel->save($data);
            $this->session->setFlashdata(['alert' => 'Login invalido', 'alert-cls' => 'danger']);
            return redirect()->to('login');
        }


        
        // Cria o token
        $token = $this->createToken($user);

        // Cria a sessão
        $createSession = $this->setSession($user, $token);
        if (!$createSession){
            $this->session->setFlashdata(['alert' => 'Falha ao criar a sessão<br>Tente novamente', 'alert-cls' => 'danger']);
            return redirect()->to('login');
        }

        // Limpa as tentativas de login se existir
        $clearAttempt = $this->deleteAttempt($user);
        $this->deleteAttempt($user);
        if ($this->checkSession()){
            return redirect()->to(base_url('Intro'));
        } else{
            $this->session->setFlashdata(['alert' => 'Falha ao criar a sessão<br>Tente novamente', 'alert-cls' => 'danger']);
            return $this->login();
        }
    }

    //--------------------------------------------------------------------

    /**
     * @param $data
     * @return bool
     */
    private function setSession($data, $token='null')
    {
        // Defina aqui os dados do usuario que serão registrados na sessão
        $data = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'token'=>$token
        );
        // Cria a sessão
        $this->session->set($data);

        // Verifica se a sessão foi criada
        if ($this->checkSession()) {
            return true;
        } else {
            return false;
        }
    }

    //--------------------------------------------------------------------

    public function checkSession()
    {
        return $this->session->has('id');
    }

    //--------------------------------------------------------------------

    public function deleteAttempt($user)
    {
        if ($this->attemptModel->countAttempt($user['email']) > 0) {
            $data = $this->getAllAttempt($user);
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $this->attemptModel->delete($value['id'], true);
                }
            }
        }

    }

    //--------------------------------------------------------------------

    public function getAllAttempt($user):array
    {
        // busca os dados na tabela attempt
        $result = $this->attemptModel->getByEmail($user['email']);

        // Verifica se foi retornado um array de dados
        if (is_array($result)) {
            return $result;
        }
    }

    /* Helpers */

    public function logout()
    {
        session_destroy();
        return redirect()->to(base_url('auth/login'));
    }

    //--------------------------------------------------------------------

    public function create()
    {
        /* Validação dos dados recebidos pelo post */
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $acept = $this->request->getPost('acept');

        if ($name == '' || $email == '' || $password == "" || $acept == false) {
            // Dados incorretos
            $this->session->setFlashdata(['alert' => 'Erro no preechimento dos dados', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('auth/register'));
        }

        /* pesquisa pelo email no banco */
        $result = $this->userModel->getByEmail($email);

        /* Verifica se o email ja existe */
        if ($result) {
            /* O email ja existe */
            $this->session->setFlashdata(['alert' => 'Erro o email já existe<br>Faça o login ou cadastre-se usando um e-mail diferente', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('auth/login'));
        } else {
            /* cria um novo usuario */
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $activationCode = Rand(100000, 999999);
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => $hashPassword,
                'state' => 0,
                'avatar' => 0,
                'token' => $activationCode
            );
            $result = $this->userModel->save($data);
            if ($result) {
                $sendEmail = $this->sendEmailSignup($email, $activationCode);
                if ($sendEmail) {
                    $this->session->setFlashdata(['alert' => 'Sua conta foi criada com sucesso<br>Foi enviado um e-mail para ' . $email . ' com instruções para ativar sua conta', 'alert-cls' => 'success']);
                    return redirect()->to(base_url('auth/verify'));
                } else{
                    echo 'Falha ao enviar email';
                }

            }
        }
    }

    //--------------------------------------------------------------------

    public function sendEmailSignup(string $email, string $validationCode): bool
    {
        /* Configura o email */
        $this->email->setFrom('scadaunity@gmail.com', 'Scada Unity');
        $this->email->setTo($email);

        $this->email->setSubject('Bem vindo(a) ao Scada Unity - Ativação de conta');
        $this->email->setMessage(
            '<div style="width: 300px;align-content: center">'
            . '<h3>E voce mesmo se cadastrando?</h3>'
            . '<p>Se for, use este codigo de verificacao</p>'
            . '<h1>' . $validationCode . '</h1>'
            . '<a href="localhost:8080/Auth/activationAccount">Ativar minha conta</a>'
            . '<p>Este codigo expira em dez minutos</p>'
            . '<small>Este e um e-mail automatico; Se voce recebeu por engano, nenhuma acao e necessaria.</small>'
            . '</div>'
        );

        $result = $this->email->send(false);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //--------------------------------------------------------------------

    /**
     * Envia email com a senha
     */

    public function requestForgot()
    {

        /* Valida os dados do post */
        $email = $this->request->getPost('email');
        if ($email == '') {
            $this->session->setFlashdata(['alert' => 'Digite o email para recurar sua conta', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('Auth/forgot'));
        }

        /* Verifica se o email ja existe */
        $user = $this->userModel->getByEmail($email);
        if ($user) {
            // Usuario encontrado - envia a senha por email para a conta cadastrada
            $send = $this->sendEmailForgot($user['email'], $user['password']);

            if ($send) {
                return redirect()->to(base_url('Auth/login'));
            } else {
                return redirect()->to(base_url('Auth/forgot'));
            }

        } else {
            return redirect()->to(base_url('Auth/forgot'));
        }
    }

    /**
     * Envia email com a senha para recuperar a conta
     */
    private function sendEmailForgot($emailforgot, $password)
    {
        /* Configura o email */
        $this->email->setFrom('acme@gmail.com', 'Scada Unity');
        $this->email->setTo($emailforgot);

        $this->email->setSubject('Recuperar sua senha');
        $this->email->setMessage('Sua senha é. ' . $password);

        $result = $this->email->send(false);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Ativa a conta criada com o codigo enviado por email
     */
    public function activateAccount()
    {
        /* Armazena os dados recebidos */
        $email = $this->request->getPost('email');
        $activationCode = $this->request->getPost('activationCode');

        /* Verifica se os dados foram enviados */
        if ($email == '' || $activationCode == '') {
            $this->session->setFlashdata(['alert' => 'Erro!<br>Todos os campos são obrigatórios', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('Auth/verify'));
        }
        $user = $this->userModel->getByEmail($email);
        if ($user) {
            //echo 'Usuario encontrado '.$user['activation_code'];
            if ($user['token'] === $activationCode) {
                $data = array(
                    'id' => $user['id'],
                    'state' => 1,
                    'email_verified' => 1
                );
                $result = $this->userModel->save($data);
                if ($result) {
                    $this->setSession($user);
                    $this->session->setFlashdata(['alert' => 'Bem vindo !<br>Estamos felizes que se juntou ao Scada Unity', 'alert-cls' => 'success']);
                    return redirect()->to(base_url('home'));

                }

            } else {
                $this->session->setFlashdata(['alert' => 'Erro!<br>Codigo invalido ou vencido', 'alert-cls' => 'danger']);
                return redirect()->to(base_url('Auth/verify'));
            }
        }
    }

    public function createToken(array $user) {
        $key = Services::getSecretKey();

        $payload = array(
            'exp'=>(new \DateTime("now"))->getTimestamp(),
            'uid'=>$user['id'],
            'email'=>$user['email']
        );
        $token = JWT::encode($payload, $key,);

        return $token;

    }
}
