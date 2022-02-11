package br.com.aula.CRUDCliente.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import br.com.aula.CRUDCliente.model.Ferias;

public interface FeriasRepository extends JpaRepository<Ferias, Long> {

}
