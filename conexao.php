<?php
$host = "localhost"; // Servidor MySQL
$user = "root"; // Usuário padrão do XAMPP
$pass = ""; // Senha padrão (vazia)
$dbname = "meubanco"; // Nome do banco de dados

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
