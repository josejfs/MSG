<?php 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** variaveis **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
    $lista = $_GET['tipo'];
    $tipo = str_replace(' ', '', $lista);
    $id = $_GET['id'];
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** conxao com db **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
    include "conexaodb.php";
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
//  selecionando o banco de dados 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
    $db = mysqli_select_db($cnx, $base);
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
//  criando a query de consulta à tabela criada 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
        $sql = mysqli_query($cnx, "SELECT * FROM $tipo WHERE id='{$id}'");

        while($aux = mysqli_fetch_assoc($sql)) {
        echo '
            <center>
            <div class="grid">
                <div class="row">
                <div class="cell"><div>
                    <br>
                    <br>
                    <form action="edit_msg.php?id='.$id.'&tipo='.$tipo.'" method="post">
                        <textarea name="cliente" style="width:500px;" placeholder="DIGITE O NOME DO CLIENTE">'.$aux["cliente"].'</textarea>
                        <br>

                        <input type="number" name="telefone" placeholder="DIGITE O TELEFONE" value='.$aux["telefone"].' style="width:500px;">
                        <br>

                        <input type="Text" size="12" placeholder="DIGITE O LIMITE APROVADO SE HOUVER" onKeyUp="mascaraMoeda(this, event)"  name="limite" style="width:500px;" value='.$aux["limite"].'>
                        <br>

                        <br>
                        <input type="submit" value="Atualizar">
                        <input type="button" value="Voltar" onclick="voltar()">
                    </form>
                </div>
            </div>
            ';
        }
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
//  botoes da pagina 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4.5.1/css/metro-all.min.css">
    <title>Cadastro de Mensagem</title>
</head>
<body>
    <script type="text/javascript">
        function exibir() {
            window.location.href = "exibir.php";
        }

        String.prototype.reverse = function(){
        return this.split('').reverse().join(''); 
        };

        function mascaraMoeda(campo,evento){
          var tecla = (!evento) ? window.event.keyCode : evento.which;
          var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
          var resultado  = "";
          var mascara = "##.###.###,##".reverse();
          for (var x=0, y=0; x<mascara.length && y<valor.length;) {
            if (mascara.charAt(x) != '#') {
              resultado += mascara.charAt(x);
              x++;
            } else {
              resultado += valor.charAt(y);
              y++;
              x++;
            }
          }
          campo.value = resultado.reverse();
        }

        function voltar() {
            window.location.href = "exibir.php";
        }
    </script>
</body>
</html>