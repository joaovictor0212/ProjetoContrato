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
        width: 80%;
    }
    th, td {
        padding: 15px;
        text-align: left;
    }
</style>
";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th><TH>Nome do Comodante</th>";
    echo "<th>Nome do Comodatário</th>";
    echo "<th>Ações</th>";
    echo "<th>VALIDADE</th>";
    echo "<th>RGNS</th>";
    echo "<th>STATUS</th>";
        echo "</tr>";
    
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id_contrato"] . "</td>";
    echo "<td><td>" . $row["nome_comodante"] . "</td>";
    echo "<td>" . $row["nome_comodatario"] . "</td>";

    echo "<td><a href='editar_contrato.php?id=" . $row["id_contrato"] . "'>Editar</a></td>";
    echo "<td>" . $row["data_termino"] . "</td>";
    echo "<td><a href='consultar_contrato.php?id=" . $row["id_contrato"] . "'>Visualizar</a></td>";
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