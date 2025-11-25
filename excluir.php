<?php
require 'conexao.php';

// Verifica se o ID foi passado
if (!isset($_GET['id'])) {
    die("ID do agendamento não informado.");
}

$id = (int)$_GET['id'];

// Deleta o agendamento pelo ID
$sql = "DELETE FROM agendamentos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "✅ Agendamento excluído com sucesso!";
} else {
    echo "❌ Erro ao excluir: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redireciona de volta para a lista
header("Location: listar.php");
exit;
?>