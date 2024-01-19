<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_veiculo = $_POST["nome_veiculo"];
    $nome_proprietario = $_POST["nome_proprietario"]; // Adicionado campo para o nome do proprietário

    // Inserir dados na tabela 'veiculos' usando consulta preparada
    $sql = "INSERT INTO veiculos (nome_veiculo, nome_proprietario) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome_veiculo, $nome_proprietario);

    if ($stmt->execute()) {
        header("Location: list_veiculos.php");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Veículos</title>
</head>
<body>

<h2>Cadastrar Veículo</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nome_veiculo">Nome do Veículo:</label>
    <input type="text" name="nome_veiculo" required>

    <label for="nome_proprietario">Nome do Proprietário:</label>
    <input type="text" name="nome_proprietario" required>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
