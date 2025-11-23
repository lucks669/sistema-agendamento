<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projeto_1";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agendamentos</title>
</head>
<body>

<h1>Lista de Agendamentos</h1>

<table border="1" cellpadding="5">
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Ação</th> 
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["cliente"]."</td>";
            echo "<td>".$row["cidade"]."</td>";
            echo "<td>".$row["estado"]."</td>";
            echo "<td><a href='excluir.php?id=".$row["id"]."'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum agendamento encontrado</td></tr>";
    }
    ?>

</table>

<br>
<a href="index.html">Voltar</a>

</body>
</html>

<?php
$conn->close();
?>
