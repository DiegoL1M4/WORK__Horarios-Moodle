<?php

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {

		$id = $_POST['id'];

		if ($id == 'Selecione um professor') {
			pg_close ($conexao);
			header("Location: ../views/home/home.php");	
		}

		// Deleta todas as entradas
		pg_query($conexao, "DELETE FROM mdl_auth_rest WHERE id_user = $id;")
		or die ("Erro de autenticação no acesso ao banco de dados!");

		$deci = 1; // Simboliza o id do horario
		$unid = 1; // Simboliza o id do dia

		for ($i = 0; $i < 20; $i++) {
			if ($_POST["$deci$unid"] == 'true') {

				// Insere
				pg_query($conexao, "INSERT INTO mdl_auth_rest (id_user, id_dia, id_horario) VALUES ($id, $unid, $deci);")
				or die ("Erro de autenticação no acesso ao banco de dados!");

			}
			
			// Ajuste da seleção
			$unid++;
			if ($unid > 5) {
				$unid = 1;
				$deci++;
			}
		}

		pg_close ($conexao);
		header("Location: ../views/home");

	}

?>