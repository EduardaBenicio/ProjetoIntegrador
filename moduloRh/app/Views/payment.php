<?php include 'masterhead.php';?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Painel de Pagamentos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Painel de Pagamentos</li>
                        </ol>
                  
                            
                        <br>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabela de pagamentos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Cargo</th>
                                            <th>Data do Pagamento</th>
                                            <th>Valor Pago</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Cargo</th>
                                            <th>Data do Pagamento</th>
                                            <th>Valor Pago</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php foreach($pagamentos as $key =>$item):?>
                                            <tr>
                                                <th><?=$item['funcionario']['name']?></th>
                                                <th><?=$item['funcionario']['cargo']['name']?></th>
                                                <th><?=$item['date_payment']?></th>
                                                <th>R$<?=$item['value_paid'] .',00'?></th>
                                                
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php include 'footer.php'; ?>