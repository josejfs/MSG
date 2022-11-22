<?php
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** conxao com db **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
    include "conexaodb.php";
    $id = $_GET['id'];
    session_start();
    $tipo = $_SESSION["tipo"];
    $tabela = str_replace(' ', '', $tipo);
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** Comando SQL para excluir os dados em uma tabela **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
    $sql = "DELETE FROM $tabela WHERE id='{$id}'";

    if (mysqli_query($cnx, $sql)) {
        header("Location: exibir.php");
    } else {
        echo "Error deleting record: " . $cnx->error;
        echo "<script>alert('Error deleting record: ". $cnx->error."');</script>";
    }

    $cnx->close();
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
    <br>
    <br><center>
    <input type="button" value="Voltar" onclick="voltar()">
    <br></center>
    <script type="text/javascript">
        function voltar() {
            window.location.href = "exibir.php";
        }
    </script>
</body>
</html>