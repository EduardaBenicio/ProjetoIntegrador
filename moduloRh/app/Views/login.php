<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link href="<?= base_url("css/teste.css") ?>" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="<?= base_url("images/logo.png") ?>" />
</head>

<body class="bg-primary">

    <body style="background: #888f97;">
        <div class="login-dark" style="height: 695px;">
            <form method="post" action='<?= site_url("home/logar") ?>'>

                <div class="illustration">
                    <img src="<?= base_url("images/logo.png") ?>" width="100" height="100">
                    <h2 style="text-align:center; color:antiquewhite;">Recursos Humanos</h2>
                </div>


                <div class="form-group">
                    Usuário <input name="user" type="text" id="user">
                </div>
                <div class="form-group">
                    Senha <input type="password" name="password" id="password">
                </div>
                <div id="erro" class="text-center form-group col-md-6">
                    <?= session("erro"); ?>
                </div>
                <div class="form-group">
                    <button name="button" class="btn btn-primary btn-block">Entrar</button>
                </div>
                <p style="font-size: 10px; text-align:center">Copyright 2022</p>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </body>
</body>

</html>