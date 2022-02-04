<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function password()
    {
        return view('password');
    }

    public function table()
    {
        return view('tables');
    }

    public function layoutStatic()
    {
        return view('layout-static');
    }

    public function layoutSidenavLight()
    {
        return view('layout-sidenav-light');
    }

    public function charts()
    {
        return view('charts');
    }

    public function error401()
    {
        return view('401');
    }

    public function error404()
    {
        return view('404');
    }

    public function error500()
    {
        return view('500');
    }

    public function registerEmployee()
    {
        return view('register-employee');
    }
    
}
