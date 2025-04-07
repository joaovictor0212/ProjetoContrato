<?php


$conn = new mysqli('localhost', 'root', '', 'contratos');

if ($conn->connect_error) {
    die('Erro de conexão com o banco de dados: ' . $conn->connect_error);
}


$dadosContrato = $_POST;


$nomeComodante = $dadosContrato['nomeComodante'];
$enderecoComodante = $dadosContrato['enderecoComodante'];
$nomeComodatario = $dadosContrato['nomeComodatario'];
$enderecoComodatario = $dadosContrato['enderecoComodatario'];
$bemComodado = $dadosContrato['bemComodado'];
$dataInicio = $dadosContrato['dataInicio'];
$dataTermino = $dadosContrato['dataTermino'];
$condicoes = $dadosContrato['condicoes'];
$estadodevolucaoesperado = $dadosContrato['estadodevolucaoesperado'];
$responsavel_manutencao =$dadosContrato['responsavel_manutencao'];
$estado_devolucao_real = isset($_GET['estado_devolucao_real']) ? $_GET['estado_devolucao_real'] : '';




$sql = "INSERT INTO contrato (
    nome_comodante, endereco_comodante, nome_comodatario, endereco_comodatario, bem_comodado, data_inicio, data_termino, condicoes, estado_devolucao_esperado, responsavel_manutencao,estado_devolucao_real ) VALUES (
    '$nomeComodante', '$enderecoComodante', '$nomeComodatario', '$enderecoComodatario', '$bemComodado', 
    '$dataInicio', '$dataTermino', '$condicoes','$estadodevolucaoesperado', '$responsavel_manutencao','$estado_devolucao_real')";
    

if ($conn->query($sql) === TRUE) {
    $mensagem = 'Contrato salvo com sucesso!';
    $status = 'sucesso';
} else {
    $mensagem = 'Falha ao salvar contrato: ' . $conn->error;
    $status = 'erro';
}


$conn->close();

    echo " <script>
    alert(' $mensagem '); // Exibir mensagem de sucesso
    window.location.href = '../index.php';

</script>"


?>
