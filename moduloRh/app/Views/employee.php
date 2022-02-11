<?php include 'masterhead.php';?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Painel de funcionários</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Painel de funcionários</li>
                        </ol>
                        <a class="btn btn-primary" href="<?=site_url("funcionarios/registerEmployee")?>" role="button">Cadastrar funcionário</a>
                        
                        <div class="row">
                             
                        </div>
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabela de funcionários
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Cargo</th>
                                            <th>Data de nascimento</th>
                                            <th>Data de início</th>
                                            <th>Salario</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Cargo</th>
                                            <th>Nascimento</th>
                                            <th>Data de início</th>
                                            <th>Salario</th>
                                            <th>Abri</th>
                                        </tr>
                                    </tfoot>
                            
                                    <tbody>
                                        
                                            <?php foreach($funcionarios as $key =>$item):?>
                                                
                                                    <tr>
                                                        <th><?=$item['name']?></th>
                                                        <th><?=$item['cargo']['name']?></th>
                                                        <th><?=$item['dataNasc']?></th>
                                                        <th><?=$item['dataIngresso']?></th>
                                                        <th>R$<?=$item['cargo']['salario'] .",00"?></th>
                                                        <th><a class="btn btn-primary" href="<?=site_url("funcionarios/dashboardEmployee/{$item['id']}")?>" role="button">Ver mais</a></th>
                                                    </tr>
                                                
                                            <?php endforeach;?>
                                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php include 'footer.php'; ?>