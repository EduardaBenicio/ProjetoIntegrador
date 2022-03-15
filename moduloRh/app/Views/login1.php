<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="<?= base_url("css/styles.css") ?>" rel="stylesheet" />
    <script src="<?= base_url("js/all.min.js") ?>" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body text-center">
                                   
                                    <form method="post" action='<?=site_url("home/logar")?>' >
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="user">Usuário:</label>
                                            <input id="user" name="user" type="text" class="form-control" id="user" placeholder="Insira seu usuário">
                                            
                                        </div>
                                        </br>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="password">Senha:</label>
                                            <input id="password" type="password" name="password" class="form-control" id="password" placeholder="Insira sua senha">
                                        </div>
                                        <div id="erro" class="text-center form-group">
                                                <?=session("erro");?>
                                        </div>
                                        </br>
                                        <div class="text-center form-group">
                                            <button id="botao" type="submit" class="btn btn-primary col-md-3 col-xl-3 ">Login</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
               
            </footer>
        </div>
    </div>
    <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>" crossorigin="anonymous"></script>
    <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>

</html>