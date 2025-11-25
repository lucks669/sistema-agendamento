<?php
require 'conexao.php';

// Debug: mostra os dados recebidos
// Descomente a linha abaixo se quiser ver se os dados chegam
// var_dump($_POST);

$cliente = $_POST['cliente'] ?? '';
$cidade  = $_POST['cidade'] ?? null;
$estado  = $_POST['estado'] ?? null;
$data    = $_POST['data_agendamento'] ?? '';
$horario = $_POST['horario'] ?? '';
$servico = $_POST['servico'] ?? '';

// Verifica campos obrigatórios
if (empty($cliente) || empty($data) || empty($horario) || empty($servico)) {
    die("Preencha todos os campos obrigatórios.");
}

// Inserir cliente
$sql_cliente = "INSERT INTO clientes (cliente, cidade, estado) VALUES (?, ?, ?)";
$stmt1 = $conn->prepare($sql_cliente);
$stmt1->bind_param("sss", $cliente, $cidade, $estado);
$stmt1->execute();
$cliente_id = $conn->insert_id;

// Inserir agendamento
$sql_agendamento = "INSERT INTO agendamentos (cliente_id, data_agendamento, horario, servico) VALUES (?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql_agendamento);
$stmt2->bind_param("isss", $cliente_id, $data, $horario, $servico);

if ($stmt2->execute()) {
    echo "✅ Agendamento realizado com sucesso!";
} else {
    echo "❌ Erro ao agendar: " . $stmt2->error;
}

$conn->close();
?>