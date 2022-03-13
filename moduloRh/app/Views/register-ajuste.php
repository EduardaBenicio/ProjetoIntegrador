<?php if (isset($_SESSION["user"]["name"])) : ?>
    <?php include 'masterhead.php'; ?>


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dados do Cargo</h1>
                <ol class="breadcrumb mb-4">
                    <a href="<?= site_url("ajustesSalariais/index/{$cargo['id']}") ?>">
                        <i class="fas fa-arrow-left me-1"></i>
                        Voltar
                    </a>
                </ol>

                <!-- Text input-->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card mb-4">
                            <div class="card-header">
                                Dados do Cargo
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Nome:</b></h8>
                                <h10 id= "nomeCargo"> <?= $cargo['name'] ?></h10>

                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Salário:</b></h8>
                                <h10 id= "salarioAtual"> <?= number_format($cargo['salario'], 2,".",",")?></h10>
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Setor:</b></h8>
                                <h10 id= "setor"> <?= $cargo['sector']['name'] ?></h10>
                            </div>

                        </div>
                    </div>
                </div>

                <form action="<?= site_url("ajustesSalariais/salvarApi") ?>" method="post">
                    <input id="id_ajuste" type="hidden" name="id_ajuste" value="<?= _v($dados, 'id_ajuste') ?>" />
                    <input id="id_cargo" type="hidden" name="cargo" value="<?= _v($cargo, 'id') ?>" />
                    <input id="salario_antigo" type="hidden" name="salario_antigo" value="<?= _v($cargo, 'salario') ?>" />
                    <div class="form-group">

                        <label class="col-md-2 control-label" for="vinculo">Novo Salário<h11>*</h11></label>
                        <div class="col-md-2">
                            <input id="salario_novo" value="<?= _v($dados, 'salario_novo') ?>" name="salario_novo" placeholder="" class="form-control" required="" type="text">

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