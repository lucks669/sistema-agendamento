<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projeto_1";

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
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
