
<?php
    require_once('../../views/layout/header.php');
?>

<link href="../css/home.css" rel="stylesheet">
    
<!-- ------------------- Conteúdo/HOME ------------------- -->
    <br><br><br><br><br><br>

    <script type="text/javascript">
        $(document).ready( function() {
            var alfabeto = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            for (var i = 0; i < 26; i++) {
                $('#painelFiltro').append("<button type=\"button\" onclick=\"obter('" + alfabeto[i] + "')\" id=\"" + alfabeto[i] + "\" class=\"panel panel-default\">" + alfabeto[i] + "</button>");
            }
        });

        function obter(letra) {
            $.ajax( {
                url: '../../models/carregarUsuarios.php',
                method: 'post',
                data: {'letra': letra},
                success: function(data) {
                    if(data != ""){
                        $("#painelResultado").html("<center>  <h2>Lista de Professores</h2>  </center>");
                        $("#painelResultado").append(data);
                    } else {
                        $("#painelResultado").html("<center>    <h2>Sem informações para mostrar!</h2>      <h5>Pressione uma das letras acima.</h5>      </center>");
                    }
                }
            });
        }
         
    </script>
    
    <div class="container">
        <center>
            <div class="panel-body painelLetras" id="painelFiltro">
        
            </div>
        </center>

        <!-- Local onde serão mostrados os usuários com a inicial -->
        <div id="painelResultado" class="caixa">
            <center>
                <h2>Sem informações para mostrar!</h2>
                <h5>Pressione uma das letras acima.</h5>
            </center>
        </div>
        
    </div>

    <script>
        function carregarDados(id) {
            $.ajax( {
                url: '../../models/userEscolhido.php',
                method: 'post',
                data: {'id': id},
                success: function(data) {
                    var n = data.split("/");
                    
                    limparCampos();

                    n.forEach(function(valor){
                        $('#' + valor).prop("checked", true);
                    });
                }
            });

            $('#identificador').val(id);
        }

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
    </script>
    

    <!-- Janela -->
    <div class="modal fade" id="janela">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="../../models/sendConfig.php">
                    <!-- cabecalho -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                        </button>
                        <h2 class="modal-title"> Restrições de Acesso ao Sistema Moodle </h2>
                    </div>

                    <!-- corpo -->
                    <div class="modal-body">
                        <center>

                            <!-- Campo invisível que define o id -->
                            <input type="text" name="id" id="identificador" class="hidden">

                            <table class="table table-striped">
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

                            
                        </center>
                    </div>

                    <!-- rodape -->
                    <div class="modal-footer">
                        <center>
                            <button class="btn btn-success" type="submit">Enviar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Voltar</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
<?php
    require_once('../../views/layout/footer.php');
?>
