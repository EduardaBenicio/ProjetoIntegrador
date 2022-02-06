<?php

use App\Controllers\Home;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RH</title>
    <link href="<?= base_url("css/style.css") ?>" rel="stylesheet" />
    <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet" />
    <script src="<?= base_url("js/all.min.js") ?>" crossorigin="anonymous"></script>

    <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet" id="bootstrap-css">
    <script src="<?= base_url("js/bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("js/jquery-1.11.1.min.js") ?>"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->

        <a class="navbar-brand ps-3" href="<?= site_url("home/index") ?>">Setor de RH - Cadastro de Funcionário</a>


    </nav>

    <div id="layoutSidenav_content">
        <form action="<?= site_url("funcionarios/salvarApi") ?>" method="post" class="form-horizontal">
            <fieldset>
                <div class="panel panel-primary1">

                    <div class="panel-body">
                        <div class="form-group">

                            <div class="col-md-11 control-label">
                                <p class="help-block">
                                    <h11>*</h11> Campo Obrigatório
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-1 control-label">
                                <a href="<?= site_url("funcionarios/index") ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a>

                            </div>
                            <div class="col-md-4 control-label">

                                <h3>Dados pessoais do funcionário</h3>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name"> Nome<h11>*</h11></label>
                            <div class="col-md-8">
                                <input id="name" name="name" placeholder="" class="form-control input-md" required="" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name"> Numero da Carteira de Trabalho<h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="ctps" name="ctps" placeholder="" class="form-control input-md" required="" type="text">
                            </div>
                            <label class="col-md-2 control-label" for="name"> RG<h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="rg" name="rg" placeholder="" class="form-control input-md" required="" type="text">
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">CPF <h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                            </div>

                            <label class="col-md-1 control-label" for="name">Nascimento<h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="dataNasc" name="dataNasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                            </div>

                            <!-- Multiple Radios (inline) -->

                            <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>
                            <div class="col-md-4">
                                <label required="" class="radio-inline" for="radios-0">
                                    <input name="sexo" id="sexo" value="feminino" type="radio" required>
                                    Feminino
                                </label>
                                <label class="radio-inline" for="radios-1">
                                    <input name="sexo" id="sexo" value="masculino" type="radio">
                                    Masculino
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="bloodType">Tipo Sanguíneo <h11>*</h11></label>
                            <div class="col-md-2">
                                <select required id="bloodType" name="bloodType" class="form-control">
                                    <option value=""></option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>

                        </div>
                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedtext">Telefone</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input id="prependedtext" name="phone" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                                </div>
                            </div>
                        </div>

                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input id="email" name="email" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                </div>
                            </div>
                        </div>


                        <!-- Search input-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="CEP">CEP <h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="cep" name="cep" placeholder="Apenas números" class="form-control" required="" value="" type="text" maxlength="8" pattern="[0-9]+$">
                            </div>

                        </div>

                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedtext">Endereço</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Rua</span>
                                    <input id="street" name="street" class="form-control" placeholder="" required="" type="text">
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon">Nº <h11>*</h11></span>
                                    <input id="number" name="number" class="form-control" placeholder="" required="" type="text">
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">Bairro</span>
                                    <input id="neighborhood" name="neighborhood" class="form-control" placeholder="" required="" type="text">
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedtext"></label>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Complemento</span>
                                    <input id="complemet" name="complemet" class="form-control" placeholder="" required="" type="text">
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-addon">Estado</span>
                                    <input id="uf" name="uf" class="form-control" placeholder="" required="" type="text">
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">Cidade</span>
                                    <input id="city" name="city" class="form-control" placeholder="" required="" type="text">
                                </div>

                            </div>

                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="estadoCivil">Estado Civil <h11>*</h11></label>
                            <div class="col-md-2">
                                <select required id="estadoCivil" name="estadoCivil" class="form-control">
                                    <option value=""></option>
                                    <option value="Solteiro(a)">Solteiro(a)</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Viuvo(a)">Viuvo(a)</option>
                                </select>
                            </div>

                        </div>


                        <!-- Select Basic -->
                        <div class="form-group">

                            <label class="col-md-2 control-label" for="selectbasic">Escolaridade <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="schooling" name="schooling" class="form-control">
                                    <option value=""></option>
                                    <option value="Analfabeto">Analfabeto</option>
                                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                                    <option value="Fundamental Completo">Fundamental Completo</option>
                                    <option value="Médio Incompleto">Médio Incompleto</option>
                                    <option value="Médio Completo">Médio Completo</option>
                                    <option value="Superior Incompleto">Superior Incompleto</option>
                                    <option value="Superior Completo">Superior Completo</option>
                                </select>
                            </div>



                        </div>



                        <div id="newpost">
                            <div class="form-group">
                                <div class="col-md-3 control-label">
                                    <h3>Dados profissionais</h3>
                                </div>
                            </div>
                            

                            <div class="form-group">

                                <label class="col-md-2 control-label" for="selectbasic">Setor <h11>*</h11></label>
                                <div class="col-md-3">
                                    <select name="setores" required="required" class="form-control">
                                        <option value=""> -- Escolha -- </option>
                                        <?php foreach ($setores as $key => $item) :
                                            $selected = $item['id_Sector'];
                                        ?>
                                            <option <?= $selected ?> value="<?= $selected ?>"><?= $item["name"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                

                            </div>
                            <div class="form-group">

                                <label class="col-md-2 control-label" for="selectbasic">Cargo <h11>*</h11></label>
                                <div class="col-md-3">
                                    
                                    <select name="cargo" required="required" class="form-control">
                                        <option value=""> -- Escolha -- </option>
                                        
                                        <?php foreach ($cargos as $key => $item):?>
                                            <?php if($selected == $item['sector']['id_Sector']):
                                                    $selected1 = $item['id']; 
                                            ?>
                                                    <option <?= $selected1 ?> value="<?= $selected1 ?>"><?= $item["name"] ?></option>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                     
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="vinculo">Dia de pagamento<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dataPag" name="dataPag" placeholder="" class="form-control" required="" type="text">

                                </div>



                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Data de ingresso<h11>*</h11></label>
                                <div class="col-md-3">
                                    <input id="dataIngresso" name="dataIngresso" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>

                                <label class="col-md-2 control-label" for="name">Data de ingresso no cargo<h11>*</h11></label>
                                <div class="col-md-3">
                                    <input id="dataIngressoCargo" name="dataIngressoCargo" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>
                            </div>
                            <div class="form-group">

                            </div>

                            <div class="form-group">
                                <!-- Text input-->

                                <label class="col-md-2 control-label" for="profissao">Usuário<h11>*</h11></label>
                                <div class="col-md-3">
                                    <input id="user" name="user" type="text" placeholder="" class="form-control input-md" required="">

                                </div>

                                <label class="col-md-2 control-label" for="profissao">Senha<h11>*</h11></label>
                                <div class="col-md-3    ">
                                    <input id="password" name="password" type="text" placeholder="" class="form-control input-md" required="">

                                </div>
                            </div>


                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="Cadastrar"></label>
                            <div class="col-md-8">
                                <button class="btn btn-success" type="Submit">Cadastrar</button>
                                <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>


            </fieldset>
        </form>
    </div>
</body>

</html>