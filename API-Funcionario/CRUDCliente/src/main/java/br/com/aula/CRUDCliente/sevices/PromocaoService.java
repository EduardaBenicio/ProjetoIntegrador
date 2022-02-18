package br.com.aula.CRUDCliente.sevices;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Promocao;
import br.com.aula.CRUDCliente.repository.PromocaoRepository;

@Service
public class PromocaoService {
    @Autowired
    PromocaoRepository promocaoRepository;
    @Autowired
    FuncionarioService funcionariosService;

    public List<Promocao> findAll(){
        return promocaoRepository.findAll();
    }

    public Promocao save(Promocao promocao){
            Funcionario cliente = promocao.getFuncionario();
            cliente.setCargo(promocao.getCargoNovo());
            funcionariosService.update(cliente);
        return promocaoRepository.save(promocao);
    }
    public Promocao update(Promocao promocao){
            Funcionario cliente;
            cliente = promocao.getFuncionario();
            cliente.setCargo(promocao.getCargoNovo());
            funcionariosService.update(cliente);
        return promocaoRepository.save(promocao);
    }
    public Promocao findById(Long id){
        if(promocaoRepository.findById(id).isPresent()){
            return promocaoRepository.findById(id).get();
        }else{
            return null;
        }
    }
    public void delete(Long id){

        promocaoRepository.deleteById(id);
    }
    public  List<Promocao>findByIdUser(Long id){

        return promocaoRepository.findByIdUser(id);
    }
}
