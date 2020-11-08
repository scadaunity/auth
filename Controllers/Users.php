<?php

namespace Scadaunity\Auth\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use Scadaunity\Auth\Models;

class Users extends BaseController
{

    public function __construct()
    {
        $this->userModel = new Models\UserModel();
        $uri = service('uri');
    }

    /* Pages */

    public function index()
    {
        $data = array(
            'users' => $this->userModel->findAll(),
            'js' => array(
                base_url('assets/lib/axios/axios.min.js'),
            )
        );

        $this->template('Scadaunity\Auth\Views\users', $data);

    }

    public function view(int $id)
    {
        $data = array(
            'users' => $this->userModel->find($id),
            'js' => array(
                base_url('assets/lib/axios/axios.min.js'),
            )
        );

        $this->template('Scadaunity\Auth\Views\users_view', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        d($data);

        /* pesquisa pelo email no banco */
        $result = $this->userModel->save($data);
        return redirect()->to(base_url('admin/users'));

    }

    public function findAll(){
        echo (json_encode($this->userModel->findAll()));
    }

    public function teste(){
        echo 'teste';
    }
}
