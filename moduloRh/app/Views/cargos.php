<?php if (isset($_SESSION["user"]["name"])) : ?>
    <?php include 'masterhead.php'; ?>

    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Painel de Setores</h1>
                <ol class="breadcrumb mb-4">
                    <a href="<?= site_url("home/principal") ?>">
                        <i class="fas fa-arrow-left me-1"></i>
                        Voltar
                    </a>
                </ol>
                <div class="row">

                    <?php if (isset($setores)) : ?>
                        <?php foreach ($setores as $key => $item) : ?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?= $item['name'] ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?= site_url("CargoController/listCargoBySector/{$item['id_Sector']}") ?>">Ver Cargos</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Painel de Cargos</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Painel de Cargos</li>
                    </ol>
                    <?php if (isset($cargos)) : ?>
                        <a class="btn btn-primary" href="<?= site_url("CargoController/registerCargo") ?>" role="button">Cadastrar Cargo</a>
                    <?php else : ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            Selecione um SETOR acima!
                        </div>
                    <?php endif; ?>


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
                                        <th>Permissão</th>
                                        <th>Setor</th>
                                        <th>Ajuste Salárial</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cargo</th>
                                        <th>Salário</th>
                                        <th>Permissão</th>
                                        <th>Setor</th>
                                        <th>Ajuste Salárial</th>
                                        <th>Editar</th>
                                        <th>Deletar</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (isset($cargos)) : ?>
                                        <?php foreach ($cargos as $key => $item) : ?>
                                            <tr>
                                                <th>
                                                    <a href="">
                                                        <?= $item['name'] ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="">
                                                        <?= "R$" . number_format($item['salario'], 2, ".", ",") ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="">
                                                        <?= $item['permission'] ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a href="">
                                                        <?= $item['sector']['name'] ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a id="ajuste" name="ajuste" href="<?= site_url("ajustesSalariais/index/{$item['id']}") ?>">
                                                        <svg class="edit_cash" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                                        </svg>
                                                    </a>
                                                </th>
                                                <!--EDIT-->
                                                <th>
                                                    <a id="editar" name="editar" href="<?= site_url("CargoController/editCargo/{$item['id']}") ?>">
                                                        <svg class="edit" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5
                                                        0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0
                                                        1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                </th>
                                                <!--DELETE-->
                                                <th>
                                                    <a id="deletar" name="deletar" href="<?= site_url("CargoController/deleteCargo/{$item['id']}") ?>" onclick='return confirmDeleteCargo();'>
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