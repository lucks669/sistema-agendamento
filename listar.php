<?php
require 'conexao.php';

// Seleciona todos os agendamentos diretamente da tabela
$sql = "SELECT cliente, cidade, estado, data_agendamento, horario, servico FROM agendamentos ORDER BY data_agendamento, horario";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Agendamentos</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #4CAF50, #2e7d32);
        margin: 0;
        padding: 20px;
    }
    h1 { text-align: center; color: #fff; }
    table {
        width: 100%;
        max-width: 800px;
        margin: 20px auto;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }
    th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background: #4CAF50; color: #fff; font-weight: bold; }
    tr:hover { background: #f1f1f1; }
    a {
        display: block;
        width: 200px;
        margin: 20px auto;
        text-align: center;
        padding: 10px 20px;
        background: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
    }
    a:hover { background: #388e3c; }
</style>
</head>
<body>

<h1>Agendamentos</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Cliente</th><th>Cidade</th><th>Estado</th><th>Data</th><th>Horário</th><th>Serviço</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['cliente']}</td>
                <td>{$row['cidade']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['data_agendamento']}</td>
                <td>{$row['horario']}</td>
                <td>{$row['servico']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center; color:#fff;'>Nenhum agendamento encontrado.</p>";
}

$conn->close();
?>

<a href="index.php">Voltar para Agendamento</a>

</body>
</html>