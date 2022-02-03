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

    @NonNull
    @Column(name = "value_paid", nullable = false)
    private double value_paid;

    @NonNull
    @OneToOne
    @JoinColumn(name = "IdCliente", referencedColumnName = "IdCliente")
    private Funcionario funcionario;
}
