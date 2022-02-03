package br.com.aula.CRUDCliente.sevices;

import br.com.aula.CRUDCliente.model.Payment;
import br.com.aula.CRUDCliente.repository.PaymentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class PaymentService {

    @Autowired
    PaymentRepository paymentRepository;

    //LIST ALL CLIENTS
    public List<Payment> findAll(){

        return paymentRepository.findAll();
    }

    //RETURN BY ID
    public Payment findById(Long id){
        if(paymentRepository.findById(id).isPresent()){
            return paymentRepository.findById(id).get();
        }else{
            return null;
        }

    }

    //UPDATE CLIENT
    public Payment update(Payment payment){

        return paymentRepository.save(payment);
    }

    //DELETE CLIENT
    public void  delete(Long id){
        paymentRepository.deleteById(id);


    }

    //SAVE PAGAMENTO
    public Payment save(Payment payment){

        return paymentRepository.save(payment);
    }
}
