<?php if(isset($_SESSION["user"]["name"])):?>

<?php include 'masterhead.php';?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Painel de ajustes salariais</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Painel de funcionários</li>
                        </ol>
                        <a class="btn btn-primary" href="<?=site_url("ajustesSalariais/historico")?>" role="button">Histórico de Ajustes</a>
                        
                        <div class="row">
                             
                        </div>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabela de Cargos
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Cargo</th>
                                            <th>Salário</th>
                                            <th>Setor</th>
                                            <th></th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cargo</th>
                                            <th>Salário</th>
                                            <th>Setor</th>
                                            <th></th>
                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if(isset($cargos)): ?>
                                            <?php foreach($cargos as $key =>$item):?>
                                            <tr>
                                                <th>
                                                    <a href="">
                                                        <?=$item['name']?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="">
                                                        <?=$item['salario']?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="">
                                                        <?=$item['sector']['name']?>
                                                    </a>
                                                </th>
                                                 <!--EDIT-->
                                                 <th >
                                                    <a class="btn btn-primary" href="<?=site_url("ajustesSalariais/registerAjuste/{$item['id']}")?>" role="button">Registrar Ajuste</a>
                                                </th>
                                            </tr>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </tbody>
                                </table>
                               
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