<?php
require 'conexao.php';

$cliente = $_POST['cliente'] ?? '';
$cidade  = $_POST['cidade'] ?? '';
$estado  = $_POST['estado'] ?? '';
$data    = $_POST['data_agendamento'] ?? '';
$horario = $_POST['horario'] ?? '';
$servico = $_POST['servico'] ?? '';

// Validação dos campos obrigatórios
if (empty($cliente) || empty($data) || empty($horario) || empty($servico)) {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Erro</title>
    <style>
        body { margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center; font-family: Arial; background: #f8d7da; }
        .mensagem { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2); color: #721c24; font-weight: bold; text-align: center; }
        .btn { display:inline-block; margin-top:12px; padding:8px 14px; background:#721c24; color:#fff; text-decoration:none; border-radius:6px; }
    </style></head><body>
    <div class='mensagem'>Preencha todos os campos obrigatórios.<br><a class='btn' href='index.php'>Voltar</a></div>
    </body></html>";
    exit;
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

// Mensagem de sucesso
if ($stmt2->execute()) {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Sucesso</title>
    <style>
        body { margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center; font-family: Arial; 
               background: linear-gradient(135deg, #4CAF50, #2e7d32); }
        .mensagem { background: #fff; padding: 30px 40px; border-radius: 12px; 
                    box-shadow: 0 4px 15px rgba(0,0,0,0.3); font-size: 22px; font-weight: bold; 
                    color: green; text-align: center; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #4CAF50; 
               color: #fff; border: none; border-radius: 6px; cursor: pointer; 
               text-decoration: none; font-size: 16px; }
        .btn:hover { background: #388e3c; }
    </style></head><body>
    <div class='mensagem'>
        ✅ Agendamento salvo com sucesso!<br>
        <a href='index.php' class='btn'>Novo agendamento</a>
    </div>
    </body></html>";
} 

// Mensagem de erro
else {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Erro</title>
    <style>
        body { margin: 0; height: 100vh; display: flex; justify-content: center; align-items: center; 
               font-family: Arial; background: #f8d7da; }
        .mensagem { background: #fff; padding: 30px; border-radius: 10px; 
                    box-shadow: 0 0 10px rgba(0,0,0,0.2); color: #721c24; 
                    font-weight: bold; text-align: center; }
        .btn { display:inline-block; margin-top:12px; padding:8px 14px; background:#721c24; 
               color:#fff; text-decoration:none; border-radius:6px; }
    </style></head><body>
    <div class='mensagem'>Erro ao salvar agendamento: {$stmt2->error}<br>
    <a class='btn' href='index.php'>Voltar</a></div>
    </body></html>";
}

$conn->close();
