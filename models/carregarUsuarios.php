<?php

	// Conexão com o banco de dados
	require_once('bd.class.php');
	$bd = new bd();
	$conexao = $bd->estabelecerConexao();

	if($conexao == null) {
        print "Não foi possível estabelecer uma conexão com o banco de dados.";

	} else {

		$letra =$_POST['letra'];
		
		$consulta = pg_query($conexao, "SELECT * FROM mdl_user WHERE firstname like '$letra%' ORDER BY firstname ASC;");
		

		while( $resultado = pg_fetch_array($consulta) ) {
			echo "
				<button type=\"button\" onclick=\"carregarDados($resultado[0])\" class=\"btn btn-success botao\" data-toggle=\"modal\" data-target=\"#janela\">
					$resultado[10] $resultado[11]
				</button>
			";
		}
		
		pg_close ($conexao);

	}
?>