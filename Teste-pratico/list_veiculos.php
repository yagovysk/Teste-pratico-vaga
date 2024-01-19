<?php
include 'conexao.php';

$sql = "SELECT * FROM veiculos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Veículos</title>
    <style>
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

<h2>Listagem de Veículos</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Veículo</th>
            <th>Nome do Proprietário</th> <!-- Adicionado campo para o nome do proprietário -->
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_veiculo"] . "</td>";
                echo "<td>" . $row["nome_veiculo"] . "</td>";
                echo "<td>" . $row["nome_proprietario"] . "</td>"; // Exibindo o nome do proprietário
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum veículo cadastrado.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>