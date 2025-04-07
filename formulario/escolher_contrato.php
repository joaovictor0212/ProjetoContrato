<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CONTRATO</title>
   	<link rel="stylesheet" type="text/css" href="../estilo/geral.css">
       <style>
    img {
        width: 100%;
            height: 100%;
            object-fit: cover;
        opacity: 0.3;
    }
</style>
<img src="/projeto/assets/contrato.png" alt="Imagem Transparente">
</head>
<body>

</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contratos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contrato";
$result = $conn->query($sql);

echo "
<style>
    table {
        width: 40%;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
</style>
";

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>";
  echo "<tr><th>ID</th><th>Nome do Comodante</th><th>Nome do Comodatário</th><th>Ações</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id_contrato"] . "</td>";
    echo "<td>" . $row["nome_comodante"] . "</td>";
    echo "<td>" . $row["nome_comodatario"] . "</td>";
    echo "<td><a href='editar_contrato.php?id=" . $row["id_contrato"] . "'>Editar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "Nenhum contrato encontrado.";
}
$conn->close();
?>


</body>
</html>