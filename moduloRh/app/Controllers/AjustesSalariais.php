<?php

namespace App\Controllers;

class AjustesSalariais extends BaseController
{
    public function index($id)
    {

        $url = "http://localhost:8080/api/cargo/$id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['cargo'] = json_decode(curl_exec($ch), true);
        
        $url = "http://localhost:8080/api/ajustes/ajustesById/$id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $view['ajuste'] = json_decode(curl_exec($ch), true);

        //print "<pre>";
        //print_r($view);
        //die();
        return view('ajustes-salariais', $view);
    }

    public function registerAjuste($id)
    {
            $url = "http://localhost:8080/api/cargo/$id";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            //Json para Array 
            $cargo = json_decode(curl_exec($ch), true);
          


            //Dados do Back para serem enviados para View
            $res['cargo'] = $cargo;
            $res['dados'] = "";

        return view('register-ajuste', $res);
    }

    public function salvarApi()
    {
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        
        
        $idCargo = (int) $post["cargo"];
        $url = "http://localhost:8080/api/cargo/$idCargo";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $cargo = json_decode(curl_exec($ch), true);

        unset($post['id_ajuste']);
        $post['cargo'] = $cargo;

        $post['date_change'] = date('d/m/Y');
       
        $payload = json_encode($post);
        
        $url = "http://localhost:8080/api/ajustes/saveAjusteSalarial";
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
        

        //Json para Array 
        $view['ajuste'] = $resultado;
        $view['alert'] = 2;

        return view('dashboard-ajuste', $view);
    
    }

    public function dashboardAjuste($id)
    {
        $url = "http://localhost:8080/api/ajustes/ajusteSalarial/$id";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $ajuste = json_decode(curl_exec($ch), true);

        $res['ajuste'] = $ajuste;


        return view('dashboard-ajuste', $res);
    }
    public function historico()
    {
        $url = "http://localhost:8080/api/ajustes/ajusteSalarial";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $ajustes = json_decode(curl_exec($ch), true);

        $res['ajustes'] = $ajustes;


        return view('historico-ajuste', $res);
    }

    public function deleteFuncionario($id)
    {


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
