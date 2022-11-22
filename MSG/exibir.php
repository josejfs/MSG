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
            <form action="filtro.php" method="post">
                <input list="tipo" name="tipo" placeholder="TIPO DE OPERAÇÃO" style="width:500px;">
                <datalist id="tipo">
                    <option value="CONTATOS">
                    <option value="CARTÃO DE CREDITO">
                    <option value="COBRANÇAS">
                    <option value="CONSORCIO">
                </datalist>
                <br>

                <br>
                <input type="button" value="Voltar" onclick="voltar()">
                <input type="submit" value="Exibir Clientes">
                <input type="reset" value="Limpar">
            </form>
        </div>
    </div>
        <script type="text/javascript">
        function voltar() {
            window.location.href = "index.php";
        }
    </script>
</center></body>
</html>