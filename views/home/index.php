
<?php
    require_once('../../views/layout/header.php');
?>

<link href="../css/home.css" rel="stylesheet">
    
<!-- ------------------- Conteúdo/HOME ------------------- -->
    <br><br><br><br><br><br><br>

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
                    $("#painelResultado").html(data);
                }
            });
        }
         
    </script>
    
    <div class="container">
        <center>
            <div class="panel-body" id="painelFiltro">
        
            </div>
        </center>

        <div id="painelResultado">
            
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
        });
    </script>
    









    <br><br><br><br><br><br><br><br><br><br>
    <div class="container caixa">
        <div class="row">
            <form method="post" action="../../models/sendConfig.php">
                <div class="col-sm-12">
                    <center>
                        <table class="table table-striped">
                            <tr>
                                <th class="tituloTab teste" colspan="7">Restrições de Acesso ao Sistema Moodle</th>
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
    
<?php
    require_once('../../views/layout/footer.php');
?>
