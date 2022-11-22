<?php
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$base = "mensagem";

$cx = mysqli_connect($host, $usuario);
$cnx = mysqli_connect($host, $usuario, $senha, $base);
 
if (!$cx) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>