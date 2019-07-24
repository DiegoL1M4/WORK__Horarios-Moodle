
<?php
    // Verificação de Autenticação
    session_start();

    if( isset($_SESSION['nome']) )
        header('Location: views/home/home.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Sistema de Restrição de Horários do Moodle </title>
    <link rel="icon" href="favicon.ico">

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/index.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    
    <!-- ------------------- Conteúdo ------------------- -->
    <div class="container">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="caixa">
                <h2 class="titulo">Sistema de Restrição de Horários do Moodle</h2> <br>

                <form method="post" action="models/login/login.php">
                    <label>Username Moodle:</label>
                    <input class="form-control" type="text" name="login">

                    <br><br>
                    <button class="botao_login btn btn-primary" type="submit">Login</button>
                </form>
                
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    
    <!-- ------------------- Rodapé ------------------- -->
    <footer class="rodape">
        <div class="container">
                <div class="row">
                    <h5>Desenvolvido por: <a style="color: white" target="_blank" href="https://github.com/DiegoL1M4">Diego Lima</a></h5>
                </div>
        </div>
    </footer>

</body>

</html>
