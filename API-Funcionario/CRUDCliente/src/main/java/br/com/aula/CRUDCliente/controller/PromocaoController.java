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

import br.com.aula.CRUDCliente.model.Promocao;
import br.com.aula.CRUDCliente.sevices.PromocaoService;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api/promocao")
public class PromocaoController {
    @Autowired
    PromocaoService promocaoService;

    @GetMapping(path = "/all")
    public ResponseEntity<List<Promocao>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(promocaoService.findAll());
    }
    @PostMapping(path = "/save")
    public ResponseEntity<Promocao> salvarPromocao(@RequestBody Promocao p){
        return ResponseEntity.status(HttpStatus.CREATED).body(promocaoService.save(p));
    }
    @GetMapping(path = "/{id}")
    public ResponseEntity<Promocao> findPromocao(@PathVariable Long id){
        Promocao p = promocaoService.findById(id);

        if(p != null){
            return ResponseEntity.status(HttpStatus.OK).body(p);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    @GetMapping(path = "user/{id}")
    public ResponseEntity<List<Promocao>> findByIdUser(@PathVariable Long id){

        return ResponseEntity.status(HttpStatus.OK).body(promocaoService.findByIdUser(id));

    }


    @PutMapping(path = "/update")
    public ResponseEntity<Promocao> atualizar(@RequestBody Promocao p){
        if(promocaoService.findById(p.getId()) != null){
           Promocao promocaoAtt = promocaoService.update(p);
            return ResponseEntity.status(HttpStatus.OK).body(promocaoAtt);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }
    @DeleteMapping(path = "/delete/{id}")
    public ResponseEntity<?> deletarPromocao(@PathVariable Long id){
        if(promocaoService.findById(id) != null){
            promocaoService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Promoção deletada com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Promoção Não existe!");
        }
    }

}
