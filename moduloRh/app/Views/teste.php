<!DOCTYPE html>

    <head>

    </head>
    <body>
        <form method="post" action="<?=site_url("Home/salvar")?>">
            <div>
                <h3>Dados pessoais</h3>
                <label for="nome">Nome:</label>
                <input type="text" name="nome"/><br>
        
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf"/><br>
        
                <label for="rg">RG:</label>
                <input type="text" name="rg"/><br>

                <label for="ctps">Numero da carteira de trabalho:</label>
                <input type="text" name="ctps"/><br>
        
                <label for="dataNas">Data de nascimento:</label>
                <input type="date" name="dataNas"/><br>
        
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone"/><br>
        
                <label for="tipoSang">Tipo sanguineo</label>
                <input type="radio" name="tipoSang" value="A-" id="A-"/>A-
                <input type="radio" name="tipoSang" value="A+" id="A+"/>A+
                <input type="radio" name="tipoSang" value="B-" id="B-"/>B-
                <input type="radio" name="tipoSang" value="B+" id="B+"/>B+
                <input type="radio" name="tipoSang" value="AB-" id="AB-"/>AB-
                <input type="radio" name="tipoSang" value="AB+" id="AB+"/>AB+
                <input type="radio" name="tipoSang" value="O-" id="O-"/>O-
                <input type="radio" name="tipoSang" value="O+" id="O+"/>O+<br>
        
                <label for="escolaridade">Escolaridade</label><br>
                <select name="escolaridade">
                    <option value="Ensino fundamental incompleto">Ensino fundamental incompleto</option>
                    <option value="Ensino fundamental completo">Ensino fundamental completo</option>
                    <option value="Ensino médio incompleto">Ensino médio incompleto</option>
                    <option value="Ensino médio completo">Ensino médio completo</option>
                    <option value="Ensino superior incompleto">Ensino superior incompleto</option>
                    <option value="Ensino superior completo">Ensino superior completo</option>
                </select><br>
            </div>

            <div>
                <h3>Endereço</h3>

                <label for="rua">Rua:</label>
                <input type="text" name="rua"/><br>

                <label for="numero">N°:</label>
                <input type="text" name="numero"/><br>

                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro"/><br>

                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade"/><br>
                
                <label for="cep">CEP:</label>
                <input type="text" name="cep"/><br>

                <label for="complemento">Complemento:</label>
                <input type="text" name="complemento"/><br>

                <label for="uf">UF:</label>
                <input type="text" name="uf"/><br>
            </div>

            <div>
                <h3>Dados da contratação do funcionário</h3>

                <label for="cargo">Cargo:</label><br>
                <select name="cargo">
                    <option value="gerente">Gerente</option>
                </select><br>

                <label for="dataIngresso">Data de ingresso na empresa:</label>
                <input type="date" name="dataIngresso"/><br>

                <label for="dataIngressoC">Data de ingresso no cargo:</label>
                <input type="date" name="dataIngressoC"/><br>
                
                <label for="diaPagamento">Dia de pagamento:</label>
                <input type="number" name="diaPagamento"/><br>

            
            </div>

            <div>
                <h3>Dados de login</h3>

                <label for="usuario">usuário:</label>
                <input type="text" name="usuario"/><br>
                
                <label for="senha">Senha:</label>
                <input type="password" name="senha"/><br>

            </div>

            <button>Enviar</button>
        </form>
        


    </body>
</html>