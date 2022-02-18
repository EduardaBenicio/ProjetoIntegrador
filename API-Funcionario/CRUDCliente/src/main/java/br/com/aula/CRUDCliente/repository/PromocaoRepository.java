package br.com.aula.CRUDCliente.repository;


import org.springframework.data.jpa.repository.JpaRepository;

import br.com.aula.CRUDCliente.model.Promocao;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface PromocaoRepository extends JpaRepository<Promocao, Long> {

    @Query(value = "SELECT * FROM promocao WHERE id_cliente = ?1", nativeQuery = true)
    public List<Promocao> findByIdUser(long id);
}
