package br.com.aula.CRUDCliente.controller;

import br.com.aula.CRUDCliente.model.Payment;
import br.com.aula.CRUDCliente.model.PaymentDecimo;
import br.com.aula.CRUDCliente.sevices.PaymentDecimoService;
import br.com.aula.CRUDCliente.sevices.PaymentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@ResponseBody //RETURN JSON
@RequestMapping(path = "/api/paymentDecimo")
public class PaymentDecimoController {

    @Autowired
    PaymentDecimoService paymentDecimoService;

    //LIST ALL CLIENTS
    @GetMapping(path = "/all")
    public ResponseEntity<List<PaymentDecimo>> listAll(){
        return ResponseEntity.status(HttpStatus.OK).body(paymentDecimoService.findAll());
    }
    //SAVE PAYMENT

    @PostMapping(path = "/savePaymentDecimo")
    public ResponseEntity<PaymentDecimo> savePayment(@RequestBody PaymentDecimo payment){

        return ResponseEntity.status(HttpStatus.CREATED).body(paymentDecimoService.save(payment));
    }

    //FIND BY ID
    @GetMapping(path = "/{id}")
    public ResponseEntity<PaymentDecimo> findCliente(@PathVariable Long id){

        PaymentDecimo payment = paymentDecimoService.findById(id);

        if(payment != null){
            return ResponseEntity.status(HttpStatus.OK).body(payment);
        }else{
            return  ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //UPDATE CLIENT
    @PutMapping(path = "/edit")
    public ResponseEntity<PaymentDecimo> update(@RequestBody PaymentDecimo payment){
        if(paymentDecimoService.findById(payment.getId_decimo()) != null){
            PaymentDecimo paymentAtt = paymentDecimoService.update(payment);
            return ResponseEntity.status(HttpStatus.OK).body(paymentAtt);
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(null);
        }
    }

    //DELETE CLIENT
    @DeleteMapping(path = "/delete/{id}")
    public ResponseEntity<?> deletarPayment(@PathVariable  Long id){
        if(paymentDecimoService.findById(id) != null){
            paymentDecimoService.delete(id);
            return ResponseEntity.status(HttpStatus.OK).body("Pagamento deletado com sucesso!");
        }else{
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body("Pagamento Não existe!");
        }
    }
}
