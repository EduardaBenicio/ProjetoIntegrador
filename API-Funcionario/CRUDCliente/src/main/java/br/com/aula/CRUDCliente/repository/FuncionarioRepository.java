package br.com.aula.CRUDCliente.repository;

import br.com.aula.CRUDCliente.model.Funcionario;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

@Repository
public interface FuncionarioRepository extends JpaRepository<Funcionario, Long> {
    @Query(value = "SELECT * FROM cliente WHERE usuario = ?1 AND password =  ?2 LIMIT 1", nativeQuery = true)
    public Funcionario login(String user,String password);
}
