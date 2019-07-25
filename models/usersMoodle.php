<?php
	
	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {

		$consulta = pg_query($conexao, "SELECT * FROM mdl_user WHERE privilege > 0;");

		echo "<option selected>Selecione um usuário</option>";

		while( $resultado = pg_fetch_array($consulta) ) {
			echo "
				<option value=\"$resultado[0]\">
					$resultado[10] $resultado[11]
				</option>
			";
		}

		pg_close ($conexao);

	}
?>