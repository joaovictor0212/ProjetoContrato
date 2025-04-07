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
function conectar() {
    $server = "mysql:host=localhost;dbname=contratos";
    $user = "root";
    $pass = "";

    try {
        $conn = new PDO($server, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names UTF8");
        return $conn;
    } catch (PDOException $ex) {
        echo "Erro ao conectar ao banco de dados: " . $ex->getMessage();
        die;
    }
}
$conn = conectar();


$sql = "SELECT nome_comodante FROM contrato";

try {

  $stmt = $conn->prepare($sql);


  $stmt->execute();


  if ($stmt->rowCount() > 0) {
    echo "<h2>Lista de contratos</h2>";
    echo "<table>";
    echo "<tr><th>Nome do COMODANTE </th>";

    // Loop through each student row
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $nome_comodante = $row['nome_comodante'];
  


      echo "<tr>";
      echo "<td>$nome_comodante</td>";
    

      echo "<td><form action='' method='post' onsubmit='return confirmDelete()'>
              <input type='hidden' name='nome_comodante' value='$nome_comodante'>
              <button type='submit'>Excluir</button>
            </form></td>";

      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "Sem nenhum contrato";
  }
} catch (PDOException $ex) {
  echo "Error listing students: " . $ex->getMessage();
}

if (isset($_POST['nome_comodante'])) {
  $nome_comodante = $_POST['nome_comodante'];

  try {
 
    $sql = "DELETE FROM contrato WHERE nome_comodante = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(1, $nome_comodante, PDO::PARAM_INT);


    $stmt->execute();

    echo "
    <script>
        alert('Usuário deletado com sucesso');
        setTimeout(function(){
            window.location.href = '../index.php';
        }, 2000);
    </script>
    ";
  } catch (PDOException $ex) {
    echo "Erro deletar contrato " . $ex->getMessage();
  }
}


$conn = null;

?>

<script>

function confirmDelete() {
  return confirm("Quer mesmo deletar o contrato?");
}
</script>

</body>
</html>
