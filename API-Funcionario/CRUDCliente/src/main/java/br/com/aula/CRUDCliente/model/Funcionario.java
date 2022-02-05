package br.com.aula.CRUDCliente.model;

import lombok.*;

import javax.persistence.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;

//ANNOTATION LOMBOK
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@RequiredArgsConstructor
@Builder

//ANNOTATION JPA
@Entity
@Table(name = "Cliente")
public class Funcionario {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY )
    @Column(name = "IdCliente")
    private Long id;

    @NonNull
    @Column(name = "name", nullable = false)
    private String name;

    @NonNull
    @Column(name = "cpf", nullable = false)
    private String cpf;

    @NonNull
    @Column(name = "rg", nullable = false)
    private String rg;

    @NonNull
    @Column(name = "dataNasc", nullable = false)
    private String dataNasc;

    @NonNull
    @Column(name = "dataIngresso", nullable = false)
    private String dataIngresso;

    @Column(name = "dataIngressoCargo")
    private String dataIngressoCargo;

    @NonNull
    @Column(name = "schooling", nullable = false)
    private String schooling;

    @Column(name = "bloodType")
    private String bloodType;

    @Column(name = "dataPag")
    private String dataPag;

    @Column(name = "valorDevidoAtual")
    private String valorDevidoAtual;

    @NonNull
    @OneToOne
    @JoinColumn(name = "Id_Cargo", referencedColumnName = "Id_Cargo")
    private Cargo cargo;

    @Column(name = "email")
    private String email;

    @Column(name = "phone")
    private String phone;

    @NonNull
    @Column(name = "ctps", nullable = false)
    private String ctps;

    @NonNull
    @Column(name = "usuario", nullable = false)
    private String user;

    @NonNull
    @Column(name = "password", nullable = false)
    private String password;

    @Column(name = "street")
    private String street;

    @Column(name = "neighborhood" )
    private String neighborhood;

    @Column(name = "number" )
    private int number;


    @Column(name = "city", nullable = false)
    private String city;


    @Column(name = "complemet")
    private String complemet;


    @Column(name = "uf", nullable = false)
    private String uf;

    @Column(name = "cep")
    private String cep;

    public double calcularDecimoTerceiro() throws ParseException {
        SimpleDateFormat formatador = new SimpleDateFormat("dd/MM/yyyy");
        Date date = formatador.parse(this.dataIngresso);


        Calendar dataIgresso = Calendar.getInstance();
        Calendar dataAtual = Calendar.getInstance();
        dataIgresso.setTime(date);

        int meseTrabalhados = +dataAtual.get(Calendar.MONTH)-dataIgresso.get(Calendar.MONTH);

        double calculo = this.cargo.getSalario() / 12;
        double resultado = calculo * meseTrabalhados;

        return resultado;
    }



}
