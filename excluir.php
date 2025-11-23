<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projeto_1";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: listar.php");
} else {
    echo "Erro ao excluir: " . $conn->error;
}

$conn->close();
?>
