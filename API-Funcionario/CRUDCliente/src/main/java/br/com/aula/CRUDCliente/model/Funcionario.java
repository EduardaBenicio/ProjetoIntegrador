package br.com.aula.CRUDCliente.model;

import lombok.*;

import javax.persistence.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.concurrent.TimeUnit;

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
    @Column(name = "id_cliente")
    private Long id;

    @NonNull
    @Column(name = "name", nullable = false)
    private String name;

    @NonNull
    @Column(name = "cpf", nullable = false, unique =true)
    private String cpf;

    @NonNull
    @Column(name = "rg", nullable = false, unique =true)
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
    private double valorDevidoAtual;

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
    @Column(name = "usuario", nullable = false, unique =true)
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

    @Column(name = "estadoCivil")
    private String estadoCivil;

    @Column(name = "sexo")
    private String sexo;

    @Column(name = "dataUltimoPag")
    private String dataUltimoPag;

    @Column(name = "decimoTerceiro")
    private double decimoTerceiro;

    @Column(name = "inss")
    private double inss;

    @Column(name = "pagamentoDecimo")
    private String pagamentoDecimo;

    public double calcularDecimoTerceiro() {

        double resultado = 0;
        if(this.pagamentoDecimo != null) {
            SimpleDateFormat formatador = new SimpleDateFormat("dd/MM/yyyy");

            try {

                Date dataAtual = new Date();
                String dateToStr = String.format("%1$td/%1$tm/%1$tY", dataAtual);

                SimpleDateFormat format = new SimpleDateFormat("dd/MM/yyyy");
                Date dataInicio = format.parse(this.pagamentoDecimo);
                Date dataFim = format.parse(dateToStr);

                final double MES_EM_MILISEGUNDOS = 30.0 * 24.0 * 60.0 * 60.0 * 1000.0;

                double numeroDeMeses = Math.round((double) ((dataFim.getTime() - dataInicio.getTime()) / MES_EM_MILISEGUNDOS));


                double calculo = this.cargo.getSalario() / 12;
                this.decimoTerceiro = Math.round(calculo * numeroDeMeses);
            } catch (ParseException e) {
                e.getMessage();
            }
        }else{
            SimpleDateFormat formatador = new SimpleDateFormat("dd/MM/yyyy");

            try {

                Date dataAtual = new Date();
                String dateToStr = String.format("%1$td/%1$tm/%1$tY", dataAtual);

                SimpleDateFormat format = new SimpleDateFormat("dd/MM/yyyy");
                Date dataInicio = format.parse(this.dataIngresso);
                Date dataFim = format.parse(dateToStr);

                final double MES_EM_MILISEGUNDOS = 30.0 * 24.0 * 60.0 * 60.0 * 1000.0;

                double numeroDeMeses = Math.round((double) ((dataFim.getTime() - dataInicio.getTime()) / MES_EM_MILISEGUNDOS));


                double calculo = this.cargo.getSalario() / 12;
                this.decimoTerceiro = Math.round(calculo * numeroDeMeses);
            } catch (ParseException e) {
                e.getMessage();
            }
        }

        return resultado;
    }

    public double calcularInss(){
        double salario = this.cargo.getSalario();
        double descontoInss = 0;
        if(salario <= 1212){
            double v = salario * 7.5;
            this.inss = Math.round(v / 100);
        }else if(salario <=2427.35){
            double v = (salario-1212)*9;
            double v1 = 1212 * 7.5;

            this.inss = Math.round((v+v1)/100);
        }else if(salario <=3641.03){
            double v = 1212*7.5;
            double v1 = (2427.35-1212)*9;
            double v2 = Math.round((salario-2427.35)*12);

            this.inss = (v+v1+v2)/100;
        }else if (salario <=7087.22){
            double v = 1212*7.5;
            double v1 = (2427.35-1212)*9;
            double v2 = (7087.22-2427.35)*12;
            double v3 = (salario-7087.22)*14;

            this.inss = Math.round((v+v1+v2+v3)/100);
        }

        return descontoInss;
    }

    public double valorDevido() {
        double valorDevido = 0;
        if(this.dataUltimoPag != null){
            SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
            try {
                Date firstDate = sdf.parse(this.dataUltimoPag);
                Date secondDate = new Date();

                long diff = secondDate.getTime() - firstDate.getTime();

                TimeUnit time = TimeUnit.DAYS;
                long diffrence = time.convert(diff, TimeUnit.MILLISECONDS);

                Calendar datas = new GregorianCalendar();
                int quantDias = datas.getActualMaximum (Calendar.DAY_OF_MONTH);
                double val = this.cargo.getSalario()/quantDias;

                this.valorDevidoAtual = Math.round(val * diffrence);
            }catch (ParseException e){
                e.getMessage();
            }


        }else{
            SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
            try {
                Date firstDate = sdf.parse(this.dataIngresso);
                Date secondDate = new Date();

                long diff = secondDate.getTime() - firstDate.getTime();

                TimeUnit time = TimeUnit.DAYS;
                long diffrence = time.convert(diff, TimeUnit.MILLISECONDS);

                Calendar datas = new GregorianCalendar();
                int quantDias = datas.getActualMaximum(Calendar.DAY_OF_MONTH);

                double val = this.cargo.getSalario() / quantDias;

                this.valorDevidoAtual = Math.round(val * diffrence);



            }catch(ParseException e){
                e.getMessage();
            }
        }
        return valorDevido;
    }

}
