
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

	<title>  </title>
	<link rel="icon" href="favicon.ico">

	<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">

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
                    <li><a href="index.php">Bem-vindo <?= $_SESSION['nome'],?></a> </li>
                    <li><a href="../../models/login/logout.php">Logout</a> </li>
                </ul>
        	</div>   
        </div>
	</nav>
	
<!-- ------------------- Conteúdo ------------------- -->
    <br><br><br><br><br><br><br>
    <div class="container caixa">
        <div class="row">
            <form method="post" action="../../models/sendConfig.php">
                <div class="col-sm-12">
                    <center>
                        <table class="table table-striped">
                            <tr>
                                <th class="tituloTab" colspan="7">Restrições de Acesso ao Sistema Moodle</th>
                            </tr>
                            <tr>
                                <th class="coluna" colspan="7">
                                    <select class= "coluna form-control" name="userProf" id="userProf" onchange="limparCampos()"></select>
                                </th>
                            </tr>
                            <tr>
                                <th class="coluna">Turno</th>
                                <th class="coluna">Período</th>
                                <th class="coluna">Segunda</th>
                                <th class="coluna">Terça</th>
                                <th class="coluna">Quarta</th>
                                <th class="coluna">Quinta</th>
                                <th class="coluna">Sexta</th>
                            </tr>
                            <tr>
                                <th class="coluna" rowspan="2">Manhã</th>
                                <th class="coluna">AB</th>
                                <th class="coluna"> <input type="checkbox" name="11" id="11" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="12" id="12" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="13" id="13" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="14" id="14" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="15" id="15" value="true"> </th>
                            </tr>
                            <tr>
                                <th class="coluna">CD</th>
                                <th class="coluna"> <input type="checkbox" name="21" id="21" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="22" id="22" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="23" id="23" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="24" id="24" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="25" id="25" value="true"> </th>
                            </tr>
                            <tr>
                                <th class="coluna" rowspan="2">Tarde</th>
                                <th class="coluna">AB</th>
                                <th class="coluna"> <input type="checkbox" name="31" id="31" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="32" id="32" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="33" id="33" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="34" id="34" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="35" id="35" value="true"> </th>
                            </tr>
                            <tr>
                                <th class="coluna">CD</th>
                                <th class="coluna"> <input type="checkbox" name="41" id="41" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="42" id="42" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="43" id="43" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="44" id="44" value="true"> </th>
                                <th class="coluna"> <input type="checkbox" name="45" id="45" value="true"> </th>
                            </tr>
                        </table>

                        <button class="btn btn-success" type="submit">Enviar</button>
                    </center>
                </div>

                <script type="text/javascript">
                    $(document).ready( function() {
                        $.ajax( {
                            url: '../../models/usersMoodle.php',
                            method: 'post',
                            success: function(data) {
                                $('#userProf').html(data);
                            }
                        } );
                        limparCampos();
                    } );

                    function limparCampos() {
                        var deci = 1; // Simboliza o id do horario
                        var unid = 1; // Simboliza o id do dia
                        for (var i = 0; i < 20; i++) {
                            $("#" + deci + unid).prop("checked", false);

                            // Ajuste
                            unid++;
                            if (unid > 5) {
                                unid = 1;
                                deci++;
                            }
                        }
                    }
               
                    $('#userProf').change( function() {
                        $.ajax( {
                            url: '../../models/userEscolhido.php',
                            method: 'post',
                            data: $('#userProf').serialize(),
                            success: function(data) {
                                var n = data.split("/");
                                
                                limparCampos();

                                n.forEach(function(valor){
                                    $("#" + valor).prop("checked", true);
                                });

                            }
                        } );
                    } );
                </script>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br>
    
<!-- ------------------- Rodapé ------------------- -->
    <footer class="rodape">
		<div class="container">
		 		<div class="row">
			 	    <h5></h5>
		 		</div>
		</div>
    </footer>

</body>

</html>
