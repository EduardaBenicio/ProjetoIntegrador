package br.com.aula.CRUDCliente.repository;

import br.com.aula.CRUDCliente.model.Cargo;
import ch.qos.logback.core.net.server.Client;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface CargoRepository extends JpaRepository<Cargo, Long> {

    @Query(value = "SELECT * FROM cargo Where Id_Sector = ?1", nativeQuery = true)
    public List<Cargo> findBySector(long id);
}
