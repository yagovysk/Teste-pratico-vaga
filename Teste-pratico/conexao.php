<?php
// Defina suas credenciais de banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "yago";

// Crie uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
