<?php
$host = 'localhost';
$dbname = 'lumi';
$user = 'root';
$pass = '';

$conexao = mysqli_connect($host, $user, $pass, $dbname);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexão falhou: ' . $e->getMessage();
}
?>
