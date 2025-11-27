<?php
include("conexao.php");

$sql = "
SELECT 
    a.data_agendamento,
    a.horario,
    a.servico,
    c.cliente,
    c.cidade,
    c.estado
FROM agendamentos a
JOIN clientes c ON a.cliente_id = c.id
ORDER BY a.data_agendamento DESC, a.horario DESC
";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Agendamentos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e7f5e7;
        }
        table {
            width: 90%;
            margin: 50px auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #2e7d32;
            color: white;
        }
        .btn-voltar {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-voltar:hover {
            background: #2e7d32;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Lista de Agendamentos</h2>

<table>
    <tr>
        <th>Cliente</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Serviço</th>
    </tr>

<?php
if ($resultado->num_rows > 0) {
    while($linha = $resultado->fetch_assoc()) {

        $data = date("d/m/Y", strtotime($linha['data_agendamento']));
        $hora = substr($linha['horario'], 0, 5);

        echo "<tr>";
        echo "<td>{$linha['cliente']}</td>";
        echo "<td>{$linha['cidade']}</td>";
        echo "<td>{$linha['estado']}</td>";
        echo "<td>{$data}</td>";
        echo "<td>{$hora}</td>";
        echo "<td>{$linha['servico']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum agendamento encontrado.</td></tr>";
}
?>

</table>

<a class="btn-voltar" href="index.html">Voltar ao formulário</a>

</body>
</html>