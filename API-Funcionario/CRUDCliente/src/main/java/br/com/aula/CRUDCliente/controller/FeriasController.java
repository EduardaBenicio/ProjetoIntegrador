package br.com.aula.CRUDCliente.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import br.com.aula.CRUDCliente.model.Ferias;
import br.com.aula.CRUDCliente.sevices.FeriasService;

@Controller
@ResponseBody
@RequestMapping(path = "/api/ferias")
public class FeriasController {
    @Autowired
    FeriasService feriasService;

    @GetMapping(path = "/all")
    public ResponseEntity<List<Ferias>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(feriasService.findAll());
    }

    @PostMapping(path = "/save")
    public ResponseEntity<Ferias> salvarferias(@RequestBody Ferias f){
        return ResponseEntity.status(HttpStatus.CREATED).body(feriasService.save(f));
    }

    @GetMapping(path = "/{id}")
    public ResponseEntity<Ferias> findFerias(@PathVariable Long id){
        Ferias f = feriasService.findById(id);

        if(f != null){
            return ResponseEntity.status(HttpStatus.OK).body(f);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @PutMapping(path = "/update")
    public ResponseEntity<Ferias> atualizar(@RequestBody Ferias f){
        if(feriasService.findById(f.getId()) != null){
           Ferias feriasAtt = feriasService.update(f);
            return ResponseEntity.status(HttpStatus.OK).body(feriasAtt);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @DeleteMapping(path = "/delete/{id}")
    public ResponseEntity<?> deletarFerias(@PathVariable Long id){
        if(feriasService.findById(id) != null){
            feriasService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Férias deletada com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Férias Não existe!");
        }
    }
    @GetMapping(path = "/funcionario/{id}")
    public ResponseEntity<List<Ferias>> buscaFeriasPorIdFuncionario(@PathVariable Long id){
        return ResponseEntity.status(HttpStatus.OK).body(feriasService.buscaFeriasPorIdFuncionario(id));
    }

}
