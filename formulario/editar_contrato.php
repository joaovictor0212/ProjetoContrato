<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contratos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$id_contrato = $_GET['id']; // obtém o ID do contrato do parâmetro GET
  
$sql = "SELECT * FROM contrato WHERE id_contrato = " . $id_contrato;
$result = $conn->query($sql);
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>Editar Contrato de Comodato</h2>";
        echo "<form action='atualizar_contrato.php' method='post'>";
        echo "Nome do Comodante:<br>";
        echo "<input type='text' name='nome_comodante' value='" . $row["nome_comodante"] . "'><br>";
        echo "Endereço do Comodante:<br>";
        echo "<input type='text' name='endereco_comodante' value='" . $row["endereco_comodante"] . "'><br>";
        echo "Nome do Comodatário:<br>";
        echo "<input type='text' name='nome_comodatario' value='" . $row["nome_comodatario"] . "'><br>";
        echo "Endereço do Comodatário:<br>";
        echo "<input type='text' name='endereco_comodatario' value='" . $row["endereco_comodatario"] . "'><br>";
        echo "Bem Comodado:<br>";
        echo "<input type='text' name='bem_comodado' value='" . $row["bem_comodado"] . "'><br>";
        echo "Data de Início do Comodato:<br>";
        echo "<input type='date' name='data_inicio' value='" . $row["data_inicio"] . "'><br>";
        echo "Data de Término do Comodato:<br>";
        echo "<input type='date' name='data_termino' value='" . $row["data_termino"] . "'><br>";
        echo "Condições do Bem Comodado:<br>";
        echo "<input type='text' name='condicoes' value='" . $row["condicoes"] . "'><br>";
        echo "<input type='hidden' name='id_contrato' value='" . $row["id_contrato"] . "'>";
        echo "<input type='submit' value='Atualiza'>";
        echo "</form>";
    }


    $sql_clausulas = "SELECT * FROM clausulas WHERE id_contrato = " . $id_contrato;
    $result_clausulas = $conn->query($sql_clausulas);

    if ($result_clausulas->num_rows > 0) {
        // output data of each row
        while($row_clausula = $result_clausulas->fetch_assoc()) {
            echo "<h2>Editar Cláusula</h2>";
            echo "<form action='atualizar_clausula.php' method='post'>";
            echo "Título da Cláusula:<br>";
            echo "<input type='text' name='titulo' value='" . $row_clausula["titulo"] . "'><br>";
            echo "Texto da Cláusula:<br>";
            echo "<textarea name='texto'>" . $row_clausula["texto"] . "</textarea><br>";
            echo "<input type='hidden' name='id_clausula' value='" . $row_clausula["id_clausula"] . "'>";
            echo "<input type='submit' value='Atualizar'>";
            echo "</form>";
        }
    }
} else {
    echo "0 results";
}
$conn->close();
?><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contratos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
$id_contrato = $_GET['id']; // obtém o ID do contrato do parâmetro GET
  
$sql = "SELECT * FROM contrato WHERE id_contrato = " . $id_contrato;
$result = $conn->query($sql);
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>Editar Contrato de Comodato</h2>";
        echo "<form action='atualizar_contrato.php' method='post'>";
        // ... restante do código do formulário de edição do contrato ...
        echo "</form>";
    }

    // Busca as cláusulas associadas ao contrato
    $sql_clausulas = "SELECT * FROM clausulas WHERE id_contrato = " . $id_contrato;
    $result_clausulas = $conn->query($sql_clausulas);

    if ($result_clausulas->num_rows > 0) {
        // output data of each row
        while($row_clausula = $result_clausulas->fetch_assoc()) {
            echo "<h2>Editar Cláusula</h2>";
            echo "<form action='atualizar_clausula.php' method='post'>";
            // ... restante do código do formulário de edição da cláusula ...
            echo "</form>";
        }
    }

    // Formulário para adicionar uma nova cláusula
    echo "<h2>Adicionar Nova Cláusula</h2>";
    echo "<form action='inserir_clausula.php' method='post'>";
    echo "Título da Cláusula:<br>";
    echo "<input type='text' name='titulo'><br>";
    echo "Texto da Cláusula:<br>";
    echo "<textarea name='texto'></textarea><br>";
    echo "<input type='hidden' name='id_contrato' value='" . $id_contrato . "'>";
    echo "<input type='submit' value='Adicionar'>";
    echo "</form>";
} else {
    echo "0 results";
}
$conn->close();
?>

 