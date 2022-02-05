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
        <link href="<?=base_url("css/style.css")?>" rel="stylesheet" />
        <link href="<?=base_url("css/styles.css")?>" rel="stylesheet" />
        <script src="<?=base_url("js/all.min.js")?>" crossorigin="anonymous"></script>

        <link href="<?=base_url("css/bootstrap.min.css")?>" rel="stylesheet" id="bootstrap-css">
        <script src="<?=base_url("js/bootstrap.min.js")?>"></script>
        <script src="<?=base_url("js/jquery-1.11.1.min.js")?>"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?=site_url("home/index")?>">Setor de RH</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group1">
                    <input class="r1" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configurções</a></li>
                        <li><a class="dropdown-item" href="#!">Registro de atividade</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?=site_url("home/index")?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?=site_url("home/layoutStatic")?>">Static Navigation</a>
                                    <a class="nav-link" href="<?=site_url("home/layoutSidenavLight")?>">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?=site_url("home/login")?>">Login</a>
                                            <a class="nav-link" href="<?=site_url("home/register")?>">Register</a>
                                            <a class="nav-link" href="<?=site_url("home/password")?>">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?=site_url("home/error401")?>">401 Page</a>
                                            <a class="nav-link" href="<?=site_url("home/error404")?>>404 Page</a>
                                            <a class="nav-link" href="<?=site_url("home/error500")?>">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="<?=site_url("home/charts")?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="<?=site_url("home/table")?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>>
<div id="layoutSidenav_content">
    <form class="form-horizontal">
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
                            <input id="CPF" name="CPF" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
                        </div>

                        <label class="col-md-1 control-label" for="name">Nascimento<h11>*</h11></label>
                        <div class="col-md-2">
                            <input id="dataNasc" name="dataNasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
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
                                <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$" OnKeyPress="formatar('## #####-####', this)">
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
                            <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
                        </div>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext">Endereço</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rua</span>
                                <input id="street" name="street" class="form-control" placeholder="" required="" readonly="readonly" type="text">
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
                                <input id="neighborhood" name="neighborhood" class="form-control" placeholder="" required="" readonly="readonly" type="text">
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="prependedtext"></label>

                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Complemento</span>
                                <input id="complement" name="complement" class="form-control" placeholder="" required="" readonly="readonly" type="text">
                            </div>

                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <span class="input-group-addon">Estado</span>
                                <input id="uf" name="uf" class="form-control" placeholder="" required="" readonly="readonly" type="text">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Cidade</span>
                                <input id="city" name="city" class="form-control" placeholder="" required="" readonly="readonly" type="text">
                            </div>

                        </div>

                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="Estado Civil">Estado Civil <h11>*</h11></label>
                        <div class="col-md-2">
                            <select required id="Estado Civil" name="Estado Civil" class="form-control">
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
                                <select required id="sector" name="sector" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label" for="selectbasic">Cargo <h11>*</h11></label>

                            <div class="col-md-3">
                                <select required id="cargo" name="cargo" class="form-control">

                                </select>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="vinculo">Dia de pagamento<h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="dataPag" name="dataPag" placeholder="" class="form-control input-md" required="" type="text" pattern="/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/">

                            </div>



                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Data de ingresso<h11>*</h11></label>
                            <div class="col-md-3">
                                <input id="dataIngresso" name="dataIngresso" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                            </div>

                            <label class="col-md-2 control-label" for="name">Data de ingresso no cargo<h11>*</h11></label>
                            <div class="col-md-3">
                                <input id="dataIngressoCargo" name="dataIngressoCargo" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
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
                            <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
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