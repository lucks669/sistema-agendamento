<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Agendamento</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4CAF50, #2e7d32);
            min-height: 100vh; display: flex; justify-content: center; align-items: center;
            padding: 20px;
        }
        .container {
            background: #fff; padding: 30px; border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2); width: 100%; max-width: 420px;
        }
        h1 { text-align: center; margin-bottom: 20px; color: #2e7d32; }
        label { font-weight: bold; display: block; margin-bottom: 6px; color: #333; }
        input {
            width: 100%; padding: 10px; margin-bottom: 15px;
            border: 1px solid #ccc; border-radius: 6px; transition: border-color 0.3s;
        }
        input:focus { border-color: #4CAF50; outline: none; }
        button {
            width: 100%; padding: 12px; background: #4CAF50; color: #fff;
            border: none; border-radius: 6px; font-size: 16px; cursor: pointer;
            transition: background 0.3s;
        }
        button:hover { background: #388e3c; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Sistema de Agendamento</h1>

        <form action="agendar.php" method="POST">
            <label for="cliente">Nome do cliente:</label>
            <input type="text" id="cliente" name="cliente" required>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade">

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado">

            <label for="data_agendamento">Data do atendimento:</label>
            <input type="date" id="data_agendamento" name="data_agendamento" required>

            <label for="horario">Horário:</label>
            <input type="time" id="horario" name="horario" required>

            <button type="submit">Agendar</button>
        </form>
    </div>

</body>
</html>
