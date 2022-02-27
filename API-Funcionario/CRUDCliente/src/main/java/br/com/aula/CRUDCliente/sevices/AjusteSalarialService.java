package br.com.aula.CRUDCliente.sevices;

import br.com.aula.CRUDCliente.model.AjusteSalarial;
import br.com.aula.CRUDCliente.model.Cargo;
import br.com.aula.CRUDCliente.repository.AjusteSalarialRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class AjusteSalarialService {

    @Autowired
    AjusteSalarialRepository ajusteSalarialRepository;
    @Autowired
    CargoService cargoService;
    //LIST ALL CLIENTS
    public List<AjusteSalarial> findAll(){

        return ajusteSalarialRepository.findAll();
    }

    //RETURN BY ID
    public AjusteSalarial findById(Long id){
        if(ajusteSalarialRepository.findById(id).isPresent()){
            return ajusteSalarialRepository.findById(id).get();
        }else{
            return null;
        }

    }

    //UPDATE CLIENT
    public AjusteSalarial update(AjusteSalarial ajusteSalarial){

        return ajusteSalarialRepository.save(ajusteSalarial);
    }

    //DELETE CLIENT
    public void  delete(Long id){
        ajusteSalarialRepository.deleteById(id);


    }

    //SAVE PAGAMENTO
    public AjusteSalarial save(AjusteSalarial ajusteSalarial){

        Cargo cargo = ajusteSalarial.getCargo();
        cargo.setSalario(ajusteSalarial.getSalario_novo());
        cargoService.update(cargo);
        return ajusteSalarialRepository.save(ajusteSalarial);
    }

    public List<AjusteSalarial>findCargoById(Long id){

        return ajusteSalarialRepository.findCargoById(id);
    }
}
