<?php

namespace Scadaunity\Auth\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use Scadaunity\Auth\Models;

class Admin extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Models\UserModel();
    }

    /* Pages */

    public function index()
    {
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\Template\navbar');
        echo view('Scadaunity\Auth\Views\Template\sidebar');
        echo view('Scadaunity\Auth\Views\admin');
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

    public function users()
    {
        $data = array(
            'users' => $this->userModel->findAll(),
        );

        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\Template\navbar');
        echo view('Scadaunity\Auth\Views\Template\sidebar');
        echo view('Scadaunity\Auth\Views\users',$data);
        echo view('Scadaunity\Auth\Views\Template\footer');
    }

}
