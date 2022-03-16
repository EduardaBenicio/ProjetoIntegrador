<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getToken(){
        $ch = curl_init('http://service-api-rh.herokuapp.com/api/cargo/all');
        #para pegar o token ja tem que se autenticar
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        #estava faltando
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
        // get headers too with this line
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        //print_r($result);#aqui eu confirmei que esta autenticado, antes estava dando falha
        // get cookie
        // multi-cookie variant contributed by @Combuster in comments
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
        $cookies = array();
        foreach ($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }
        return $cookies;#retorna o cookie inteiro, pois vamos precisar
    }

    public function index()
    {
        return view('login');
    }
    public function principal()
    {
        return view('index');
    }
    public function logar(){

        $post = $this->request->getPost(null);
        $post['password'] = sha1($post['password']);
       

       
       
        #precisamos do token e da sessao
        #isso porque, provavelmente o axios ja lida com a sessão automaticamente
        #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
        #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/login?username={$post['user']}&password={$post['password']}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

       
       
        //Json para Array 
        $funcioarios = json_decode(curl_exec($ch), true);
      
       
        if(isset($funcioarios["name"])){
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
