package br.com.aula.CRUDCliente.controller;

import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Payment;
import br.com.aula.CRUDCliente.sevices.FuncionarioService;
import br.com.aula.CRUDCliente.sevices.PaymentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api/payment")
public class PaymentController {

    @Autowired
    PaymentService paymentService;

    //LIST ALL CLIENTS
    @GetMapping(path = "/payments")
    public ResponseEntity<List<Payment>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(paymentService.findAll());
    }
    //SAVE PAYMENT

    @PostMapping(path = "/savePayment")
    public ResponseEntity<Payment> savePayment(@RequestBody Payment payment){

        return ResponseEntity.status(HttpStatus.CREATED).body(paymentService.save(payment));
    }

    //FIND BY ID
    @GetMapping(path = "/payment/{id}")
    public ResponseEntity<Payment> findCliente(@PathVariable Long id){

        Payment payment = paymentService.findById(id);

        if(payment != null){
            return ResponseEntity.status(HttpStatus.OK).body(payment);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //UPDATE CLIENT
    @PutMapping(path = "/payment")
    public ResponseEntity<Payment> update(@RequestBody Payment payment){
        if(paymentService.findById(payment.getId_payment()) != null){
            Payment paymentAtt = paymentService.update(payment);
            return ResponseEntity.status(HttpStatus.OK).body(paymentAtt);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //DELETE CLIENT
    @DeleteMapping(path = "/payment/delete/{id}")
    public ResponseEntity<?> deletarPayment(@PathVariable  Long id){
        if(paymentService.findById(id) != null){
            paymentService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Pagamento deletado com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Pagamento Não existe!");
        }
    }
}
