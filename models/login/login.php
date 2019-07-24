<?php 

	session_start();

	// Conexão com o banco de dados
	require_once('../bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
    	print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {
		$login = $_POST['login'];

		$consulta = pg_query($conexao, "SELECT * FROM mdl_user WHERE username = '$login' AND privilege = 2");

		$resultado = pg_fetch_array($consulta);

		// Verifica o login
		if($resultado == false) {
			header('Location: ../../index.php?cod=0');
			die();
		}

		// Login efetuado com sucesso
		if( isset($resultado['firstname']) ) {
			$_SESSION['id'] = $resultado['id'];
			$_SESSION['nome'] = $resultado['firstname'];
		}

		pg_close ($conexao);

		header('Location: ../../views/home/home.php');
	}

?>