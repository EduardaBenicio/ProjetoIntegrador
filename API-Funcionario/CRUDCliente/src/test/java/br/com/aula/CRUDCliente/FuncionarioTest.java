package br.com.aula.CRUDCliente;

import br.com.aula.CRUDCliente.model.Cargo;
import br.com.aula.CRUDCliente.model.Funcionario;
import br.com.aula.CRUDCliente.model.Sector;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.Assertions;

import java.text.ParseException;

public class FuncionarioTest {

    private Sector sector = new Sector("TI");
    private Cargo cargo = new Cargo("Suporte", 1200, sector);
    private Funcionario funcionario = new Funcionario("Eduarda", "123.456.789.12", "123465", "31/05/2001", "05/01/2022", "Ensino superio completo", cargo, "12345", "user", "user");

    @Test
    public void deveCalcularDecimoTerceiroComSucesso() throws ParseException {

        Assertions.assertEquals(100, funcionario.calcularDecimoTerceiro());
    }
}
