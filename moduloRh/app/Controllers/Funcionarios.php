<?php

namespace App\Controllers;

class Funcionarios extends BaseController
{
    public function index()
    {

        
        $url = "http://localhost:8080/api/clientes";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['funcionarios'] = json_decode(curl_exec($ch), true); 
        

        return view('employee', $view);
    }

    public function registerEmployee()
    {
        $url = "http://localhost:8080/api/cargo/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $cargos = json_decode(curl_exec($ch), true);


        $url = "http://localhost:8080/api/sector/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $setores = json_decode(curl_exec($ch), true);
        //Dados do Back para serem enviados para View
        $res['cargos'] = $cargos;
        $res['setores'] = $setores;

      

        return view('register-employee', $res);
    }

    public function salvarApi()
    {
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $payload = json_encode($post);
        
        $idCargo = (int) $post["cargo"];
        $url = "http://localhost:8080/api/cargo/$idCargo";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $cargos = json_decode(curl_exec($ch), true);

        unset($post['setores']);
        $post['cargo'] = $cargos;

      
        $post['dataNasc'] = date('d/m/Y', strtotime($post['dataNasc']));
        $post['dataIngresso'] = date('d/m/Y', strtotime($post['dataIngresso']));
        $post['dataIngressoCargo'] = date('d/m/Y', strtotime($post['dataIngressoCargo']));
        $post['password'] = sha1($post['password']);
        $payload = json_encode($post);
       
        $url = "http://localhost:8080/api/salvarcliente";
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
        
        $url = "http://localhost:8080/api/clientes";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['funcionarios'] = json_decode(curl_exec($ch), true);
        

        return view('employee', $view);
    }

    public function dashboardEmployee($idFuncionario){
        $url = "http://localhost:8080/api/cliente/$idFuncionario";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        $res['funcionario'] = $funcionario;
       

        return view('dashboard-employee', $res);
    }
    
    public function deleteFuncionario($id){

        
        $url = "http://localhost:8080/api/cliente/delete/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("Funcionarios/index"));
    }

}
