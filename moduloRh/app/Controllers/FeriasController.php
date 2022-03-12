<?php 

namespace App\Controllers;

use DateTime;

class FeriasController extends BaseController
{
    public function index(){
        $url = "http://localhost:8080/api/ferias/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //Json para Array 
        $view['ferias'] = json_decode(curl_exec($ch), true);
        
        //print_r($view);
        //die();
        return view('ferias', $view);   
    }
    public function indexDeUnicoFuncionario($id = null){
        if(isset($id)){
            $url = "http://localhost:8080/api/ferias/funcionario/{$id}";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $view['ferias'] = json_decode(curl_exec($ch), true);

            //verificar funcionario existe
            $url2 = "http://localhost:8080/api/cliente/{$id}";
            $ch2 = curl_init($url2);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $funcionario = json_decode(curl_exec($ch2), true);

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
            $url = "http://localhost:8080/api/cliente/{$id}";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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
                $this->session->setFlashdata('erro', 'Data de inicio tem que ser antes da data final.');
                return redirect()->to(site_url("FeriasController/saveFerias/{$post["id"]}"));
            }
        $idUser = (int) $post["id"];
        $url = "http://localhost:8080/api/cliente/{$idUser}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $payload = json_encode($post);

        //Json para Array 
        $cliente = json_decode(curl_exec($ch), true);
        $post['funcionario'] = $cliente;
        $payload = json_encode($post);
        


        $url = "http://localhost:8080/api/ferias/save";
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
        $resultado = json_decode(curl_exec($ch), true);
        $this->session->setFlashdata('success', 'Cadastrado com sucesso!.');
        return redirect()->to(site_url("FeriasController/indexDeUnicoFuncionario/{$idUser}"));
    }



    public function salvarEditFerias($id = null){
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $post['inicio_das_ferias'] = date('d/m/Y', strtotime($post['inicio_das_ferias']));
        $post['fim_das_ferias'] = date('d/m/Y', strtotime($post['fim_das_ferias']));
        
        $url = "http://localhost:8080/api/ferias/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $ferias = json_decode(curl_exec($ch), true);
        $post['id'] = $ferias['id']; 
        $post['funcionario'] = $ferias['funcionario'];

        $payload = json_encode($post);
        $url = "http://localhost:8080/api/ferias/update";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'PUT');
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
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("FeriasController/index"));
    }




    public function deleteFerias($id,$idUser = null){
        $url = "http://localhost:8080/api/ferias/delete/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);
        if($idUser == null){
            return redirect()->to(site_url("FeriasController/index"));
        }
        return redirect()->to(site_url("FeriasController/indexDeUnicoFuncionario/{$idUser}"));
    }
}