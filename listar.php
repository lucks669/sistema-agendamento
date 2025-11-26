<?php
include 'conexao.php';

// Consulta todos os agendamentos
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Ações</th>
          </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['cliente'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['horario'] . "</td>";
        // Link de exclusão usando o ID
        echo "<td><a href='excluir.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que quer excluir?\");'>Excluir</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum agendamento encontrado.";
}

$conn->close();
?>