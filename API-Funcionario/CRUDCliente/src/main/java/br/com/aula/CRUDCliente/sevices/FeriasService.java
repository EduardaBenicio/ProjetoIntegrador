package br.com.aula.CRUDCliente.sevices;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.aula.CRUDCliente.model.Ferias;
import br.com.aula.CRUDCliente.repository.FeriasRepository;

@Service
public class FeriasService {
    @Autowired
    FeriasRepository feriasRepository;

    public List<Ferias> findAll(){
        return feriasRepository.findAll();
    }

    public Ferias save(Ferias ferias){

        if(ferias.jaPodeTerFerias(ferias.getFuncionario())){
            ferias.calcularValorDasFerias();
            return feriasRepository.save(ferias);
        }else{
            return null;
        }
    }

    public Ferias findById(Long id){
        if(feriasRepository.findById(id).isPresent()){
            return feriasRepository.findById(id).get();
        }else{
            return null;
        }
    }

    public Ferias update(Ferias ferias){
        if(ferias.jaPodeTerFerias(ferias.getFuncionario())){
            ferias.calcularValorDasFerias();
            return feriasRepository.save(ferias);
        }else{
            return null;
        }
    }
    
    public void delete(Long id){
        feriasRepository.deleteById(id);
    }
    public List<Ferias> buscaFeriasPorIdFuncionario(Long id){
        return feriasRepository.buscaFeriasPorCliente(id);
    }
    
}
