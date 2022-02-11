package br.com.aula.CRUDCliente.controller;


import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Sector;
import br.com.aula.CRUDCliente.sevices.SectorService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api/sector")
public class SectorController {


    @Autowired
    SectorService sectorService;

    //LIST ALL SECTORS
    @GetMapping(path = "/all")
    public ResponseEntity<List<Sector>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(sectorService.findAll());
    }

    @PostMapping(path = "/salvarSector")
    public ResponseEntity<Sector> SalvarSector(@RequestBody Sector sector){

        return ResponseEntity.status(HttpStatus.CREATED).body(sectorService.save(sector));
    }

    @PostMapping(path = "/editSector")
    public ResponseEntity<Sector> EditarSetor(@RequestBody Sector sector){

        return ResponseEntity.status(HttpStatus.CREATED).body(sectorService.update(sector));
    }

    //FIND BY ID
    @GetMapping(path = "/{id}")
    public ResponseEntity<Sector> findSector(@PathVariable Long id){

        Sector sector = sectorService.findById(id);

        if(sector != null){
            return ResponseEntity.status(HttpStatus.OK).body(sector);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //DELETE CLIENT
    @DeleteMapping(path = "/delete/{id}")
    public ResponseEntity<?> deletarCliente(@PathVariable  Long id){
        if(sectorService.findById(id) != null){
            sectorService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Setor deletado com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Setor Não existe!");
        }
    }
}
