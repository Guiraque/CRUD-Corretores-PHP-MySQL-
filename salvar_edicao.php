<?php
include 'conexao.php';

if (isset($_POST['id'], $_POST['cpf'], $_POST['creci'], $_POST['nome'])) {
    $id = intval($_POST['id']);
    $cpf = trim($_POST['cpf']);
    $creci = trim($_POST['creci']);
    $nome = trim($_POST['nome']);

    if (strlen($cpf) == 11 && strlen($creci) >= 2 && strlen($nome) >= 2) {
        $stmt = $conn->prepare("UPDATE corretores SET name = ?, cpf = ?, creci = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nome, $cpf, $creci, $id);

        if ($stmt->execute()) {
            header("Location: index.php?success=1");
            exit();
        } else {
            header("Location: index.php?error=1");
            exit();
        }
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>
