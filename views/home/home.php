<!DOCTYPE html>
<html lang="pt-br">
	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>  </title>
	<link rel="icon" href="favicon.ico">

	<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">

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
                    <li><a href="index.php">Bem-vindo,</a> </li>
                    <li><a href="index.php">Logout</a> </li>
                </ul>
        	</div>   
        </div>
	</nav>
	
<!-- ------------------- Conteúdo ------------------- -->
    <br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">aa</div>
            <div class="col-sm-8">
                <table style="border: 1px black solid">
                    <tr>
                        <th> </th>
                        <th> </th>
                        <th>Domingo</th>
                        <th>Segunda</th>
                        <th>Terça</th>
                        <th>Quarta</th>
                        <th>Quinta</th>
                        <th>Sexta</th>
                        <th>Sábado</th>
                    </tr>
                    <tr>
                        <th rowspan="2">Manhã</th>
                        <th>AB</th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                    </tr>
                    <tr>
                        <th>CD</th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                    </tr>
                    <tr>
                        <th rowspan="2">Tarde</th>
                        <th>AB</th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                    </tr>
                    <tr>
                        <th>CD</th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                        <th> <input type="checkbox" name=""> </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
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
