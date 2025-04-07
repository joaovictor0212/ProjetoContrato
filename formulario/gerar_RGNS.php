<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contratos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_contrato = $_GET['id'];

if (!is_numeric($id_contrato)) {
    die("ID de contrato inválido.");
}

$stmt = $conn->prepare("SELECT * FROM contrato WHERE id_contrato = ?");
$stmt->bind_param("i", $id_contrato);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $dataInicio = new DateTime($row["data_inicio"]);
    $dataTermino = new DateTime($row["data_termino"]);
    $estadoEsperado = $row["estado_devolucao_esperado"];
    $estadoReal = $row["estado_devolucao_real"];

    // Definindo a data de devolução real como a data atual
    $dataDevolucaoReal = new DateTime();

    function calcularSLA($dataInicio, $dataTermino, $estadoEsperado, $estadoReal, $dataDevolucaoReal) {
        $diferencaDias = $dataDevolucaoReal->diff($dataTermino)->days;
        $estadoCorreto = ($estadoReal === $estadoEsperado);

        if ($diferencaDias <= 0 && $estadoCorreto) {
            return "não cumprido (atraso na devolução de $diferencaDias dias)";
        } elseif ($diferencaDias > 0) {
            return "cumprido (dentro do prazo e estado correto)";
        } else {
            return " cumprido (dentro do prazo e estado correto)";
        }
    }

    $slaCumprido = calcularSLA($dataInicio, $dataTermino, $estadoEsperado, $estadoReal, $dataDevolucaoReal);

    echo "<h2>Resultado do Cálculo do SLA</h2>";
    echo "O SLA para o contrato " . $id_contrato . " foi " . $slaCumprido . ".";

    // Exibindo informações detalhadas
    echo "<br>Data de início: " . $dataInicio->format('d/m/Y');
    echo "<br>Data de término: " . $dataTermino->format('d/m/Y');
    echo "<br>Data de devolução real: " . $dataDevolucaoReal->format('d/m/Y');
    echo "<br>Estado esperado: " . $estadoEsperado;
    echo "<br>Estado real: " . $estadoReal;
} else {
    echo "Contrato não encontrado.";
}

$conn->close();
?>