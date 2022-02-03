package br.com.aula.CRUDCliente.repository;

import br.com.aula.CRUDCliente.model.Payment;
import org.springframework.data.jpa.repository.JpaRepository;

public interface PaymentRepository extends JpaRepository<Payment, Long> {
}
