<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste - DEV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid" id="container_login">
        <div class="row" style="margin-left:35%; margin-top: 50px;">          
            <div class="col-6">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin-right: 10%; margin-top: 5%;">
                    <div class="card-body">                        
                        <form method="POST" action="../../Controller/valida_login.php">
                            <div class="form-group">
                                <h4 style="margin-top: 30px;">Usuário</h4>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu login" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <h4>Senha</h4>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Informe sua senha" autocomplete="off" required>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-lg btn-danger" type="submit" style="width: 100%; margin-top: 10px;">
                                        <h4>Acessar</h4>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="text-center text-danger" style="margin-top: 20px;">
                            <?php
                            if (isset($_SESSION['erro_login'])) {
                                echo $_SESSION['erro_login'];
                                unset($_SESSION['erro_login']);
                            }
                            ?>
                        </p>                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    if (isset($_SESSION['erro_login'])) {
        echo $_SESSION['erro_login'];
        unset($_SESSION['erro_login']);
    }
    ?>

</body>

</html>