<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Corretores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Corretores</h2>

    <?php
    if (isset($_GET['success'])) {
        echo "<p class='success'>Cadastro realizado com sucesso!</p>";
    } elseif (isset($_GET['error'])) {
        echo "<p class='error'>Erro ao processar a requisição!</p>";
    } elseif (isset($_GET['deleted'])) {
        echo "<p class='success'>Registro excluído com sucesso!</p>";
    }
    ?>

    <form id="corretorForm" action="processa.php" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required minlength="11" maxlength="11">
        <br>
        <label for="creci">CRECI:</label>
        <input type="text" id="creci" name="creci" required minlength="2">
        <br>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required minlength="2">
        <br>
        <button type="submit">Enviar</button>
    </form>

    <h2>Corretores Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>CRECI</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'conexao.php';
        $sql = "SELECT * FROM corretores";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['cpf']}</td>
                    <td>{$row['creci']}</td>
                    <td>
                        <a href='editar.php?id={$row['id']}' class='editar'>Editar</a>
                        <a href='excluir.php?id={$row['id']}' class='excluir'>Excluir</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

    <script>
        document.getElementById('corretorForm').addEventListener('submit', function(event) {
            const cpf = document.getElementById('cpf').value;
            const creci = document.getElementById('creci').value;
            const nome = document.getElementById('nome').value;

            if (cpf.length !== 11 || creci.length < 2 || nome.length < 2) {
                alert('Por favor, preencha os campos corretamente!');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
