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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?= base_url("js/showCargos.js") ?>"></script>

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
                <form action="<?= site_url("Funcionarios/salvarPromocao") ?>" method="post" class="form-horizontal">
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
                                    <div class="col-md-1 control-label">
                                        <a href="<?= site_url("Funcionarios/promocao/{$id}") ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a>

                                    </div>
                                    <div class="col-md-3 control-label">

                                        <h3>Promover o funcionário para:</h3>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <?php if (isset($setor)) : ?>
                                    <div class="form-group">
                                       
                                            <input id="id_user" name="id_user" class="form-control input-md" value="<?= $id ?>" required="" type="hidden">
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="sector">Setor <h11>*</h11></label>
                                                <div class="col-md-3">
                                                    <select required id="Funcionarios/cargosDoSetor" name="sector" class="form-control setor" >
                                                        <option value=""></option> 
                                                            <?php foreach ($setor as $key => $item) : ?>
                                                                <option value="<?= $item['id_Sector'] ?>"><?= $item['name'] ?></option>
                                                            <?php endforeach; ?>                     
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="cargo">Cargo <h11>*</h11></label>
                                                <div class="col-md-3">
                                                    <select required id="cargo" name="cargo" class="form-control cargo" >
                                                        <option value="">Selecione um Setor antes</option>                     
                                                    </select>
                                                </div>                                              
                                            </div>      
                                        </div>
                                    </div>

                                <?php endif; ?>

                            </div>

                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Cadastrar"></label>
                                <?php if (isset($setor)) : ?>
                                    <div class="col-md-8">
                                        <button id="promover"class="btn btn-success" type="Submit">Promover</button>
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