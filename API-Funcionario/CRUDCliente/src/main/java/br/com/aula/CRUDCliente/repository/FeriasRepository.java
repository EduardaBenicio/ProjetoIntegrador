package br.com.aula.CRUDCliente.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import br.com.aula.CRUDCliente.model.Ferias;

public interface FeriasRepository extends JpaRepository<Ferias, Long> {
    
    @Query(value = "SELECT value_paid FROM payment WHERE Id_Cliente = (SELECT id_cliente FROM Cliente WHERE cpf = ?1)", nativeQuery = true)
    public double pagamento_do_cliente(String cpf);

    

}
