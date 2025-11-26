<?php
<<<<<<< Updated upstream
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projeto_1";
=======
require 'conexao.php';
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
if ($conn->query($sql) === TRUE) {
    // Página de sucesso com mensagem centralizada
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Agendamento</title>
        <style>
            body {
                margin: 0;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background: linear-gradient(135deg, #4CAF50, #2e7d32);
                font-family: Arial, sans-serif;
            }
            .mensagem {
                background: #fff;
                padding: 30px 40px;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.3);
                font-size: 22px;
                font-weight: bold;
                color: green;
                text-align: center;
            }
            .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                text-decoration: none;
                font-size: 16px;
            }
            .btn:hover {
                background: #388e3c;
            }
        </style>
    </head>
    <body>
        <div class="mensagem">
            ✅ Agendamento salvo com sucesso!<br>
            <a href="index.php" class="btn">Novo agendamento</a>
        </div>
    </body>
    </html>
    <?php
=======
if ($stmt2->execute()) {
    echo "✅ Agendamento realizado com sucesso!";
>>>>>>> Stashed changes
} else {
    echo "❌ Erro ao agendar: " . $stmt2->error;
}

$conn->close();
?>