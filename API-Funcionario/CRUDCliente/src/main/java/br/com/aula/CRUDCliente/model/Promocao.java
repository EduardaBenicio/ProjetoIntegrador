package br.com.aula.CRUDCliente.model;

import javax.persistence.*;

import lombok.*;


//ANNOTATION LOMBOK
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@RequiredArgsConstructor
@Builder

//ANNOTATION JPA
@Entity
@Table(name = "Promocao")
public class Promocao {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY )
    @Column(name = "id_promocao")
    private Long id;

    @NonNull
    @OneToOne
    @JoinColumn(name = "id_cliente", referencedColumnName = "id_cliente")
    private Funcionario funcionario;

    @NonNull
    @OneToOne
    @JoinColumn(name = "Id_Cargo_Antigo", referencedColumnName = "Id_Cargo")
    private Cargo cargoAntigo;

    @NonNull
    @OneToOne
    @JoinColumn(name = "Id_Cargo_Novo", referencedColumnName = "Id_Cargo")
    private Cargo cargoNovo;

    @NonNull
    @Column(name = "data_da_mudanca")
    private String dataDaMudanca;
}
