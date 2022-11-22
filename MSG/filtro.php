<?php 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** variaveis **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	$lista = $_POST['tipo'];
	$tipo = str_replace(' ', '', $lista);
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** abrindo sessão para conseguir apagar arquivos especificos**/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	session_start();
	$_SESSION["tipo"] = $tipo;
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
/** conxao com db **/
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	include "conexaodb.php";
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
//  selecionando o banco de dados 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	$db = mysqli_select_db($cnx, $base);
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/ 
//  pecorrendo os registros da consulta. 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
	if ($tipo) {
		$SemEspaco = str_replace(' ', '', $tipo);
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
//  criando a query de consulta à tabela criada 
/** @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ **/
		$sql = mysqli_query($cnx, "SELECT * FROM $SemEspaco") or die( 
		mysqli_error($cnx) //caso haja um erro na consulta 
		);
		while($aux = mysqli_fetch_assoc($sql)) {
		echo '<table class="table">
			<thead>
			<tr>
				<th>ID</th>
				<th>CLIENTE</th>
				<th>TELEFONE</th>
				<th>LIMITE</th>
				<th>MENSAGEM</th>
				<th></th>
			</tr>
			<tbody>
			<tr>
				<td width="50px">'.$aux["id"].'</td>
				<td width="150px"><a target="_blank" href="https://api.whatsapp.com/send/?phone=55'.$aux["telefone"].'&text='.$aux["mensagem"].'">'.$aux["cliente"].'</a></td>
				<td>'.$aux["telefone"].'</td>
				<td width="100px">'.$aux["limite"].'</td>
				<td>'.$aux["mensagem"].'</td>
				<td width="150px" style="text-align: right;">
					<a href="apagarporid.php?id='.$aux["id"].'">EXCLUIR</a>
					 || 
					<a href="formedit.php.?id='.$aux["id"].'&tipo='.$SemEspaco.'">EDITAR</a>
				</td>
			</tr>
			</tbody>
			</table>';
		}
	}
	else{
		echo "<script>alert('ALGO DEU ERRADO, VERIFIQUE SE VOCÊ SELECIONOU O TIPO DA OPERAÇÃO, OU SE JA EXISTE AUGUM DOCUMENTO GERADO PELO SISTEMA.');window.location.href = 'exibir.php'</script>";
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
	<br>
	<br><center>
	<input type="button" value="Voltar" onclick="voltar()">
	<input type="button" value="Limpar" onclick="limpar()">
	</center><br>
	<br>
	<script type="text/javascript">
		function voltar() {
			window.location.href = "exibir.php";
		}

		function limpar() {
			window.location.href = "apagarcontatos.php";
		}
	</script>
</body>
</html>
