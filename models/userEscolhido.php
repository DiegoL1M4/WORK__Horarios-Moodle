<?php
	
	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {

		$id = $_POST['userProf'];


		$consulta = pg_query($conexao, "SELECT id_horario, id_dia FROM mdl_auth_rest WHERE id_user = $id;");

		while( $resultado = pg_fetch_array($consulta) ) {
			echo "$resultado[0]$resultado[1]/";
		}

		pg_close ($conexao);

	}
?>