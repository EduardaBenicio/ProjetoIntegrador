package br.com.aula.CRUDCliente.controller;

import br.com.aula.CRUDCliente.model.AjusteSalarial;
import br.com.aula.CRUDCliente.sevices.AjusteSalarialService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api/ajustes")
public class AjusteSalarialController {

    @Autowired
    AjusteSalarialService ajusteSalarialService;

    //LIST ALL AJUSTES
    @GetMapping(path = "/ajusteSalarial")
    public ResponseEntity<List<AjusteSalarial>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(ajusteSalarialService.findAll());
    }
    //SAVE PAYMENT

    @PostMapping(path = "/saveAjusteSalarial")
    public ResponseEntity<AjusteSalarial> savePayment(@RequestBody AjusteSalarial ajusteSalarial){

        return ResponseEntity.status(HttpStatus.CREATED).body(ajusteSalarialService.save(ajusteSalarial));
    }

    //FIND BY ID
    @GetMapping(path = "/ajusteSalarial/{id}")
    public ResponseEntity<AjusteSalarial> findCliente(@PathVariable Long id){

        AjusteSalarial ajusteSalarial = ajusteSalarialService.findById(id);

        if(ajusteSalarial != null){
            return ResponseEntity.status(HttpStatus.OK).body(ajusteSalarial);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //UPDATE CLIENT
    @PutMapping(path = "/ajusteSalarial")
    public ResponseEntity<AjusteSalarial> update(@RequestBody AjusteSalarial ajusteSalarial){
        if(ajusteSalarialService.findById(ajusteSalarial.getId_ajuste()) != null){
            AjusteSalarial ajusteSalarialAtt = ajusteSalarialService.update(ajusteSalarial);
            return ResponseEntity.status(HttpStatus.OK).body(ajusteSalarialAtt);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @GetMapping(path = "ajustesById/{id}")
    public ResponseEntity<List<AjusteSalarial>> findCargoById(@PathVariable Long id){

        return ResponseEntity.status(HttpStatus.OK).body(ajusteSalarialService.findCargoById(id));

    }

    //DELETE CLIENT
    @DeleteMapping(path = "/ajusteSalarial/delete/{id}")
    public ResponseEntity<?> deletarPayment(@PathVariable  Long id){
        if(ajusteSalarialService.findById(id) != null){
            ajusteSalarialService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Ajuste salarial deletado com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Ajuste salarial Não existe!");
        }
    }
}
