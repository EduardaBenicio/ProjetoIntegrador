<?php

namespace App\Controllers;

class Pagamentos extends BaseController
{
    public function index()
    {

        
        $url = "http://localhost:8080/api/payment/payments";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['pagamentos'] = json_decode(curl_exec($ch), true);

        return view('payment', $view);
    }

    public function registerPayment($idcFuncionario)
    {
        
        $url = "http://localhost:8080/api/cliente/$idcFuncionario";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        $res['funcionario'] = $funcionario;
      

        return view('register-payment', $res);
    }

    public function salvarApi()
    {
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);

        $id = (int) $post['id'];
        $url = "http://localhost:8080/api/cliente/$id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $funcionario = json_decode(curl_exec($ch), true);

        unset($post['id']);
        $post['funcionario'] = $funcionario;

      
        $post['date_payment'] = date('d/m/Y');
        $payload = json_encode($post);
       
        $url = "http://localhost:8080/api/payment/savePayment";
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
        
        
        $url = "http://localhost:8080/api/payment/payments";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['pagamentos'] = json_decode(curl_exec($ch), true);
     
       

        return view('payment', $view);
    }
}
