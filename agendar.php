<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projeto_1"; // se quiser mudar para sistema_agendamento depois, a gente muda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$cliente = $_POST['cliente'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$data = $_POST['data_agendamento'];
$horario = $_POST['horario'];

$sql = "INSERT INTO clientes (cliente, cidade, estado) VALUES ('$cliente', '$cidade', '$estado')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Agendamento salvo com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
