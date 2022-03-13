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
        <script src="<?= base_url("js/alerts.js") ?>"></script>

        <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet" id="bootstrap-css">
        <script src="<?= base_url("js/bootstrap.min.js") ?>"></script>
        <script src="<?= base_url("js/jquery-1.11.1.min.js") ?>"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->

            <a class="navbar-brand ps-3" href="<?= site_url("home/index") ?>">Setor de RH - Cadastro de Setores</a>


        </nav>

        <div id="layoutSidenav_content">
            <?php if (isset($setor)) : ?>
                <form action="<?= site_url("SetorController/saveEditSetor") ?>" method="post" class="form-horizontal">
                <?php else : ?>
                    <form action="<?= site_url("SetorController/salvar") ?>" method="post" class="form-horizontal">
                    <?php endif; ?>
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
                                    <a href="<?= site_url("cargoController/index/") ?>">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Voltar
                                    </a>
                                    <div class="col-md-4 control-label">

                                        <h3>Dados do setor</h3>

                                    </div>

                                </div>

                                <!-- Text input-->
                                <?php if (isset($setor)) : ?>
                                    <div class="form-group">

                                        <label class="col-md-2 control-label" for="name"> Nome<h11>*</h11></label>
                                        <div class="col-md-8">
                                            <input id="id_Sector" name="id_Sector" class="form-control input-md" value="<?= $setor['id'] ?>" required="" type="hidden">
                                            <input id="name" name="name" placeholder="Nome do setor" class="form-control input-md" value="<?= $setor['name'] ?>" required="required" type="text">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group">

                                        <label class="col-md-2 control-label" for="name"> Nome<h11>*</h11></label>
                                        <div class="col-md-8">

                                            <input id="name" name="name" placeholder="Nome do setor" class="form-control input-md" required="" type="text">

                                        </div>

                                    </div>
                                <?php endif; ?>





                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Cadastrar"></label>
                                <?php if (isset($setor)) : ?>
                                    <div class="col-md-8">
                                        <button id="registrar" class="btn btn-success" type="Submit">Cadastrar</button>
                                        <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-8">
                                        <button id="registrar" class="btn btn-success" type="Submit">Cadastrar</button>
                                        <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                    </div>
                                <?php endif; ?>

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