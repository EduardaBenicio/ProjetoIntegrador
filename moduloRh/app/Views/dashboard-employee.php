<?php include 'masterhead.php'; ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dados do Funcionário</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Painel</li>
            </ol>


            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <a class="btn btn-primary" href="<?=site_url("pagamentos/registerPayment/{$funcionario['id']}")?>" role="button">Registrar pagamento</a>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <a class="btn btn-primary" href="<?= site_url("funcionarios/registerEmployee") ?>" role="button">Registrar férias</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6  ">
                    <div class="card bg-primary text-white mb-4">
                        <a class="btn btn-primary" href="<?= site_url("funcionarios/registerEmployee") ?>" role="button">Registrar promoção</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <a class="btn btn-primary" href="<?= site_url("funcionarios/registerEmployee") ?>" role="button">Editar informações</a>
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
                            <h10> <?= $funcionario['name'] ?></h10>

                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>CPF:</b></h8>
                            <h10> <?= $funcionario['cpf'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>RG:</b></h8>
                            <h10> <?= $funcionario['rg'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>CTPS:</b></h8>
                            <h10> <?= $funcionario['ctps'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Data de Nascimento:</b></h8>
                            <h10> <?= $funcionario['dataNasc'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Tipo Sanguíneo:</b></h8>
                            <h10> <?= $funcionario['bloodType'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Sexo:</b></h8>
                            <h10> <?= $funcionario['sexo'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Estado Cívil:</b></h8>
                            <h10> <?= $funcionario['estadoCivil'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Escolaridade:</b></h8>
                            <h10> <?= $funcionario['schooling'] ?></h10>

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
                            <h10> <?= $funcionario['dataIngresso'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Setor:</b></h8>
                            <h10> <?= $funcionario['cargo']['sector']['name'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Cargo:</b></h8>
                            <h10> <?= $funcionario['cargo']['name'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Data de Ingresso no Cargo:</b></h8>
                            <h10> <?= $funcionario['dataIngressoCargo'] ?></h10>
                        </div>

                        <div class="col-xl-9 col-md-6">
                            <h8><b>Salário:</b></h8>
                            <h10> R$<?= $funcionario['cargo']['salario'] . ',00' ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Dia de Pagamento:</b></h8>
                            <h10> <?= $funcionario['dataPag'] ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Valor Devido:</b></h8>
                            <h10> R$<?= $funcionario['valorDevidoAtual']. ',00' ?></h10>
                        </div>
                        <div class="col-xl-9 col-md-6">
                            <h8><b>Data do Ultimo Pagamento:</b></h8>
                            <h10> <?= $funcionario['dataUltimoPag'] ?></h10>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>

        </body>

        </html>