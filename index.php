<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Agendamento</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #4CAF50, #2e7d32);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    form {
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        width: 100%;
        max-width: 500px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    input, select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 16px;
    }
    button {
        width: 100%;
        padding: 12px;
        background: #4CAF50;
        color: #fff;
        font-size: 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    button:hover {
        background: #388e3c;
    }
    a {
        display: block;
        text-align: center;
        margin-top: 10px;
        color: #4CAF50;
        text-decoration: none;
    }
</style>
</head>
<body>
<form action="agendar.php" method="POST">
    <h1>Agendamento</h1>
    <input type="text" name="cliente" placeholder="Nome do Cliente" required>
    <input type="text" name="cidade" placeholder="Cidade">
    <input type="text" name="estado" placeholder="Estado">
    <input type="date" name="data_agendamento" required>
    <input type="time" name="horario" required>
    
    <!-- Menu suspenso de serviços -->
    <select name="servico" required>
        <option value="">Selecione um serviço</option>
        <option value="Corte de cabelo">Corte de cabelo</option>
        <option value="Manicure">Manicure</option>
        <option value="Pedicure">Pedicure</option>
        <option value="Massagem">Massagem</option>
    </select>

    <button type="submit">Agendar</button>
    <a href="listar.php">Ver Agendamentos</a>
</form>
</body>
</html>