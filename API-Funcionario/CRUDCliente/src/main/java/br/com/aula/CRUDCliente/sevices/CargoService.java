package br.com.aula.CRUDCliente.sevices;



import br.com.aula.CRUDCliente.model.Cargo;
import br.com.aula.CRUDCliente.repository.CargoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class CargoService {

    @Autowired
    CargoRepository cargoRepository;

    public List<Cargo> findAll(){

        return cargoRepository.findAll();
    }

    public Cargo save(Cargo cargo){

        return cargoRepository.save(cargo);
    }
}
