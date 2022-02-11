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
    <script src="<?=base_url("js/alerts.js")?>"></script>

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
        <?php if(isset($setor)): ?>
            <form action="<?= site_url("SetorController/saveEditSetor") ?>" method="post" class="form-horizontal">
        <?php else:?>
            <form action="<?= site_url("SetorController/salvar") ?>" method="post" class="form-horizontal">
        <?php endif;?>
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
                                <a href="<?= site_url("SetorController/index") ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a>

                            </div>
                            <div class="col-md-4 control-label">

                                <h3>Dados do setor</h3>
                            </div>
                        </div>
                        <!-- Text input-->
                        <?php if(isset($setor)): ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name"> Nome<h11>*</h11></label>
                            <div class="col-md-8">
                                <input id="id_Sector" name="id_Sector" class="form-control input-md" value="<?=$setor['id']?>" required="" type="hidden">
                                <input id="name" name="name" placeholder="Nome do setor" class="form-control input-md" value="<?=$setor['name']?>" required="required" type="text">
                            </div>
                        </div>
                        <?php else:?>
                            <div class="form-group">
                            <label class="col-md-2 control-label" for="name"> Nome<h11>*</h11></label>
                            <div class="col-md-8">
                                <input id="name" name="name" placeholder="Nome do setor" class="form-control input-md" required="" type="text">
                            </div>
                        </div>
                        <?php endif;?>
                      
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="Cadastrar"></label>
                            <?php if(isset($setor)): ?>
                                <div class="col-md-8">
                                    <button class="btn btn-success" type="Submit" onclick='return alertSetorAtt();'>Cadastrar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                            <?php else:?>
                                <div class="col-md-8">
                                    <button class="btn btn-success" type="Submit" onclick='return alertSetorAdd();'>Cadastrar</button>
                                    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
                                </div>
                            <?php endif;?>
                            
                        </div>

                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>