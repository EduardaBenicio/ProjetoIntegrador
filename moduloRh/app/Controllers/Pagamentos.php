<?php

namespace App\Controllers;

class Pagamentos extends BaseController
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

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/payment/payments");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $view['pagamentos'] = json_decode(curl_exec($ch), true);



        return view('payment', $view);
    }

    public function registerPayment($idFuncionario)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$idFuncionario}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        $res['funcionario'] = $funcionario;


        return view('register-payment', $res);
    }

    public function salvarApi()
    {
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $id = (int) $post['id'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$id}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        unset($post['id']);
        unset($funcionario['usuario']['enabled']);
        unset($funcionario['usuario']['accountNonExpired']);
        unset($funcionario['usuario']['credentialsNonExpired']);
        unset($funcionario['usuario']['accountNonLocked']);
        
        if($funcionario['funcionario']["usuario"]['authorities'][0]['authority'] = "ROLE_ADMIN"){
            
            $funcionario['funcionario']["usuario"]['authorities'] = "ROLE_ADMIN,ROLE_USER";
        }else{
            $funcionario['funcionario']["usuario"]['authorities'] = "ROLE_USER";
        }

        $post['funcionario'] = $funcionario;
        $post['date_payment'] = date('d/m/Y');

        $cookies = $this->getToken();
        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];
       
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/payment/savePayment");
        
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        
        // Use POST request
        $postJson = json_encode($post);

      
        #a gente realmente tem que converter para json, mas isso é só porque no cabeçalho de requisição está: application/json
        #normalmente é application/x-www-form-urlencoded aí a gente só passa eles como se estivesse passando via get
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        
        $headers = array(
            "Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession", 
            "X-XSRF-TOKEN: $token",                          
            'Content-Type: application/json',
           
        );
        
        // Set HTTP Header for POST request 
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

       

        //Json para Array 
        $view['funcionario'] = $funcionario;
        $view['alertPayment'] = 1;


        return view('dashboard-employee', $view);
    }

    public function deletePayment($id)
    {


        $cookies = $this->getToken();


        #precisamos do token e da sessao
        #isso porque, provavelmente o axios ja lida com a sessão automaticamente
        #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
        #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        
        $url = "http://service-api-rh.herokuapp.com/api/payments/payment/delete/$id";
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        //curl_setopt($ch, CURLOPT_URL, );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
        
        $headers = array(
            "Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession", #nao sei porque, precisa dessa linha
            "X-XSRF-TOKEN: $token",                            #junto dessa outra, tem que ter as duas.
            //'Content-Type: application/json',
            #'Authorization: Basic '. base64_encode("eduarda:teste"), #essa seria outra forma de passar usuario e senha, funciona, mas a normal funciona também
            #eu testei essa, porque achei que o header estivesse sobrescrevendo a senha.
        );
        
        // Set HTTP Header for POST request 
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);;      
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("pagamentos/index"));
    }
}
