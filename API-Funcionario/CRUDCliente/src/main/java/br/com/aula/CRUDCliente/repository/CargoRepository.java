package br.com.aula.CRUDCliente.repository;

import br.com.aula.CRUDCliente.model.Cargo;
import org.springframework.data.jpa.repository.JpaRepository;

public interface CargoRepository extends JpaRepository<Cargo, Long> {
}
