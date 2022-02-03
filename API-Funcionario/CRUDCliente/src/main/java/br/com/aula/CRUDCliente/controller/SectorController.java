package br.com.aula.CRUDCliente.controller;


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
}
