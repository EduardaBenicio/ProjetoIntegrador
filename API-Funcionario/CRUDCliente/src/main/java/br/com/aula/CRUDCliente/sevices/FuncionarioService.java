package br.com.aula.CRUDCliente.sevices;


import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Usuario;
import br.com.aula.CRUDCliente.repository.FuncionarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class FuncionarioService {

    @Autowired
    FuncionarioRepository funcionarioRepository;

    @Autowired
    PaymentService paymentService;

    //LIST ALL CLIENTS
    public List<Funcionario> findAll(){

        return funcionarioRepository.findAll();
    }

    //RETURN BY ID
    public Funcionario findById(Long id){
        if(funcionarioRepository.findById(id).isPresent()){
            return funcionarioRepository.findById(id).get();
        }else{
            return null;
        }

    }

    //UPDATE CLIENT
    public Funcionario update(Funcionario cliente){

        return funcionarioRepository.save(cliente);
    }

    //DELETE CLIENT
    public void  delete(Long id){
        funcionarioRepository.deleteById(id);


    }

    //SAVE CLIENTS
    public Funcionario save(Funcionario cliente){

        return funcionarioRepository.save(cliente);
    }
    public Funcionario login(Usuario user){
        

        return funcionarioRepository.login(user.getUser(),user.getPassword());
    }


}
