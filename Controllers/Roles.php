<?php


namespace Scadaunity\Auth\Controllers;


use App\Controllers\BaseController;
use Scadaunity\Auth\Models\RolesModel;

class Roles extends BaseController
{
    public function __construct()
    {
        $this->rolesModel = new RolesModel();
    }

    public function index()
    {
        $data = array(
            'roles' => $this->rolesModel->findAll(),
            'js' => array(
                base_url('assets/lib/axios/axios.min.js'),
            )
        );

        echo view('Scadaunity\Auth\Views\Template\header',$data);
        echo view('Scadaunity\Auth\Views\Template\navbar',$data);
        echo view('Scadaunity\Auth\Views\Template\sidebar',$data);
        echo view('Scadaunity\Auth\Views\roles',$data);
        echo view('Scadaunity\Auth\Views\Template\footer',$data);
    }

    public function save(){
        $this->rolesModel->save();
    }
}