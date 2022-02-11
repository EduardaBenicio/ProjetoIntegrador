package br.com.aula.CRUDCliente.model;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.concurrent.TimeUnit;

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
@Table(name = "Ferias")
public class Ferias {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Id_Ferias")
    private Long id;

    @NonNull
    @OneToOne
    @JoinColumn(name = "id_cliente", referencedColumnName = "id_cliente")
    private Funcionario funcionario;

    @NonNull
    @Column(name = "inicio_ferias")
    private String inicio_das_ferias;

    @NonNull
    @Column(name = "fim_ferias")
    private String fim_das_ferias;

    //@NonNull
    @Column(name = "valor_pago_ferias")
    private double valor_pago_ferias;

    public boolean jaPodeTerFerias(Funcionario funcionario){
        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
            try {
                Date firstDate = sdf.parse(funcionario.getDataIngresso());
                Date secondDate = new Date();

                long diff = secondDate.getTime() - firstDate.getTime();

                TimeUnit time = TimeUnit.DAYS;
                long diffrence = time.convert(diff, TimeUnit.MILLISECONDS);

                if(diffrence >365){
                    return true;
                }else{
                    return false;
                }
            }catch (ParseException e){
                e.getMessage();
            }
        
        return false;
    }
    public void calcularValorDasFerias(){
        double salario = funcionario.getCargo().getSalario();
        double resultado = ((salario * 3) / 100) + salario;
        this.setValor_pago_ferias(resultado);
    }
}
