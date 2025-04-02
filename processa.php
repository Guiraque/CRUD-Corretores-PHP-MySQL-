<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $creci = $_POST['creci'];

    if (strlen($cpf) != 11 || strlen($creci) < 2 || strlen($nome) < 2) {
        header("Location: index.php?error=1");
        exit();
    }

    $sql = "INSERT INTO corretores (name, cpf, creci) VALUES ('$nome', '$cpf', '$creci')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=1");
    }
}
$conn->close();
?>
