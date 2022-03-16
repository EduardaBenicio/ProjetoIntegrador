<?php

namespace App\Controllers;

class Funcionarios extends BaseController
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
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/clientes");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       

        //Json para Array 
        $view['funcionarios'] = json_decode(curl_exec($ch), true);

        
        return view('employee', $view);
    }

    public function registerEmployee($id = null)
    {
        if(!isset($id)){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cargo/all");
    
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //Json para Array 
            $cargos = json_decode(curl_exec($ch), true);


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/sector/all");
    
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Json para Array 
            $setores = json_decode(curl_exec($ch), true);
            //Dados do Back para serem enviados para View
            $res['cargos'] = $cargos;
            $res['setores'] = $setores;
            $res['dados'] = "";
        }else{
            

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$id}");

            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Json para Array 
            $funcionario = json_decode(curl_exec($ch), true);
            //Dados do Back para serem enviados para View
            $res['dados'] = $funcionario;
            
        }
       

        return view('register-employee', $res);
    }

    public function salvarApi()
    {
        $post = $this->request->getPost(null);
       
        if ($post['id'] == "") {
            
            
            $idCargo = (int) $post["cargo"];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cargo/{$idCargo}");
    
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Json para Array 
            $cargos = json_decode(curl_exec($ch), true);

            unset($post['setores']);
            unset($post['id']);
            $post['cargo'] = $cargos;

            
            $post['dataNasc'] = date('d/m/Y', strtotime($post['dataNasc']));
            $post['dataIngresso'] = date('d/m/Y', strtotime($post['dataIngresso']));
            $post['dataIngressoCargo'] = date('d/m/Y', strtotime($post['dataIngressoCargo']));
            $post['password'] = sha1($post['password']);
            $post['usuario']['username'] = $post['user'];
            $post['usuario']['password'] = $post['password'];
            $post['usuario']['authorities'] = $post['authorities'];
            $post['dataUltimoPag'] = 0;
            $post['valorDevidoAtual'] = 0;
            $post['decimoTerceiro'] = 0;
            $post['inss'] = 0;

            unset($post['user']);
            unset($post['password']);
            unset($post['authorities']);

           
            //$payload = json_encode($post);
            
            $cookies = $this->getToken();


            #precisamos do token e da sessao
            #isso porque, provavelmente o axios ja lida com a sessão automaticamente
            #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
            #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
            $token = $cookies["XSRF-TOKEN"];
            $jsession = $cookies["JSESSIONID"];
            
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/salvarcliente");
            
            
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
                "Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession", #nao sei porque, precisa dessa linha
                "X-XSRF-TOKEN: $token",                            #junto dessa outra, tem que ter as duas.
                'Content-Type: application/json',
                #'Authorization: Basic '. base64_encode("eduarda:teste"), #essa seria outra forma de passar usuario e senha, funciona, mas a normal funciona também
                #eu testei essa, porque achei que o header estivesse sobrescrevendo a senha.
            );
            
            // Set HTTP Header for POST request 
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            //Json para Array 
            $resultado = json_decode(curl_exec($ch), true);
            

            //Json para Array 
            $view['funcionario'] = $resultado;
            $view['alert'] = 2;
            $view['dias'] = strtotime($post['dataIngresso']) - strtotime(date('d/m/Y'));

            return view('dashboard-employee', $view);
        } else {
        
            $id = $post['id'];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$id}");

            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Json para Array 
            $funcionario = json_decode(curl_exec($ch), true);

           

            //Dados do Back para serem enviados para View
            $post['cargo'] = $funcionario['cargo'];
            $post['dataUltimoPag'] = $funcionario['dataUltimoPag'];
            $post['dataIngresso'] = $funcionario['dataIngresso'];
            $post['valorDevidoAtual'] = $funcionario['valorDevidoAtual'];
            $post['dataIngressoCargo'] = $funcionario["dataIngressoCargo"];
            $post['dataNasc'] = date('d/m/Y', strtotime($post['dataNasc']));
            $post['password'] = sha1($post['password']);
            $post['usuario']['id'] = $post['id_user'];
            $post['usuario']['username'] = $post['user'];
            $post['usuario']['password'] = $post['password'];
            $post['usuario']['authorities'] = $post['authorities'];
            
            unset($post['user']);
            unset($post['password']);
            unset($post['authorities']);
            
            //$payload = json_encode($post);

            $cookies = $this->getToken();


            #precisamos do token e da sessao
            #isso porque, provavelmente o axios ja lida com a sessão automaticamente
            #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
            #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
            $token = $cookies["XSRF-TOKEN"];
            $jsession = $cookies["JSESSIONID"];
            
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/salvarcliente");
            
            
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
                "Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession", #nao sei porque, precisa dessa linha
                "X-XSRF-TOKEN: $token",                            #junto dessa outra, tem que ter as duas.
                'Content-Type: application/json',
                #'Authorization: Basic '. base64_encode("eduarda:teste"), #essa seria outra forma de passar usuario e senha, funciona, mas a normal funciona também
                #eu testei essa, porque achei que o header estivesse sobrescrevendo a senha.
            );
            
            // Set HTTP Header for POST request 
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            //Json para Array 
            $resultado = json_decode(curl_exec($ch), true);
            
            

            //Json para Array 
            $view['funcionario'] = $resultado;
            $view['dias'] = strtotime($funcionario['dataUltimoPag']) - strtotime(date('d/m/Y'));
            
           

            return view('dashboard-employee', $view);
        }
    }

    public function dashboardEmployee($idFuncionario)
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

        //Juinin e suas gambiarras 
        if(isset($funcionario['dataIngresso']) && isset($funcionario['dataIngressoCargo'])){
            $dataIngresso = $funcionario['dataIngresso'];
            $dataAtual = date('d/m/Y');
            $dataIngresso = explode('/',$dataIngresso);
            $dataAtual = explode('/',$dataAtual);
            $dataIng = strtotime("$dataIngresso[2]-$dataIngresso[1]-$dataIngresso[0]");
            $dataAtu = strtotime("$dataAtual[2]-$dataAtual[1]-$dataAtual[0]");
            $diasIngressado = ($dataAtu - $dataIng)/86400;

            $dataCargo = $funcionario['dataIngressoCargo'];
            $dataCargo = explode('/',$dataCargo);
            $dataCar = strtotime("$dataCargo[2]-$dataCargo[1]-$dataCargo[0]");
            $diasIngressadoNoCargo = ($dataAtu - $dataCar)/86400;

            $res['diasIngressado'] =  $diasIngressado;
            $res['diasIngressadoNoCargo'] =  $diasIngressadoNoCargo;
        }
        
        $res['dias'] = strtotime($funcionario['dataUltimoPag']) - strtotime(date('d/m/Y'));
           
           // $dias = floor($diferenca / (60 * 60 * 24)); 
        return view('dashboard-employee', $res);
    }

    public function deleteFuncionario($id)
    {


        $cookies = $this->getToken();


        #precisamos do token e da sessao
        #isso porque, provavelmente o axios ja lida com a sessão automaticamente
        #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
        #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        
        $url = "http://service-api-rh.herokuapp.com/api/cliente/delete/{$id}";
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

        return redirect()->to(site_url("Funcionarios/index"));
    }

    public function promocao($id){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$id}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        $res['funcionario'] = $funcionario;
        

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/promocao/user/{$id}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        $res['promocoes'] = $funcionario;

     

        return view('promocoes', $res);


    }

    public function promover($id){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/sector/all");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $view['setor'] = json_decode(curl_exec($ch), true); 

        $view['id'] = $id;
        
        return view('register-promocao', $view);

    }

    public function cargosDoSetor(){
        
        $idSetor = filter_input(INPUT_POST, 'idSetor');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cargo/find/{$idSetor}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $view['cargo'] = curl_exec($ch); 


        return $view['cargo'];
    }

    public function salvarPromocao(){
       
        $post = $this->request->getPost(null);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$post['id_user']}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   

        //Json para Array 
        $view['funcionario'] = json_decode(curl_exec($ch), true);
        
        if($view['funcionario']["usuario"]['authorities'][0]['authority'] = "ROLE_ADMIN"){
            
            $view['funcionario']["usuario"]['authorities'] = "ROLE_ADMIN,ROLE_USER";
        }else{
            $view['funcionario']["usuario"]['authorities'] = "ROLE_USER";
        }


        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cargo/{$post['cargo']}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Json para Array 
        $view['cargoNovo'] = json_decode(curl_exec($ch), true);
 
        $data['funcionario'] = $view['funcionario'];
        $data['cargoAntigo'] = $view['funcionario']['cargo'];
        $data['cargoNovo'] = $view['cargoNovo'];
        $data['dataDaMudanca'] = date('d/m/Y');



     
        $cookies = $this->getToken();


        #precisamos do token e da sessao
        #isso porque, provavelmente o axios ja lida com a sessão automaticamente
        #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
        #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];
        
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/promocao/save");
        
        
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        
        
        
        // Use POST request
        $postJson = json_encode($data);
        #a gente realmente tem que converter para json, mas isso é só porque no cabeçalho de requisição está: application/json
        #normalmente é application/x-www-form-urlencoded aí a gente só passa eles como se estivesse passando via get
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postJson);
        
        
        
        $headers = array(
            "Cookie: XSRF-TOKEN=$token; JSESSIONID=$jsession", #nao sei porque, precisa dessa linha
            "X-XSRF-TOKEN: $token",                            #junto dessa outra, tem que ter as duas.
            'Content-Type: application/json',
            #'Authorization: Basic '. base64_encode("eduarda:teste"), #essa seria outra forma de passar usuario e senha, funciona, mas a normal funciona também
            #eu testei essa, porque achei que o header estivesse sobrescrevendo a senha.
        );
        
        // Set HTTP Header for POST request 
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$post['id_user']}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         //Json para Array 
         $resultado = json_decode(curl_exec($ch), true);
         
         if($resultado["usuario"]['authorities'][0]['authority'] = "ROLE_ADMIN"){
            
            $resultado["usuario"]['authorities'] = "ROLE_ADMIN,ROLE_USER";
        }else{
            $resultado["usuario"]['authorities'] = "ROLE_USER";
        }

       

        return redirect()->to(site_url("Funcionarios/promocao/{$resultado['id']}"));
           
       // echo "<pre>";
        // print_r($resultado['funcionario']['id']);
        // die();
        
    }
}
