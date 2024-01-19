<?php
// Conexão com o banco de dados
include 'conexao.php';

// Consulta SQL para obter todas as pessoas
$sql = "SELECT * FROM pessoas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pessoas</title>
    <style>
        /* Estilos para tornar a tabela responsiva */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Listagem de Pessoas</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Gênero</th>
        <th>Idade</th>
        <th>Ações</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['genero']}</td>
                    <td>{$row['idade']}</td>
                    <td>
                        <a href='editar_pessoa.php?id={$row['id']}'>Editar</a>
                        <a href='excluir_pessoa.php?id={$row['id']}'>Excluir</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhuma pessoa encontrada</td></tr>";
    }
    ?>
</table>

</body>
</html>