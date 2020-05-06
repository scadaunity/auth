<?php namespace App\Controllers;

class Home extends BaseController
{
    /* Construct */
    public function __construct()
    {

    }

    public function index()
    {
        echo view('template/header');
        echo view('template/navbar');
        echo view('template/sidebar');
        echo view('Home/home');
        echo view('template/footer');
    }
}
