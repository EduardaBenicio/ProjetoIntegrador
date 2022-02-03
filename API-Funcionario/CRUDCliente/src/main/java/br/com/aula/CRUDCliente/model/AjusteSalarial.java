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
@Table(name = "ajuste_salarial")
public class AjusteSalarial {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY )
    @Column(name = "id_ajuste")
    private long id_ajuste;

    @NonNull
    @Column(name = "salario_antigo", nullable = false)
    private double salario_antigo;

    @NonNull
    @Column(name = "salario_novo", nullable = false)
    private double salario_novo;

    @NonNull
    @Column(name = "date_change", nullable = false)
    private String date_change;

    @NonNull
    @OneToOne
    @JoinColumn(name = "Id_Cargo", referencedColumnName = "Id_Cargo")
    private Cargo cargo;
}
