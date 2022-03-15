<?php 

namespace App\Controllers;

use DateTime;

class FeriasController extends BaseController
{
    public function getToken(){
        $ch = curl_init('http://service-api-rh.herokuapp.com/api/sector/all');
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

    public function index(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/ferias/all");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Json para Array 
        $view['ferias'] = json_decode(curl_exec($ch), true);
        
        //print_r($view);
        //die();
        return view('ferias', $view);   
    }
    public function indexDeUnicoFuncionario($id = null){
        if(isset($id)){

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/ferias/funcionario/{$id}");
    
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Json para Array 
            $view['ferias'] = json_decode(curl_exec($ch), true);

            //verificar funcionario existe
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$id}");
    
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //Json para Array 
            $funcionario = json_decode(curl_exec($ch), true);

            if($funcionario == null){
                return view('ferias-404');
            }
            //Dados do Back para serem enviados para View
            //$res['funcionarios'] = $clientes;
            //$res['dados'] = "";
            $view['funcionario'] = $id;
        }
        //print_r($res);
        //die();

        return view('ferias-funcionario',$view);
    }
    public function saveFerias($id = null){
        if(!isset($id)){
            return view('ferias-404');
        }else{
           
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
            curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$id}");
    
            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $funcionario = json_decode(curl_exec($ch), true);
            //Caso funcionario não existir
            if($funcionario == null){
                return view('ferias-404');
            }

            $res['dados'] = $funcionario;
        }
        
        return view('register-ferias', $res);
    }
    public function salvarFerias(){
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $post['inicio_das_ferias'] = date('d/m/Y', strtotime($post['inicio_das_ferias']));
        $post['fim_das_ferias'] = date('d/m/Y', strtotime($post['fim_das_ferias']));
        
        //Juinin gambiarras
        $inicio = explode('/',$post['inicio_das_ferias']);
        $fim = explode('/',$post['fim_das_ferias']);
            //colocando no padrão americano
        $dataInicio = strtotime("$inicio[2]-$inicio[1]-$inicio[0]");
        $dataFinal = strtotime("$fim[2]-$fim[1]-$fim[0]");
            //Calcula a quantidade de dias
        $dias = ($dataFinal - $dataInicio)/86400 +1;
            //Se o total de dia for menor que 1 retorna erro
            if($dias < 1){
                $this->session->setFlashdata('erro', 'Data de inicio tem que ser anterior à data final.');
                return redirect()->to(site_url("FeriasController/saveFerias/{$post["id"]}"));
            }
        $idUser = (int) $post["id"];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/cliente/{$idUser}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $payload = json_encode($post);

        //Json para Array 
        $cliente = json_decode(curl_exec($ch), true);
        $post['funcionario'] = $cliente;
        
        if($post['funcionario']["usuario"]['authorities'][0]['authority'] = "ROLE_ADMIN"){
            
            $post['funcionario']["usuario"]['authorities'] = "ROLE_ADMIN,ROLE_USER";
        }else{
            $post['funcionario']["usuario"]['authorities'] = "ROLE_USER";
        }

      


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
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/ferias/save");
        
        
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
        $this->session->setFlashdata('success', 'Cadastrado com sucesso!.');
        return redirect()->to(site_url("FeriasController/indexDeUnicoFuncionario/{$idUser}"));
    }



    public function salvarEditFerias($id = null){
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $post['inicio_das_ferias'] = date('d/m/Y', strtotime($post['inicio_das_ferias']));
        $post['fim_das_ferias'] = date('d/m/Y', strtotime($post['fim_das_ferias']));
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "eduarda" . ":" . "teste");
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/ferias/{$id}");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        
        $ferias = json_decode(curl_exec($ch), true);
        $post['id'] = $ferias['id']; 
        $post['funcionario'] = $ferias['funcionario'];

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
        curl_setopt($ch, CURLOPT_URL, "http://service-api-rh.herokuapp.com/api/ferias/update");
        
        
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

        return redirect()->to(site_url("FeriasController/index"));
    }




    public function deleteFerias($id,$idUser = null){
        $cookies = $this->getToken();


        #precisamos do token e da sessao
        #isso porque, provavelmente o axios ja lida com a sessão automaticamente
        #aí no código do Iramar não deu pra ver isso, mas o CURL é muito simples, não faz isso
        #tem outras bibliotecas PHP q fazem o controle do cookie automaticamente, acho que o Guzzle faz
        $token = $cookies["XSRF-TOKEN"];
        $jsession = $cookies["JSESSIONID"];

        
        $url = "http://service-api-rh.herokuapp.com/api/ferias/delete/{$id}";
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
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
   
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);
        if($idUser == null){
            return redirect()->to(site_url("FeriasController/index"));
        }
        return redirect()->to(site_url("FeriasController/indexDeUnicoFuncionario/{$idUser}"));
    }
}