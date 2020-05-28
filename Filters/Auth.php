<?php namespace Scadaunity\Auth\Filters;


use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
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
        if (!$this->session->has('id')) {

            echo "Usuario sem sessão";
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
