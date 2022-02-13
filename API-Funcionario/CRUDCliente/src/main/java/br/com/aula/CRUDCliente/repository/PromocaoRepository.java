package br.com.aula.CRUDCliente.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.aula.CRUDCliente.model.Promocao;

public interface PromocaoRepository extends JpaRepository<Promocao, Long> {
    
}
