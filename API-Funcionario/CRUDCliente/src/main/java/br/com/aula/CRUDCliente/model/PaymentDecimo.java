package br.com.aula.CRUDCliente.model;

import lombok.*;

import javax.persistence.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
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
@Table(name = "paymentDecimo")
public class PaymentDecimo {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY )
    @Column(name = "id_decimo")
    private long id_decimo;

    @NonNull
    @Column(name = "date_payment", nullable = false)
    private String date_payment;


    @Column(name = "value_paid", nullable = false)
    private double value_paid;


    @OneToOne
    @JoinColumn(name = "id_cliente", referencedColumnName = "id_cliente")
    private Funcionario funcionario;


}
