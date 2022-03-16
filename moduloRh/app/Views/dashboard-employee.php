<?php if (isset($_SESSION["user"]["name"])) : ?>
    <?php include 'masterhead.php'; ?>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dados do Funcionário</h1>
                <ol class="breadcrumb mb-4">
                    <a href="<?= site_url("funcionarios/index") ?>">
                        <i class="fas fa-arrow-left me-1"></i>
                        Voltar
                    </a>
                </ol>


                <?php if (isset($funcionario['name'])) : ?>
                    <?php if (isset($alert)) : ?>
                        <div id="sucesso" name="sucesso" class="alert alert-success alert-dismissible" role="alert">
                            Funcionário adicionado com sucesso!
                        </div>
                    <?php endif; ?>
                    <?php if (isset($alertPayment)) : ?>
                        <div id="sucessoPayment" name="sucessoPayment" class="alert alert-success alert-dismissible" role="alert">
                            Pagamento registrado com sucesso!
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <?php if ($dias > 7) : ?>
                            <div class="col-xl-3 col-md-6">

                                <div class="card bg-primary text-white mb-4">
                                    <a id="registrarPagamento" name="registrarPagamento" class="btn btn-primary" href="<?= site_url("pagamentos/registerPayment/{$funcionario['id']}") ?>" role="button">Registrar pagamento</a>

                                </div>

                            </div>
                        <?php endif; ?>
                        <?php if (isset($diasIngressado)) : ?>
                            <?php if ($diasIngressado >= 365) : ?>
                                <div class="col-xl-2 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <a id="registrarFerias" name="registrarFerias" class="btn btn-primary" href="<?= site_url("FeriasController/indexDeUnicoFuncionario/{$funcionario['id']}") ?>" role="button">Registrar férias</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="col-xl-3 col-md-6  ">
                            <div class="card bg-primary text-white mb-4">
                                <a id="registrarPromocao" name="registrarPromocao" class="btn btn-primary" href="<?= site_url("funcionarios/promocao/{$funcionario['id']}") ?>" role="button">Registrar promoção</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <a id="editar" name="editar" class="btn btn-primary" href="<?= site_url("Funcionarios/registerEmployee/{$funcionario['id']}") ?>" role="button">Editar informações</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Dados Pessoais
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Nome:</b></h8>
                                    <h10 id="name" name="name"> <?= $funcionario['name'] ?></h10>

                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>CPF:</b></h8>
                                    <h10 id="cpf" name="cpf"> <?= $funcionario['cpf'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>RG:</b></h8>
                                    <h10 id="rg" name="rg"> <?= $funcionario['rg'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>CTPS:</b></h8>
                                    <h10 id="ctps" name="ctps"> <?= $funcionario['ctps'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Data de Nascimento:</b></h8>
                                    <h10 id="dataNasc" name="dataNasc"> <?= $funcionario['dataNasc'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Tipo Sanguíneo:</b></h8>
                                    <h10 id="bloodType" name="bloodType"> <?= $funcionario['bloodType'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Sexo:</b></h8>
                                    <h10 id="sexo" name="sexo"> <?= $funcionario['sexo'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Estado Cívil:</b></h8>
                                    <h10 id="estadoCivil" name="estadoCivil"> <?= $funcionario['estadoCivil'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Escolaridade:</b></h8>
                                    <h10 id="schooling" name="schooling"> <?= $funcionario['schooling'] ?></h10>

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
                                    <h10 id="dataIngresso" name="dataIngresso"> <?= $funcionario['dataIngresso'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Setor:</b></h8>
                                    <h10 id="setorName" name="setorName"> <?= $funcionario['cargo']['sector']['name'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Cargo:</b></h8>
                                    <h10 id="cargoName" name="cargoName"> <?= $funcionario['cargo']['name'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Data de Ingresso no Cargo:</b></h8>
                                    <h10 id="dataIngressoCargo" name="dataIngressoCargo"> <?= $funcionario['dataIngressoCargo'] ?></h10>
                                </div>

                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Salário:</b></h8>
                                    <h10 id="cargoSalario" name="cargoSalario"> R$<?= number_format($funcionario['cargo']['salario'], 2, ".", ",") ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Dia de Pagamento:</b></h8>
                                    <h10 id="dataPag" name="dataPag"> <?= $funcionario['dataPag'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Valor Devido:</b></h8>
                                    <h10> R$<?= number_format($funcionario['valorDevidoAtual'], 2, ".", ",") ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Valor do desconto do INSS:</b></h8>
                                    <h10 id="inss" name="inss"> R$<?= number_format($funcionario['inss'], 2, ".", ",") ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Data do Ultimo Pagamento:</b></h8>
                                    <h10 id="dataUltimoPag" name="dataUltimoPag"> <?= $funcionario['dataUltimoPag'] ?></h10>
                                </div>
                                <div class="col-xl-9 col-md-6">
                                    <h8><b>Décimo Terceiro:</b></h8>
                                    <h10 id="decimoTerceiro" name="decimoTerceiro"> R$<?= number_format($funcionario['decimoTerceiro'], 2) ?></h10>
                                </div>
                                <?php if (isset($diasIngressado)) : ?>
                                    <div class="col-xl-9 col-md-6">
                                        <h8><b>Total de dias na empresa:</b></h8>
                                        <h10> <?= (int) $diasIngressado ?> dias</h10>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($diasIngressadoNoCargo)) : ?>
                                    <div class="col-xl-9 col-md-6">
                                        <h8><b>Total de dias no Cargo:</b></h8>
                                        <h10> <?= (int) $diasIngressadoNoCargo ?> dias</h10>
                                    </div>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>
            </div>
        <?php else : ?>
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <p class="lead">Sem conexão com o servidor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <?php endif; ?>
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