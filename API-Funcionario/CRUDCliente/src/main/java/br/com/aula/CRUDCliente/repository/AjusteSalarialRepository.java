package br.com.aula.CRUDCliente.repository;

import br.com.aula.CRUDCliente.model.AjusteSalarial;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface AjusteSalarialRepository extends JpaRepository<AjusteSalarial, Long>{

    @Query(value = "SELECT * FROM ajuste_salarial WHERE id_cargo = ?1", nativeQuery = true)
    public List<AjusteSalarial> findCargoById(long id);
}
