<?php namespace Scadaunity\Auth\Filters;


use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Services;

class Authorization implements FilterInterface
{
    private $session;

    public function __construct()
    {
        $this->session = Services::session();
    }

    public function before(RequestInterface $request)
    {
        if (!$this->session->has('token')) {

            $this->session->setFlashdata(['alert' => 'Token não encontrado', 'alert-cls' => 'danger']);
            return redirect()->to(base_url('auth/login'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }

}
