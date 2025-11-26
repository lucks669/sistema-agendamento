<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cliente = $_POST['cliente'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $data = $_POST['data_agendamento'] ?? '';
    $horario = $_POST['horario'] ?? '';

    if ($cliente && $data && $horario) {
        $stmt = $conn->prepare("INSERT INTO clientes (cliente, cidade, estado, data, horario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cliente, $cidade, $estado, $data, $horario);

        if ($stmt->execute()) {
            echo "Agendamento realizado com sucesso!";
        } else {
            echo "Erro ao agendar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Preencha os campos obrigatórios: Cliente, Data e Horário.";
    }

} else {
    echo "Acesse este arquivo via formulário de agendamento.";
}

$conn->close();
?>