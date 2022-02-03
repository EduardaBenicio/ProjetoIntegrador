package br.com.aula.CRUDCliente.repository;


import br.com.aula.CRUDCliente.model.Sector;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

public interface SectorRepository extends JpaRepository<Sector, Long> {
}
