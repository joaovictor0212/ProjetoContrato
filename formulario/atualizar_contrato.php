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

$sql = "UPDATE Contrato SET nome_comodante = '" . $_POST["nome_comodante"] . "', endereco_comodante = '" . $_POST["endereco_comodante"] . "', nome_comodatario = '" . $_POST["nome_comodatario"] . "', endereco_comodatario = '" . $_POST["endereco_comodatario"] . "', bem_comodado = '" . $_POST["bem_comodado"] . "', data_inicio = '" . $_POST["data_inicio"] . "', data_termino = '" . $_POST["data_termino"] . "', condicoes = '" . $_POST["condicoes"] . "' WHERE id_contrato = " . $_POST["id_contrato"];


if ($conn->query($sql) === TRUE) {
  $mensagem = 'Contrato modificado com sucesso!';
  $status = 'sucesso';
} else {
  $mensagem = 'Falha ao atualizar contrato: ' . $conn->error;
  $status = 'erro';
}


$conn->close();

  echo " <script>
  alert(' $mensagem '); // Exibir mensagem de sucesso
  window.location.href = '../index.php';

</script>"

?>