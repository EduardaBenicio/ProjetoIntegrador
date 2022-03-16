package br.com.aula.CRUDCliente.sevices;

import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Payment;
import br.com.aula.CRUDCliente.model.PaymentDecimo;
import br.com.aula.CRUDCliente.repository.PaymentDecimoRepository;
import br.com.aula.CRUDCliente.repository.PaymentRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class PaymentDecimoService {

    @Autowired
    PaymentDecimoRepository paymentDecimoRepository;

    @Autowired
    FuncionarioService funcionarioService;
    //LIST ALL CLIENTS
    public List<PaymentDecimo> findAll(){

        return paymentDecimoRepository.findAll();
    }

    //RETURN BY ID
    public PaymentDecimo findById(Long id){
        if(paymentDecimoRepository.findById(id).isPresent()){
            return paymentDecimoRepository.findById(id).get();
        }else{
            return null;
        }

    }

    //UPDATE CLIENT
    public PaymentDecimo update(PaymentDecimo payment){

        return paymentDecimoRepository.save(payment);
    }

    //DELETE CLIENT
    public void  delete(Long id){
        paymentDecimoRepository.deleteById(id);


    }

    //SAVE PAGAMENTO
    public PaymentDecimo save(PaymentDecimo payment){
        Funcionario funcionario = payment.getFuncionario();
        funcionario.setPagamentoDecimo(payment.getDate_payment());
        payment.setValue_paid(funcionario.getDecimoTerceiro());
        funcionarioService.update(funcionario);
        return paymentDecimoRepository.save(payment);
    }
}
