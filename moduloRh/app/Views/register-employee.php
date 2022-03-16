<?php

use App\Controllers\Home;
?>
<?php if (isset($_SESSION["user"]["name"])) : ?>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?= base_url("js/showCargos.js") ?>"></script>
        <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet" id="bootstrap-css">
        <script src="<?= base_url("js/bootstrap.min.js") ?>"></script>
        <script src="<?= base_url("js/jquery-1.11.1.min.js") ?>"></script>

    </head>


    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->

            <a class="navbar-brand ps-3" href="<?= site_url("home/principal") ?>">Setor de RH - Cadastro de Funcionário</a>


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
                                    <?php if(isset($dados['id'])):?>
                                        <a href="<?= site_url("funcionarios/dashboardEmployee/{$dados['id']}") ?>">
                                            <i class="fas fa-arrow-left me-1"></i>
                                            Voltar
                                        </a>
                                     <?php else:?>
                                        <a href="<?= site_url("funcionarios/index") ?>">
                                            <i class="fas fa-arrow-left me-1"></i>
                                            Voltar
                                        </a>
                                    <?php endif;?>   
                                </div></br>

                                <div class="col-md-4 control-label">

                                    <h3>Dados pessoais do funcionário</h3>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name"> Nome<h11>*</h11></label>
                                <div class="col-md-8">
                                    <input id="id" name="id" value="<?= _v($dados, "id") ?>" type="hidden">
                                    <input id="name" name="name" placeholder="" value="<?= _v($dados, "name") ?>" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name"> Numero da Carteira de Trabalho<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="ctps" name="ctps" placeholder="" value="<?= _v($dados, "ctps") ?>" class="form-control input-md" required="" type="text">
                                </div>
                                <label class="col-md-2 control-label" for="name"> RG<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="rg" name="rg" placeholder="" value="<?= _v($dados, "rg") ?>" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">CPF <h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="cpf" name="cpf" placeholder="Apenas números" value="<?= _v($dados, "cpf") ?>" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                                </div>

                                <label class="col-md-1 control-label" for="name">Nascimento<h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="dataNasc" name="dataNasc" value="" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                </div>

                                <!-- Multiple Radios (inline) -->

                                <label class="col-md-1 control-label" for="Sexo">Sexo <h11>*</h11></label>
                                <div class="col-md-2">
                                    <select required id="sexo" name="sexo" class="form-control">
                                        <option value="<?= _v($dados, "sexo") ?>" selected><?= _v($dados, "sexo"); ?></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="bloodType">Tipo Sanguíneo <h11>*</h11></label>
                                <div class="col-md-2">
                                    <select required id="bloodType" name="bloodType" class="form-control">
                                        <option value="<?= _v($dados, "bloodType") ?>" selected><?= _v($dados, "bloodType"); ?></option>
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
                                        <input id="phone" name="phone" value="<?= _v($dados, "phone") ?>" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
                                    </div>
                                </div>
                            </div>

                            <!-- Prepended text-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="email" name="email" value="<?= _v($dados, "email") ?>" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>
                                </div>
                            </div>


                            <!-- Search input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="CEP">CEP <h11>*</h11></label>
                                <div class="col-md-2">
                                    <input id="cep" name="cep" value="<?= _v($dados, "cep") ?>" placeholder="Apenas números" class="form-control" required="" value="" type="text" maxlength="8" pattern="[0-9]+$">
                                </div>

                            </div>

                            <!-- Prepended text-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="prependedtext">Endereço</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rua</span>
                                        <input id="street" value="<?= _v($dados, "street") ?>" name="street" class="form-control" placeholder="" required="" type="text">
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">Nº <h11>*</h11></span>
                                        <input id="number" value="<?= _v($dados, "number") ?>" name="number" class="form-control" placeholder="" required="" type="text">
                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Bairro</span>
                                        <input id="neighborhood" value="<?= _v($dados, "neighborhood") ?>" name="neighborhood" class="form-control" placeholder="" required="" type="text">
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="prependedtext"></label>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Complemento</span>
                                        <input id="complemet" value="<?= _v($dados, "complemet") ?>" name="complemet" class="form-control" placeholder="" required="" type="text">
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">Estado</span>
                                        <input id="uf" value="<?= _v($dados, "uf") ?>" name="uf" class="form-control" placeholder="" required="" type="text">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Cidade</span>
                                        <input id="city" value="<?= _v($dados, "city") ?>" name="city" class="form-control" placeholder="" required="" type="text">
                                    </div>

                                </div>

                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="estadoCivil">Estado Civil <h11>*</h11></label>
                                <div class="col-md-2">
                                    <select required id="estadoCivil" name="estadoCivil" class="form-control">
                                        <option value="<?= _v($dados, "estadoCivil") ?>" selected><?= _v($dados, "estadoCivil"); ?></option>
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
                                        <option value="<?= _v($dados, "schooling") ?>" selected><?= _v($dados, "schooling"); ?></option>
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

                                <?php if (!isset($dados['id'])) : ?>
                                    <div class="form-group">




                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="sector">Setor <h11>*</h11></label>
                                            <div class="col-md-3">
                                                <select required id="Funcionarios/cargosDoSetor" name="setores" class="form-control setor">
                                                    <option value=""></option>
                                                    <?php foreach ($setores as $key => $item) : ?>
                                                        <option value="<?= $item['id_Sector'] ?>"><?= $item['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="cargo">Cargo <h11>*</h11></label>
                                        <div class="col-md-3">
                                            <select required id="cargo" name="cargo" class="form-control cargo">
                                                <option value="">Selecione um Setor antes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">Data de ingresso<h11>*</h11></label>
                                        <div class="col-md-3">
                                            <input id="dataIngresso" value="<?= _v($dados, "dataIngresso") ?>" name="dataIngresso" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" min="<?= date('d/m/Y') ?>" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                        </div>

                                        <label class="col-md-2 control-label" for="name">Data de ingresso no cargo<h11>*</h11></label>
                                        <div class="col-md-3">
                                            <input id="dataIngressoCargo" value="<?= _v($dados, "dataIngressoCargo") ?>" name="dataIngressoCargo" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                <?php endif; ?>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="vinculo">Dia de pagamento<h11>*</h11></label>
                                    <div class="col-md-2">
                                        <input id="dataPag" city name="dataPag" value="<?= _v($dados, "dataPag") ?>" placeholder="" class="form-control" required="" type="text">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Text input-->

                                    <label class="col-md-2 control-label" for="profissao">Usuário<h11>*</h11></label>
                                    <div class="col-md-3">
                                        <?php if (isset($dados['usuario']['username'])) : ?>
                                            <input id="id_user" name="id_user" value="<?= $dados['usuario']['id'] ?>" type="hidden" placeholder="" class="form-control input-md" required="">
                                            <input id="user" name="user" value="<?= $dados['usuario']['username'] ?>" type="text" placeholder="" class="form-control input-md" required="">
                                        <?php else : ?>
                                            <input id="user" name="user" type="text" placeholder="" class="form-control input-md" required="">
                                        <?php endif; ?>

                                        </div>
                                    <div class="form-group">
                                    <label class="col-md-2 control-label" for="profissao">Senha<h11>*</h11></label>
                                        <div class="col-md-3    ">
                                            <input id="password" name="password" type="text" placeholder="" class="form-control input-md" required="">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <!-- Text input-->

                                        <label class="col-md-2 control-label" for="authorities">Nível de acesso<h11>*</h11></label>
                                        <div class="col-md-3">
                                            <select required name="authorities" class="form-control">
                                                <option value=""></option>
                                                <option value="ROLE_ADMIN,ROLE_USER">ADMIN</option>
                                                <option value="ROLE_USER">PADRÃO</option>
                                            </select>
                                        </div>



                                    </div>

                                </div>
                                <br>

                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Enviar"></label>
                                    <div class="col-md-8">
                                        <button id="enviar" class="btn btn-success" type="Submit">Enviar</button>
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
<?php else : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>erro 401 - RH</title>
        <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet" />
        <script src="<?= base_url("js/all.min.js") ?>" crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <h1 class="display-1">401</h1>
                                    <p class="lead">Não autorizadp</p>
                                    <p>Acesso a página negado.</p>
                                    <a href="<?= site_url("home/index") ?>">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Retorne ao login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>" crossorigin="anonymous"></script>
        <script src="<?= base_url("js/scripts.js") ?>"></script>>
    </body>

    </html>
<?php endif; ?>