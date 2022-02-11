<?php

namespace App\Controllers;

class SetorController extends BaseController
{
    public function index(){
        
        $url = "http://localhost:8080/api/sector/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['setores'] = json_decode(curl_exec($ch), true); 

        /* echo "<pre>";
        var_dump($view);
        die(); */
        return view('setores', $view);
        
    }

    public function registerSetor(){

        return view('register-setor');
    }

    public function salvar(){

       
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $payload = json_encode($post);
       /* 
        echo "<pre>";
        print_r($payload);die();  */
       
        $url = "http://localhost:8080/api/sector/salvarSector";
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
        
       
        return redirect()->to(site_url("SetorController/registerSetor"));
    }

    public function editSetor($id, $name){
       
        $view["setor"]["id"] = $id;
        $view["setor"]["name"] = $name;

        return view('register-setor', $view);
        
    }

    public function saveEditSetor(){
        
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $payload = json_encode($post);
      
        $url = "http://localhost:8080/api/sector/editSector";
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
       
        return redirect()->to(site_url("SetorController/index"));
    }

    public function deleteSetor($id){

        
        $url = "http://localhost:8080/api/sector/delete/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("SetorController/index"));
    }
}
