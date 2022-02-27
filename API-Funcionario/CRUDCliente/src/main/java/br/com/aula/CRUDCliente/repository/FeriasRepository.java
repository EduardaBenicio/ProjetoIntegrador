package br.com.aula.CRUDCliente.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import br.com.aula.CRUDCliente.model.Ferias;

public interface FeriasRepository extends JpaRepository<Ferias, Long> {
    @Query(value = "SELECT * FROM ferias WHERE id_cliente = ?1", nativeQuery = true)
    public List<Ferias> buscaFeriasPorCliente(Long id_cliente);
}
