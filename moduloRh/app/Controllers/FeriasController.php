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
    public function saveFerias($id = null){
        if(!isset($id)){
            $url = "http://localhost:8080/api/clientes";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $clientes = json_decode(curl_exec($ch), true);

            //Dados do Back para serem enviados para View
            $res['funcionarios'] = $clientes;
            $res['dados'] = "";
        }else{
            $url = "http://localhost:8080/api/ferias/{$id}";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $funcionario = json_decode(curl_exec($ch), true);
            //Dados do Back para serem enviados para View

            //$funcionario['inicio_das_ferias'] = date('d/m/Y', strtotime($funcionario['inicio_das_ferias']));
            //$funcionario['fim_das_ferias'] = date("Y-d-m", strtotime($funcionario['fim_das_ferias']));
            
            $res['dados'] = $funcionario;
            
        }
        
        return view('register-ferias', $res);
    }
    public function salvarFerias(){
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $post['inicio_das_ferias'] = date('d/m/Y', strtotime($post['inicio_das_ferias']));
        $post['fim_das_ferias'] = date('d/m/Y', strtotime($post['fim_das_ferias']));

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
        return redirect()->to(site_url("FeriasController/index"));
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




    public function deleteFerias($id){
        $url = "http://localhost:8080/api/ferias/delete/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("FeriasController/index"));
    }
}