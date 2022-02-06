package br.com.aula.CRUDCliente.controller;

import br.com.aula.CRUDCliente.model.Cargo;

import br.com.aula.CRUDCliente.model.Sector;
import br.com.aula.CRUDCliente.sevices.CargoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api/cargo")
public class CargoController {

    @Autowired
    CargoService cargoService;

    @GetMapping(path = "/all")
    public ResponseEntity<List<Cargo>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(cargoService.findAll());
    }

    @PostMapping(path = "/salvarCargo")
    public ResponseEntity<Cargo> SalvarCargo(@RequestBody Cargo cargo){

        return ResponseEntity.status(HttpStatus.CREATED).body(cargoService.save(cargo));
    }

    //FIND BY ID
    @GetMapping(path = "/{id}")
    public ResponseEntity<Cargo> findSector(@PathVariable Long id){

        Cargo cargo = cargoService.findById(id);

        if(cargo != null){
            return ResponseEntity.status(HttpStatus.OK).body(cargo);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }
}
