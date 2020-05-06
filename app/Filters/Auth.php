<?php namespace App\Filters;



use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Services;

class Auth implements FilterInterface
{
    private $session;
    public function __construct()
    {
        $this->session = Services::session();
    }

    public function before(RequestInterface $request)
    {
        if(!$this->session->has('id')){

            return redirect()->to(base_url('Auth/login'));
            die();
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
