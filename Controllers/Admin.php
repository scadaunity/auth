<?php

namespace Scadaunity\Auth\Controllers;

use CodeIgniter\Controller;
use Scadaunity\Auth\Models;

class Admin extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Models\UserModel();
    }

    /* Pages */

    public function index()
    {
        $data = array(
            'users'=> $this->userModel->findAll()
        );
        echo view('Scadaunity\Auth\Views\Template\header');
        echo view('Scadaunity\Auth\Views\Template\admin\navbar');
        echo view('Scadaunity\Auth\Views\Template\admin\sidebar');
        echo view('Scadaunity\Auth\Views\admin',$data);
        echo view('Scadaunity\Auth\Views\Template\footer');
    }
    public function users()
    {
        $data = array(
            'page'=>'Scadaunity\Auth\Views\admin\users'
        );
        echo view('Scadaunity\Auth\Views\admin\template\content',$data);
    }
}
