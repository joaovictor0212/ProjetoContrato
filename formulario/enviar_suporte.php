<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contratos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

// Verifica a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$problema = $_POST['problema'];


// Prepara a declaração SQL
$stmt = $conn->prepare("INSERT INTO suporte (nome, email, problema, id_usuario) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nome, $email, $problema, $id_usuario);

// Executa a declaração
$stmt->execute();

echo "<script>
        localStorage.setItem('mensagem', 'Mensagem enviada com sucesso!');
        setTimeout(function() { window.location.href = 'http://localhost/projeto/'; }, 1000);
      </script>";

$stmt->close();
$conn->close();
?>
