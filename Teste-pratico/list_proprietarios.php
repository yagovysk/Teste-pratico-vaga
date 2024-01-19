<?php
include 'conexao.php';

// Consulta para obter todos os proprietários
$sql = "SELECT * FROM proprietarios";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result) {
    echo "<h2>Lista de Proprietários</h2>";
    echo "<ul>";

    // Loop pelos resultados e exibe cada proprietário
    while ($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id_proprietario"] . " - Nome: " . $row["nome"] . "</li>";
    }

    echo "</ul>";
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>