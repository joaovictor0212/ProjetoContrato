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

$dbname = "contratoS";





$conn = new mysqli($servername, $username, $password, $dbname);





if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}



$sql = "SELECT * FROM Contrato";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

 

  while($row = $result->fetch_assoc()) {

    echo "<h2>Contrato de Comodato</h2>";

    echo "Pelo presente instrumento particular, as partes abaixo qualificadas têm entre si justo e acordado o presente Contrato de Comodato, que se regerá pelas cláusulas e condições seguintes:";

    echo "<br>";

    echo "<br>";

    echo "<strong>COMODANTE:</strong> " . $row["nome_comodante"]. ", residente e domiciliado no endereço " . $row["endereco_comodante"]. ".";

    echo "<br>";

    echo "<strong>COMODATÁRIO:</strong> " . $row["nome_comodatario"]. ", residente e domiciliado no endereço " . $row["endereco_comodatario"]. ".";

    echo "<br>";

    echo "<strong>BEM COMODADO:</strong> " . $row["bem_comodado"]. ".";

    echo "<br>";

    echo "<strong>DATA DE INÍCIO DO COMODATO:</strong> " . $row["data_inicio"]. ".";

    echo "<br>";

    echo "<strong>DATA DE TÉRMINO DO COMODATO:</strong> " . $row["data_termino"]. ".";

    echo "<br>";

    echo "<strong>CONDIÇÕES DO BEM COMODADO:</strong> " . $row["condicoes"]. ".";

    echo "<br>";

    echo "<br>";

    echo "E por estarem assim justos e contratados, assinam o presente instrumento em duas vias de igual teor e forma.";

    echo "<br>";

    echo "<br>";

    echo "______________________<br>";

    echo $row["nome_comodante"];

    echo "<br>";

    echo "______________________<br>";

    echo $row["nome_comodatario"];

    echo "<br>";

    echo "<br>";

    echo "<hr>";

  }

} else {

  echo "NENHUM CONTRATO ENCONTRADO";

}

$conn->close();

?>



<!DOCTYPE html>

<html>

<head>

    <title>RGNS</title>

    <style>

        .container {

            text-align: center; /

            margin: 0 auto;

            width: 80%;

        }

    </style>

<body>

    <div class="container">

        <h2>Relatório de Gerenciamento de Nível de Serviço</h2>

        <table>

            <thead>

                <tr>

                    <th style="padding: 60px;">Contrato</th>

                    <th style="padding: 60px;">Estado de Devolução Esperado</th>

                    <th style="padding: 60px;">Estado de Devolução Real</th>

                    <th style="padding: 60px;">Cumprimento do SLA</th>

                </tr>

            </thead>



     

</body>

</html>