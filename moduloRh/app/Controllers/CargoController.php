<?php 

namespace App\Controllers;

class CargoController extends BaseController
{
    public function index(){
        
        $url = "http://localhost:8080/api/sector/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['setores'] = json_decode(curl_exec($ch), true); 

        
        
        return view('cargos', $view);

        
        
    }

    public function listCargoBySector($id){
        $url = "http://localhost:8080/api/cargo/find/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['cargos'] = json_decode(curl_exec($ch), true); 

        

        $url = "http://localhost:8080/api/sector/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['setores'] = json_decode(curl_exec($ch), true); 

        return view('cargos', $view);

    }

    public function registerCargo(){

        $url = "http://localhost:8080/api/sector/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['setores'] = json_decode(curl_exec($ch), true); 

        return view('register-cargo', $view);
    }
    

    public function salvar(){

       
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $payload = json_encode($post);

        $idSetor = (int) $post["sector"];
        $url = "http://localhost:8080/api/sector/{$idSetor}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $cargos = json_decode(curl_exec($ch), true);
        
        $post['sector'] = $cargos;
        $payload = json_encode($post);
        
       /* 
        echo "<pre>";
        print_r($payload);die();  */
       
        $url = "http://localhost:8080/api/cargo/salvarCargo";
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
        
       
        return redirect()->to(site_url("CargoController/registerCargo"));
    }

    public function editCargo($id){
       
        

        $url = "http://localhost:8080/api/cargo/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['cargo'] = json_decode(curl_exec($ch), true); 
        
        $url = "http://localhost:8080/api/sector/all";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $view['setores'] = json_decode(curl_exec($ch), true); 
       

        return view('register-cargo', $view);
        
    }

    public function saveEditCargo(){

       
        $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
        $payload = json_encode($post);

        $idSetor = (int) $post["sector"];
        $url = "http://localhost:8080/api/sector/{$idSetor}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //Json para Array 
        $cargos = json_decode(curl_exec($ch), true);
        
        $post['sector'] = $cargos;
        $payload = json_encode($post);
        
       /* 
        echo "<pre>";
        print_r($payload);die();  */
       
        $url = "http://localhost:8080/api/cargo/salvarCargo";
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
        
       
        return redirect()->to(site_url("CargoController/listCargoBySector/{$post['sector']['id_Sector']}"));
    }
    

    public function deleteCargo($id){

        
        $url = "http://localhost:8080/api/cargo/delete/{$id}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
        //Json para Array 
        $resultado = json_decode(curl_exec($ch), true);

        return redirect()->to(site_url("CargoController/index"));
    }

}