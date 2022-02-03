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
@Table(name = "Sector" )

public class Sector {

    @Id
    @GeneratedValue(strategy =GenerationType.IDENTITY )
    @Column(name = "Id_Sector")
    private Long Id_Sector;

    @NonNull
    @Column(name = "Setor")
    private String Name;

}
