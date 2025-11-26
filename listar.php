<?php
require 'conexao.php';

// Consulta os agendamentos com o nome do cliente
$sql = "SELECT a.id, c.cliente, c.cidade, c.estado, a.data_agendamento, a.horario, a.servico
        FROM agendamentos a
        INNER JOIN clientes c ON a.cliente_id = c.id
        ORDER BY a.data_agendamento, a.horario";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Agendamentos</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Lista de Agendamentos</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Serviço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['cliente']) ?></td>
                        <td><?= htmlspecialchars($row['cidade']) ?></td>
                        <td><?= htmlspecialchars($row['estado']) ?></td>
                        <td><?= $row['data_agendamento'] ?></td>
                        <td><?= $row['horario'] ?></td>
                        <td><?= htmlspecialchars($row['servico']) ?></td>
                        <td>
                            <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Não há agendamentos cadastrados.</p>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>