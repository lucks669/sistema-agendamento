<?php
include "conexao.php";

$sql = "SELECT * FROM agendamentos ORDER BY data_agendamento, horario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Agendamentos</title>
</head>
<body>

<h1>Agendamentos</h1>

<table border="1">
    <tr>
        <th>Cliente</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Data</th>
        <th>Horário</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['cliente'] ?></td>
            <td><?= $row['cidade'] ?></td>
            <td><?= $row['estado'] ?></td>
            <td><?= $row['data_agendamento'] ?></td>
            <td><?= $row['horario'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>