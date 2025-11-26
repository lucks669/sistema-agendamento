<?php
include 'conexao.php';

// Verifica se o ID foi passado pela URL
if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // garante que é um número inteiro

    // Prepara a query de exclusão
    $stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Executa a query
    if($stmt->execute()) {
        echo "Agendamento excluído com sucesso!";
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID não informado!";
}

$conn->close();
?>