<?php if(isset($_SESSION["user"]["name"])):?>
<?php include 'masterhead.php'; ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dados do Cargo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Painel</li>
            </ol>
    
            <?php if(isset($cargo['name'])):?>
                <?php if(isset($alert)):?>
                    <div id="sucesso" name="sucesso" class="alert alert-success alert-dismissible" role="alert">
                        Cargo adicionado com sucesso!
                    </div>
                <?php endif;?>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card mb-4">
                            <div class="card-header">
                                Dados do Cargo
                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Nome do Cargo:</b></h8>
                                <h10 id="nome" name="nome"> <?= $cargo['name'] ?></h10>

                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Setor:</b></h8>
                                <h10 id="nomeSector" name="nomeSector"> <?= $cargo['sector']['name'] ?></h10>

                            </div>
                            <div class="col-xl-9 col-md-6">
                                <h8><b>Salário:</b></h8>
                                <h10 id="salario" name="salario"> R$<?=number_format($cargo['salario'], 2,".",",")?></h10>

                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-1 control-label">
                                <a href="<?= site_url("CargoController/index") ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a>

                            </div>
            <?php else:?>
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
            <?php endif;?>
        </body>
</html>
<?php else:?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>erro 401 - RH</title>
        <link href="<?=base_url("css/styles.css")?>" rel="stylesheet" />
        <script src="<?=base_url("js/all.min.js")?>" crossorigin="anonymous"></script>
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
                                    <a href="<?=site_url("home/index")?>">
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
        <script src="<?=base_url("js/bootstrap.bundle.min.js")?>" crossorigin="anonymous"></script>
        <script src="<?=base_url("js/scripts.js")?>"></script>>
    </body>
</html>
<?php endif;?>