package br.com.aula.CRUDCliente.controller;

import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Usuario;
import br.com.aula.CRUDCliente.sevices.FuncionarioService;

import org.hibernate.annotations.SourceType;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api")
public class FuncionarioController {

    @Autowired
    FuncionarioService funcionarioService;

    //LIST ALL CLIENTS
    @GetMapping(path = "/clientes")
    public ResponseEntity<List<Funcionario>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(funcionarioService.findAll());
    }
    //SAVE CLIENT

    @PostMapping(path = "/salvarcliente")

    public ResponseEntity<Funcionario> salvarCliente(@RequestBody Funcionario cliente){

       return ResponseEntity.status(HttpStatus.CREATED).body(funcionarioService.save(cliente));
    }

    //FIND BY ID
    @GetMapping(path = "/cliente/{id}")
    public ResponseEntity<Funcionario> findCliente(@PathVariable Long id){

        Funcionario cliente = funcionarioService.findById(id);

        if(cliente != null){
            return ResponseEntity.status(HttpStatus.OK).body(cliente);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //UPDATE CLIENT
    @PutMapping(path = "/cliente")
    public ResponseEntity<Funcionario> atualizar(@RequestBody Funcionario cliente){
        if(funcionarioService.findById(cliente.getId()) != null){
           Funcionario clienteAtt = funcionarioService.update(cliente);
            return ResponseEntity.status(HttpStatus.OK).body(clienteAtt);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //DELETE CLIENT
    @DeleteMapping(path = "/cliente/delete/{id}")
    public ResponseEntity<?> deletarCliente(@PathVariable  Long id){
        if(funcionarioService.findById(id) != null){
            funcionarioService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Cliente deletado com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Cliente Não existe!");
        }
    }

    @PostMapping(path = "/login")
    public ResponseEntity<Funcionario> login(@RequestBody Usuario user){
        Funcionario cliente = funcionarioService.login(user);

        if(cliente != null){
            return ResponseEntity.status(HttpStatus.OK).body(cliente);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }

    }

    @GetMapping(path = "/searchByName/{name}")
    public ResponseEntity<List<Funcionario>> searchByName2(@PathVariable String name){

        return ResponseEntity.status(HttpStatus.OK).body(funcionarioService.searchByName(name));
    }


}
