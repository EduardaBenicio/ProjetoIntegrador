<?php if(isset($_SESSION["user"]["name"])):?>
<?php include 'masterhead.php';?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Painel Recursos Humanos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Painel Recursos Humanos</li>
                        </ol>
                        
                       
                        <div class="row">
                            <div  class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Funcionários</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a id="botaoFuncionario" name="botaoFuncionario" class="small text-white stretched-link" href="<?=site_url("funcionarios/index")?>">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Histórico de Pagamentos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a id="botaoPagamentos" name="botaoPagamentos" class="small text-white stretched-link" href="<?=site_url("pagamentos/index")?>">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Setores</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a id="botaoSetores" name="botaoSetores" class="small text-white stretched-link" href="<?=site_url("SetorController/index")?>">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Cargos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a id="botaoCargos" name="botaoCargos" class="small text-white stretched-link" href="<?=site_url("CargoController/index")?>">Ver detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </main>

<?php include 'footer.php'; ?>
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
