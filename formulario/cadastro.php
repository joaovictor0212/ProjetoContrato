<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $confirm_senha = $_POST["txt_conf"];

    if ($senha == $confirm_senha) {
    
        $conn = conectar();

        if (usuario_existe($login, $conn)) {
            echo "Usuário já existe. O cadastro não foi realizado.";
        } else {
       
            $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);
         
            inserir_usuario($login, $hashed_senha, $conn);
        }
    } else {
        echo "As senhas não coincidem. Por favor, tente novamente.";
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

function inserir_usuario($login, $senha, $conn) {
    $query = "INSERT INTO usuarios (login, senha) VALUES (:login, :senha)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":login", $login);
    $stmt->bindParam(":senha", $senha);
    if ($stmt->execute()) {
        echo "<script>alert('Cadastrado com sucesso!');</script>";
        echo "<script>setTimeout(function() { window.location.href = 'http://localhost/projeto/'; }, 1000);</script>";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}

?>
