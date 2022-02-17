<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function principal()
    {
        return view('index');
    }
    public function logar(){
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $post['password'] = sha1($post['password']);
        $url = "http://localhost:8080/api/login";
        $payload = json_encode($post);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        // Use POST request
        curl_setopt($ch, CURLOPT_POST, true);

        // Set payload for POST request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set HTTP Header for POST request 
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload)
            )
        );
        
        //Json para Array 
        $funcioarios = json_decode(curl_exec($ch), true);
        
        if($funcioarios != ""){
            $_SESSION["user"]["name"] = $funcioarios["name"];
            $_SESSION['user']['id'] = $funcioarios["id"];
            return redirect()->to(site_url("home/principal"));
        }else{
            $this->session->setFlashdata('erro', 'Login ou senha inválida.'); 
            return redirect()->to(site_url("home/login"));
        }
        
    }

    public function logout(){ 
        session_destroy(); 
        return redirect()->to(site_url("home/index"));
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
        return view('employee');
    }
    
}
