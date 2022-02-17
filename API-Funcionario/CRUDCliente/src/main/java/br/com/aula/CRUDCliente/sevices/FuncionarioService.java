package br.com.aula.CRUDCliente.sevices;


import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Usuario;
import br.com.aula.CRUDCliente.repository.FuncionarioRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.List;

@Service
public class FuncionarioService {

    @Autowired
    FuncionarioRepository funcionarioRepository;


    //LIST ALL CLIENTS
    public List<Funcionario> findAll(){

        return funcionarioRepository.findAll();
    }

    //RETURN BY ID
    public Funcionario findById(Long id){
        if(funcionarioRepository.findById(id).isPresent()){
            Funcionario funcionario = funcionarioRepository.findById(id).get();
            funcionario.valorDevido();
            funcionario.calcularInss();
            funcionario.calcularDecimoTerceiro();
            update(funcionario);
            return funcionario;
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

    public  List<Funcionario> searchByName(String name){

        return funcionarioRepository.searchByName(name);
    }
}
