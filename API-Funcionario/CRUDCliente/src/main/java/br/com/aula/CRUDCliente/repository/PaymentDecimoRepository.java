package br.com.aula.CRUDCliente.repository;

import br.com.aula.CRUDCliente.model.PaymentDecimo;
import org.springframework.data.jpa.repository.JpaRepository;

public interface PaymentDecimoRepository extends JpaRepository<PaymentDecimo, Long> {
}
