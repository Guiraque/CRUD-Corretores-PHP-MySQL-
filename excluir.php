<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM corretores WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?deleted=1");
    } else {
        header("Location: index.php?error=1");
    }
}
$conn->close();
?>
