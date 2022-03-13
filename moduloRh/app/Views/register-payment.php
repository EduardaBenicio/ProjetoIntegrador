<?php if (isset($_SESSION["user"]["name"])) : ?>
    <?php include 'masterhead.php'; ?>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dados do Funcionário</h1>
                <ol class="breadcrumb mb-4">
                    <a href="<?= site_url("funcionarios/dashboardEmployee/{$funcionario['id']}") ?>">
                        <i class="fas fa-arrow-left me-1"></i>
                        Voltar
                    </a>
                </ol>

                <!-- Text input-->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card mb-4">
                            <div class="card-header">
                                Dados Pessoais
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Nome:</b></h8>
                                <h10 id="nameFuncionario"> <?= $funcionario['name'] ?></h10>

                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>CPF:</b></h8>
                                <h10 id="cpf"> <?= $funcionario['cpf'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>RG:</b></h8>
                                <h10 id="rg"> <?= $funcionario['rg'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>CTPS:</b></h8>
                                <h10 id="ctps"> <?= $funcionario['ctps'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Data de Nascimento:</b></h8>
                                <h10 id="dataNasc"> <?= $funcionario['dataNasc'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Tipo Sanguíneo:</b></h8>
                                <h10 id="bloodType"> <?= $funcionario['bloodType'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Sexo:</b></h8>
                                <h10 id="sexo"> <?= $funcionario['sexo'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Estado Cívil:</b></h8>
                                <h10 id="estadoCivil"> <?= $funcionario['estadoCivil'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Escolaridade:</b></h8>
                                <h10 id="schooling"> <?= $funcionario['schooling'] ?></h10>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                Dados Profissionais
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Data de Ingresso:</b></h8>
                                <h10 id="dataIngresso"> <?= $funcionario['dataIngresso'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Setor:</b></h8>
                                <h10 id="setorNome"> <?= $funcionario['cargo']['sector']['name'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Cargo:</b></h8>
                                <h10 id="cargoNome"> <?= $funcionario['cargo']['name'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Data de Ingresso no Cargo:</b></h8>
                                <h10 id="dataIngressoCargo"> <?= $funcionario['dataIngressoCargo'] ?></h10>
                            </div>

                            <div class="col-xl-9 col-md-6">
                                <h8><b>Salário:</b></h8>
                                <h10 id="salario"> R$<?= $funcionario['cargo']['salario'] . ',00' ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Dia de Pagamento:</b></h8>
                                <h10 id="dataPag"> <?= $funcionario['dataPag'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Valor Devido:</b></h8>
                                <h10 id="valorDevidoAtual"> R$<?= $funcionario['valorDevidoAtual'] . ',00' ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Valor do desconto do INSS:</b></h8>
                                <h10 id="inss"> R$<?= $funcionario['inss'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Data do Ultimo Pagamento:</b></h8>
                                <h10 id="dataUltimoPag"> <?= $funcionario['dataUltimoPag'] ?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Décimo Terceiro:</b></h8>
                                <h10 id="decimoTerceiro"> <?= $funcionario['decimoTerceiro'] ?></h10>
                            </div>

                        </div>
                    </div>

                    <form action="<?= site_url("pagamentos/salvarApi") ?>" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $funcionario['id'] ?>" />
                        <div class="form-group">

                            <label class="col-md-2 control-label" for="vinculo">Valor a ser pago<h11>*</h11></label>
                            <div class="col-md-2">
                                <input id="value_paid" value="<?= $funcionario['valorDevidoAtual'] ?>" name="value_paid" placeholder="" class="form-control" required="" type="text">

                            </div>
                        </div>
                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="Cadastrar"></label>
                            <div class="col-md-8">
                                <button id="registrar" class="btn btn-success" type="Submit">Registrar</button>
                                <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                            </div>
                        </div>
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