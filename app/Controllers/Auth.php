<?php namespace App\Controllers;
/**
 * Created by Scada Unity.
 * User: Paulo César Andrade Souza
 * Date: 18/04/2020
 * Time: 22:17
 */

use App\Models\UserModel;
use App\Models\AttemptModel;
use App\Models\VerifyModel;
use CodeIgniter\Services;



class Auth extends BaseController{

    protected $userModel;
    protected $attemptModel;
    protected $verifyModel;
    protected $email;
    protected $session;

    /* Configurações do modulo*/
    protected $tryLogin; // Define o numero de tentativas de login

    /* Construct */
    public function __construct(){
        $this->userModel = new UserModel();
        $this->attemptModel = new AttemptModel();
        $this->verifyModel = new VerifyModel();
        $this->email = Services::email();
        $this->session = Services::session();
        $this->tryLogin = 5;
    }

    /* Pages */

    //--------------------------------------------------------------------
    public function index(){
        echo '<h1>Index</h1>';
    }
    //--------------------------------------------------------------------
    public function login(){
        echo view('template/header');
        echo view('Auth/login');
        echo view('template/footer');
    }
    //--------------------------------------------------------------------
    public function register(){
        echo view('template/header');
        echo view('Auth/register');
        echo view('template/footer');
    }
    //--------------------------------------------------------------------
    public function forgot(){
        echo view('template/header');
        echo view('Auth/forgot');
        echo view('template/footer');
    }
    //--------------------------------------------------------------------
    public function confirmSignup(){
        echo view('template/header');
        echo view('Auth/confirm-signup-code');
        echo view('template/footer');
    }
    //--------------------------------------------------------------------

    /* Actions */

    //--------------------------------------------------------------------
    public function autenticate()
    {
        // Foi enviado email e senha?
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        if ($email == '' || $password == "") {
            //Não
            $this->session->setFlashdata(['alert' => 'Login invalido', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('login'));
        }

        // Procura usuario
        $user = $this->userModel->getByEmail($email);

        // Usuario encontrado?
        if (!is_array($user)){
            // Não
            $this->session->setFlashdata(['alert' => 'Login invalido', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('login'));
        }

        // Conta verificada
        if ($user['activation_code']==''){
            $this->session->setFlashdata(['alert' => 'Conta não verificada', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('verify'));
        }

        // Verifica o estado da conta
        if ($user['state']==0){
            $this->session->setFlashdata(['alert' => 'Conta esta bloqueada', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('login'));
        }

        //Valida o password
        $checkPassword = $this->userModel->checkPassword($password,$user['password']);
        if ($checkPassword==false){
            $data = [
                'email' => $user['email'],
                'ip'    => $this->request->getIPAddress()
            ];
            $this->attemptModel->save($data);
            $this->session->setFlashdata(['alert' => 'Login invalido<br>', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('login'));
        }

        // Verifica se a conta esta suspensa por tentativas de login
        if ($this->attemptModel->countAttempt($user['email']) >= $this->tryLogin) {
            $this->session->setFlashdata(['alert' => 'Numero de tentativas excedidas ' . $this->attemptModel->countAttempt($user['email']) . '<br>Sua conta foi suspensa, tente novamente daqui a 1 hora', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('login'));
        }

        // Verifica se o usuario pode fazer login

        $this->setSession($user);
        $this->deleteAttempt($user);
        return redirect()->to(base_url('Home'));
    }

    //--------------------------------------------------------------------
    public function logout(){
        session_destroy();
        return redirect()->to(base_url('login'));
    }

    //--------------------------------------------------------------------
    public function create(){
        /* Validação dos dados recebidos pelo post */
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $acept = $this->request->getPost('acept');

        if ($name == '' || $email == '' || $password == "" || $acept == false) {
            // Dados incorretos
            $this->session->setFlashdata(['alert' => 'Erro no preechimento dos dados', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('register'));
        }

        /* pesquisa pelo email no banco */
        $result = $this->userModel->checkEmail($email);

        /* Verifica se o email ja existe */
        if ($result) {
            /* O email ja existe */
            $this->session->setFlashdata(['alert' => 'Erro o email já existe', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('login'));
        } else {
            /* cria um novo usuario */
            $dataUser = array(
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'state' => 0
            );
            $result = $this->userModel->save($dataUser);
            if ($result) {
                $this->session->setFlashdata(['alert' => 'Sua conta foi criada com sucesso<br>Acesse seu email para ativar sua conta', 'alert-cls' => 'success']);
                return redirect()->to(base_url('login'));
            }
        }
    }

    //--------------------------------------------------------------------
    public function requestForgot(){

        /* Armazena os dados recebidos */
        $email = $this->request->getPost('email');

        /* Verifica se os dados foram enviados */
        if ($email == '') {
            return redirect()->to(base_url('Auth/forgot'));
        }

        /* Verifica se o email ja existe */

        $result = $this->userModel->checkEmail($email);

        if ($result) {
            // Usuario encontrado - envia a senha por email para a conta cadastrada
            $send = $this->sendEmailForgot($result['email'], $result['password']);

            if ($send) {
                return redirect()->to(base_url('Auth/login'));
            } else {
                return redirect()->to(base_url('Auth/forgot'));
            }

        } else {
            return redirect()->to(base_url('Auth/forgot'));
        }
    }

    /* Helpers */
    private function setSession($data)
    {
        // Defina aqui os dados do usuario que serão registrados na sessão
        $data = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => $data['avatar']
        );
        $this->session->set($data);
    }

    //--------------------------------------------------------------------

    public function checkSession()
    {
       return  $this->session->has('id');
    }

    //--------------------------------------------------------------------


    //--------------------------------------------------------------------

    // Retorna um array com as tentativas de login
    public function getAllAttempt($user)
    {
        // busca os dados na tabela attempt
        $result = $this->attemptModel->getAttempt($user['email']);

        // Verifica se foi retornado um array de dados
        if (is_array($result)) {
            return $result;
        }
    }

    //--------------------------------------------------------------------

    // Insere um registro na tabela de tentativas de login
    private function insertAttempt($user)
    {
        $dataUser = array(
            'email' => $user['email'],
            'ip' => $this->request->getIPAddress(),
        );

        if ($this->countAttempt() < $this->tryLogin) {
            $result = $this->attemptModel->save($dataUser);
        }
    }

    //--------------------------------------------------------------------

    // remove do registro na tabela de tentativas de login
    public function deleteAttempt($user)
    {
        if ($this->attemptModel->countAttempt($user['email']) > 0) {
            $data = $this->getAllAttempt($user);
            if (is_array($data)) {

                foreach ($data as $key => $value) {
                    $this->attemptModel->delete($value['id'], true);
                };
            }
        }

    }

    //--------------------------------------------------------------------

    // Insere um registro na tabela de tentativas de login
    private function insertVerify($code)
    {
        $data = array(
            'ip' => $this->request->getIPAddress(),
            'code' => $code,
        );
        $result = $this->verifyModel->save($data);

    }

    //--------------------------------------------------------------------

    // remove do registro na tabela de tentativas de login
    public function deleteVerify()
    {
        if ($this->countAttempt() > 0) {
            $data = $this->getAllAttempt();
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $this->attemptModel->delete($value['id'], true);
                };
            }
        }

    }

    //--------------------------------------------------------------------

    // Envia um email para o usuario poder resetar o password da conta
    private function sendEmailForgot($emailforgot, $password)
    {
        /* Configurações do smtp do gmail */
        $config = array(
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPUser' => 'scadaunity@gmail.com',
            'SMTPPass' => 'tzydskoqnuehhsag',
            'SMTPPort' => '465',
            'SMTPCrypto' => 'ssl',
            'mailPath' => '/usr/sbin/sendmail',
            'charset' => 'iso-8859-1',
            'wordwrap' => true,
        );
        $this->email->initialize($config);

        /* Configura o email */
        $this->email->setFrom('scadaunity@gmail.com', 'Scada Unity');
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

    //--------------------------------------------------------------------

    // Envia um email para o usuario confirmar a inscrição da conta
    public function sendEmailSignup($email)
    {
        $code = Rand ( 100000 , 999999 );
        /* Configura o modulo */
        $config = array(
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPUser' => 'scadaunity@gmail.com',
            'SMTPPass' => 'tzydskoqnuehhsag',
            'SMTPPort' => '465',
            'SMTPCrypto' => 'ssl',
            'mailPath' => '/usr/sbin/sendmail',
            'mailType' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => true,
        );
        $this->email->initialize($config);

        /* Configura o email */
        $this->email->setFrom('scadaunity@gmail.com', 'Scada Unity');
        $this->email->setTo($email);

        $this->email->setSubject('Codigo de acesso ao Scada Unity');
        $this->email->setMessage(
            '<div style="width: 300px;align-content: center">'
            .'<h3>E voce mesmo se cadastrando?</h3>'
            .'<p>Se for, use este codigo de verificacao</p>'
            .'<h1>'.$code.'</h1>'
            .'<p>Este codigo expira em dez minutos</p>'
            .'<small>Este e um e-mail automatico; Se voce recebeu por engano, nenhuma acao e necessaria.</small>'
            .'</div>'
        );

        $result = $this->email->send(false);
        if ($result) {
            $this->insertVerify($code);
            return true;
        } else {
            return false;
        }
    }
}
