package br.com.aula.CRUDCliente.model;

import lombok.*;

import javax.persistence.*;
import java.util.Date;

//ANNOTATION LOMBOK
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@RequiredArgsConstructor
@Builder

//ANNOTATION JPA
@Entity
@Table(name = "payment")
public class Payment {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY )
    @Column(name = "id_payment")
    private long id_payment;

    @NonNull
    @Column(name = "date_payment", nullable = false)
    private String date_payment;


    @Column(name = "value_paid", nullable = false)
    private double value_paid;


    @OneToOne
    @JoinColumn(name = "id_cliente", referencedColumnName = "id_cliente")
    private Funcionario funcionario;

    public double calcularInss(){
        double salario = this.funcionario.getCargo().getSalario();
        double descontoInss = 0;
        if(salario <= 1212){
            double v = salario * 7.5;
            descontoInss = v / 100;
        }else if(salario <=2427.35){
            double v = (salario-1212)*9;
            double v1 = 1212 * 7.5;

            descontoInss = (v+v1)/100;
        }else if(salario <=3641.03){
            double v = 1212*7.5;
            double v1 = (2427.35-1212)*9;
            double v2 = (salario-2427.35)*12;

            descontoInss = (v+v1+v2)/100;
        }else if (salario <=7087.22){
            double v = 1212*7.5;
            double v1 = (2427.35-1212)*9;
            double v2 = (7087.22-2427.35)*12;
            double v3 = (salario-7087.22)*14;

            descontoInss = (v+v1+v2+v3)/100;
        }

        return descontoInss;
    }
}
