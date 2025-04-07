<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $_POST["txt_user"];
  $senha = $_POST["txt_pass"];

  $conn = conectar();

  if (usuario_existe($login, $conn)) {
    $hashed_senha = buscar_senha($login, $conn);
    if (password_verify($senha, $hashed_senha)) {
      $_SESSION["login"] = $login;
      echo "<script>
        localStorage.setItem('logged_in', true);
        alert('Login realizado com sucesso!');
        setTimeout(function() { window.location.href = 'http://localhost/projeto/'; }, 1000);
      </script>";
      exit;
    } else {
      echo "<p class='error'>Senha incorreta.</p>";
    }
  } else {
    echo "<p class='error'>Usuário não encontrado.</p>";
  }
}

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

function usuario_existe($login, $conn) {
  $query = "SELECT COUNT(*) FROM usuarios WHERE login = :login";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":login", $login);
  $stmt->execute();
  $result = $stmt->fetchColumn();
  return $result > 0;
}

function buscar_senha($login, $conn) {
  $query = "SELECT senha FROM usuarios WHERE login = :login";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":login", $login);
  $stmt->execute();
  $result = $stmt->fetch();
  return $result["senha"];
}


// Suponha que você tenha verificado as credenciais do usuário e tenha o ID do usuário
$id_usuario = verificarCredenciais($login, $senha);

// Armazene o ID do usuário na sessão
$_SESSION['id_usuario'] = $id_usuario;

?>
