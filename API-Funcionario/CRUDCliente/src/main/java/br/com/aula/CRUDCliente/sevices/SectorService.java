package br.com.aula.CRUDCliente.sevices;

import br.com.aula.CRUDCliente.model.Sector;
import br.com.aula.CRUDCliente.repository.SectorRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class SectorService {

    @Autowired
    SectorRepository SectorRepository;

    public List<Sector> findAll(){

        return SectorRepository.findAll();
    }

    public  Sector save(Sector sector){

        return SectorRepository.save(sector);
    }
}
