<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4.5.1/css/metro-all.min.css">
    <title>Cadastro de Mensagem</title>
</head>
<body><center>
    <div class="grid">
        <div class="row">
        <div class="cell"><div>
            <br>
            <br>
            <form action="cad_msg.php" method="post">
                <input type="text" name="cliente" placeholder="DIGITE O NOME DO CLIENTE" style="width:500px;">
                <br>

                <input type="number" name="telefone" placeholder="DIGITE O TELEFONE" style="width:500px;">
                <br>

                <input type="Text" size="12" placeholder="DIGITE O LIMITE APROVADO SE HOUVER" onKeyUp="mascaraMoeda(this, event)"  name="limite" style="width:500px;">
                <br>

                <input list="tipo" name="tipo" placeholder="TIPO DE OPERAÇÃO" style="width:500px;">
                <datalist id="tipo">
                    <option value="CONTATOS">
                    <option value="CARTÃO DE CREDITO">
                    <option value="COBRANÇAS">
                    <option value="CONSORCIO">
                </datalist>
                <br>

                <br>
                <input type="submit" value="Cadastrar Mensagem">
                <input type="button" value="Exibir Clientes"onclick="exibir()">
                <input type="reset" value="Limpar">
            </form>
        </div>
    </div>
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
    </script>
</center></body>
</html>