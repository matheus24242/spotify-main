<?php
$servername = "localhost";
$username = "root";
$password = ""; // Deixe em branco se não tiver senha
$dbname = "aula_php";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
