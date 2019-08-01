
<?php
    
    require_once('../../models/login/autenticacao.php');

    // Para resgatar o nome na sessão
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Sistema de Restrição de Horários do Moodle </title>
	<link rel="icon" href="../../favicon.ico">

	<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <link href="../css/layout.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- ------------------- Barra de Navegação ------------------- -->
	<nav class="navbar navbar-default navbar-fixed-top barra">
		<div class="container">
        	<div class="navbar-header">
              	<button type="button" class="navbar-toggle collapsed"
                      	data-toggle="collapse" data-target="#barra-navegacao">
                    <span class="sr-only">Alternar Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
              	</button>
                <a href="index.php" class="navbar-brand">
                <span class="logo">IFCE</span></a>
        	</div>

        	<div class="collapse navbar-collapse" id="barra-navegacao">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../home">Home</a> </li>
                    <li><a href="../cadastro">Professores</a> </li>
                    <li><a href="../campus">Campus</a> </li>
                    <li><a href="../horarios">Horarios</a> </li>
                    <li><a>Bem-vindo <?= $_SESSION['nome']?>,</a> </li>
                    <li><a href="../../models/login/logout.php">Logout</a> </li>
                </ul>
        	</div>   
        </div>
	</nav>

