<?php namespace App\Controllers;

class Home extends BaseController
{
    /* Construct */
    public function __construct()
    {

    }

    public function index()
    {
        echo view('Home/template/header');
        echo view('Home/template/navbar');
        echo view('Home/template/sidebar');
        echo view('Home/home');
        echo view('Home/template/footer');
    }

    public function user()
    {
        echo view('Home/template/header');
        echo view('Home/template/navbar');
        echo view('Home/template/sidebar');
        echo view('Home/user');
        echo view('Home/template/footer');
    }

    //--------------------------------------------------------------------

}
