<?php if (isset($_SESSION["user"]["name"])) : ?>
    <?php include 'masterhead.php'; ?>

    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Painel de Ferias</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Painel</li>
                </ol>
                <div class="row">



                </div>

                <div class="container-fluid px-4">

                    <a class="btn btn-primary" href="<?= site_url("FeriasController/saveFerias/{$funcionario}") ?>" role="button">Cadastrar Férias</a>

                    <div class="row">

                    </div>
                    <br>
          
                    <div class="container-fluid px-4">
                        
                      
                        <div class="row">
                            <p id="success" name="success" style="color:green;"><?=session("success");?> </p>
                        </div>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabela de Ferias
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Funcionario</th>
                                            <th>Inicio das Férias</th>
                                            <th>Fim das Férias</th>
                                            <th>Valor Pago</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Funcionario</th>
                                            <th>Inicio das Férias</th>
                                            <th>Fim das Férias</th>
                                            <th>Valor Pago</th>
                                            <th>Deletar</th> 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if(isset($ferias)): ?>
                                            <?php foreach($ferias as $key =>$item):?>
                                            <tr>
                                                <th id="funcName" name="funcName">

                                                    <?= $item['funcionario']['name'] ?>

                                                </th>
                                                <th id="inicio_das_ferias" name="inicio_das_ferias">

                                                    <?= $item['inicio_das_ferias'] ?>

                                                </th>
                                                <th id="fim_das_ferias" name="fim_das_ferias">

                                                    <?= $item['fim_das_ferias'] ?>

                                                </th>
                                                <th>
                                                    <a id="valor_pago_ferias" name="valor_pago_ferias" href="">
                                                    R$<?=number_format($item['valor_pago_ferias'], 2,",", ".")?>
                                                    </a>
                                                </th>
                                                <!--DELETE-->
                                                <th>

                                                    <a id="deletar" name="deletar" href="<?= site_url("FeriasController/deleteFerias/{$item['id']}/{$funcionario}") ?>" onclick='return confirmDeleteCargo();'>
                                                        <svg class="delete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 
                                                                0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59
                                                                0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 
                                                                0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0
                                                                0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg>
                                                    </a>
                                                </th>

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </main>
        <?php include 'footer.php'; ?>
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