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
</head>

<body>
    <img src="/projeto/assets/contrato.png" alt="Imagem Transparente">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contratoS";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Obtendo o contrato
    $id_contrato = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $sql = "SELECT * FROM contrato WHERE id_contrato = $id_contrato";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>Contrato de Comodato</h2>";
            echo "Pelo presente instrumento particular, as partes abaixo qualificadas têm entre si justo e acordado o presente Contrato de Comodato, que se regerá pelas cláusulas e condições seguintes:";
            echo "<br><br>";
            echo "<strong>COMODANTE:</strong> " . $row["nome_comodante"] . ", residente e domiciliado no endereço " . $row["endereco_comodante"] . ".<br>";
            echo "<strong>COMODATÁRIO:</strong> " . $row["nome_comodatario"] . ", residente e domiciliado no endereço " . $row["endereco_comodatario"] . ".<br>";
            echo "<strong>BEM COMODADO:</strong> " . $row["bem_comodado"] . ".<br>";
            echo "<strong>DATA DE INÍCIO DO COMODATO:</strong> " . $row["data_inicio"] . ".<br>";
            echo "<strong>DATA DE TÉRMINO DO COMODATO:</strong> " . $row["data_termino"] . ".<br>";
            echo "<strong>CONDIÇÕES DO BEM COMODADO:</strong> " . $row["condicoes"] . ".<br><br>";
            echo "E por estarem assim justos e contratados, assinam o presente instrumento em duas vias de igual teor e forma.<br><br>";
            echo "______________________<br>" . $row["nome_comodante"] . "<br>";
            echo "______________________<br>" . $row["nome_comodatario"] . "<br><br><hr>";
        }
    } else {
        echo "<h2>Nenhum contrato encontrado.</h2>";
    }

    // Exibindo a tabela
    echo '<div class="container">';
    echo '<h2>Relatório de Gerenciamento de Nível de Serviço</h2>';
    echo '<table>';
    echo '<thead><tr>';
    echo '<th style="padding: 10px;">Contrato</th>';
    echo '<th style="padding: 10px;">Estado de Devolução Esperado</th>';
    echo '<th style="padding: 10px;">Estado de Devolução Real</th>';
    echo '<th style="padding: 10px;">Cumprimento do SLA</th>';
    echo '</tr></thead><tbody>';

    $sql = "SELECT * FROM contrato";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
echo "<td>" . $row["id_contrato"] . "</td>";
echo "<td>" . $row["estado_devolucao_esperado"] . "</td>";

// Dropdown para selecionar o estado de devolução real
echo "<td>";
echo "<form id='form_" . $row['id_contrato'] . "' method='GET' action='gerar_RGNS.php'>";
echo "<input type='hidden' name='id' value='" . $row['id_contrato'] . "'>";
echo "<select name='estado_devolucao_real' form='form_" . $row['id_contrato'] . "' required>
        <option value='Novo'>Novo</option>
        <option value='Bom'>Bom</option>
        <option value='Regular'>Regular</option>
        <option value='Ruim'>Ruim</option>
      </select>";
echo "</form>";
echo "</td>";

// Botão GERAR que usa o estado selecionado
echo "<td>";
echo "<button type='submit' form='form_" . $row['id_contrato'] . "'>GERAR</button>";
echo "</td>";
echo "</tr>";

            
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum contrato encontrado.</td></tr>";
    }

    echo '</tbody></table></div>';
    $conn->close();
    ?>
</body>
</html>
