<?php 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** conxao com db **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	include "conexaodb.php";
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** variaveis **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	$telefone = $_POST['telefone'];
	$cliente = $_POST['cliente'];
	$limite = $_POST['limite'];
    $lista = $_GET['tipo'];
	$tipo = str_replace(' ', '', $lista);
    $id = $_GET['id'];

/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** seu nome e sua empresa **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	$saudacoes = "fulano da empresa test";
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/
/** teste de variaveis **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	echo "TELEFONE: ".$telefone;
	echo "<br>";
	echo "CLIENTE: ".$cliente;
	echo "<br>";
	echo "LIMITE: ".$limite;
	echo "<br>";
	echo "LIMITE: ".$tipo;
	echo "<br>";**/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** inclui dados no db
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@**/
	if ($tipo == "CONTATOS") {
		$mensagem = "OLÁ! SOU *".$saudacoes."*. SR(a) *".$cliente."* VERIFICAMOS EM NOSSO SISTEMA QUE VOCÊ POSSUI OFERTAS PARA ADESÃO DE SEGUROS, CONSORCIO, FINANCIAMENTOS, CARTÃO DE CRÉDITO. TERIA INTERESSE EM FAZER UMA SIMULAÇÃO? CASO VOCÊ NÃO SEJA OU NÃO CONHEÇA *".$cliente."*, DESCONSIDERE ESSA MENSAGEM.  POR FAVOR, SE POSSÍVEL AVALIE NOSSO CONTATO ATRAVÉS DO *SMS* QUE IRA CHEGAR. *DESDE JÁ AGRADECEMOS O CONTATO*.";

		$sql = "UPDATE $tipo SET cliente = '{$cliente}', telefone = '{$telefone}', limite = '{$limite}', mensagem = '{$mensagem}' WHERE $tipo . id = '{$id}'";

		mysqli_query($cnx, $sql);
		header("Location: exibir.php");
	}
	elseif ($tipo == "CARTÃODECREDITO") {
		$mensagem = "*$cliente*, VERIFICAMOS EM NOSSO SISTEMA QUE VOCÊ POSSUI UM CARTÃO DE CRÉDITO PRÉ-APROVADO COM LIMITE DE *R$ $limite*. VOCÊ TERIA INTERESSE EM MAIS INFORMAÇÕES? CASO VOCÊ NÃO SEJA OU NÃO CONHEÇA *$cliente*, DESCONSIDERE ESSA MENSAGEM. POR FAVOR, SE POSSÍVEL AVALIE NOSSO CONTATO ATRAVÉS DO *SMS* QUE IRA CHEGAR. DESDE JÁ AGRADECEMOS O CONTATO.";

		$sql = "UPDATE $tipo SET cliente = '{$cliente}', telefone = '{$telefone}', limite = '{$limite}', mensagem = '{$mensagem}' WHERE $tipo . id='{$id}'";

		mysqli_query($cnx, $sql);
		header("Location: exibir.php");
	}
	else{
		echo "<script>alert('ALGO DEU ERRADO, VERIFIQUE SE VOCÊ SELECIONOU O TIPO DA OPERAÇÃO.');</script>";
	}
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** ONDEÉ EXIBIDO OS BOTÕES**/
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

	<br><br><center>
	<input type="button" value="Voltar" onclick="voltar()">
	</center><br>
	<script type="text/javascript">
		function voltar() {
			window.location.href = "index.php";
		}
	</script>
</body>
</html>