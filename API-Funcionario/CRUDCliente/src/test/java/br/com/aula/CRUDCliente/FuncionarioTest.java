package br.com.aula.CRUDCliente;

import br.com.aula.CRUDCliente.model.Cargo;
import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Sector;
import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;

import java.text.ParseException;

public class FuncionarioTest {

    private Sector sector = new Sector("TI");
    private Cargo cargo = new Cargo("Suporte", 1500, sector) ;
    private Funcionario funcionario = new Funcionario("Eduarda", "12345678978", "123456", "31/05/2001", "01/02/2022", "superior", cargo, "123456", "eduarda", "123");
    private Funcionario funcionario1 = new Funcionario("Eduarda", "12345678978", "123456", "31/05/2001", "01/01/2022", "superior", cargo, "123456", "eduarda", "123");

    @Test
    public void deveCalcularValorDevidoComSucessoTest() throws ParseException {

        Assertions.assertEquals(321.42857142857144, funcionario.valorDevido());
    }

    @Test
    public void deveCalcularDecimoComSucessoTest() throws ParseException {

        Assertions.assertEquals(125, funcionario1.calcularDecimoTerceiro());
    }

    @Test
    public void deveCalcularInssComSucessoTest() throws ParseException {

        Assertions.assertEquals(116.82, funcionario.calcularInss());
    }
}