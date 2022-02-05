package br.com.aula.CRUDCliente.model;

import lombok.*;

import javax.persistence.*;

//ANNOTATION LOMBOK
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@RequiredArgsConstructor
@Builder

//ANNOTATION JPA
@Entity
@Table(name = "Cargo")

public class Cargo {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Id_Cargo")
    private Long id;

    @NonNull
    @Column(name = "Cargo")
    private String Name;


    @NonNull
    @Column(name = "salario")
    private double salario;


    @Column(name = "permission", nullable = false)
    private int permission;

    //CHAVE ESTRANGEIRA PARA O SETOR
    @NonNull
    @OneToOne
    @JoinColumn(name = "Id_Sector", referencedColumnName = "Id_Sector")
    public Sector sector;
}
