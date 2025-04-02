<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM corretores WHERE id = $id");
    $corretor = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Corretor</title>
</head>
<body>
    <h2>Editar Corretor</h2>
    <form action="salvar_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $corretor['id']; ?>">
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $corretor['cpf']; ?>" required minlength="11" maxlength="11">
        <br>

        <label for="creci">CRECI:</label>
        <input type="text" id="creci" name="creci" value="<?php echo $corretor['creci']; ?>" required minlength="2">
        <br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $corretor['name']; ?>" required minlength="2">
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
