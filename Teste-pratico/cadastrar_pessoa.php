<?php
include 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $idade = $_POST["idade"];

    // Inserir dados na tabela 'proprietarios'
    $sql = "INSERT INTO proprietarios (nome, genero, idade) VALUES ('$nome', '$genero', $idade)";
    if ($conn->query($sql) === TRUE) {
        // Obtém o ID do usuário recém-inserido
        $id_proprietario = $conn->insert_id;

        // Redireciona para a lista de proprietários
        header("Location: list_proprietarios.php");
        exit();
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Proprietário</title>
    <!-- Aqui você pode adicionar qualquer outro conteúdo do cabeçalho que for necessário -->
</head>
<body>

<h2>Cadastrar Proprietário</h2>

<!-- Formulário de cadastro de proprietário -->
<form action="cadastrar_proprietario.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>

    <label for="genero">Gênero:</label>
    <select name="genero" required>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Outro">Outro</option>
    </select>

    <label for="idade">Idade:</label>
    <input type="number" name="idade" required>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
