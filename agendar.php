<?php
include "conexao.php";

$cliente = $_POST['cliente'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$data = $_POST['data_agendamento'];
$horario = $_POST['horario'];

$sql = "INSERT INTO agendamentos (cliente, cidade, estado, data_agendamento, horario) 
        VALUES ('$cliente', '$cidade', '$estado', '$data', '$horario')";

if ($conn->query($sql) === TRUE) {
    echo "Agendamento realizado com sucesso!";
} else {
    echo "Erro ao agendar: " . $conn->error;
}
?>