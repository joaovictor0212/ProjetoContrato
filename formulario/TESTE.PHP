<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Relatório de Gerenciamento de Nível de Serviço</title>
</head>
<body>
    <form method="post">
        <label for="id_contrato">Digite o ID do contrato (deixe em branco para todos):</label>
        <input type="text" name="id_contrato" id="id_contrato">
        <button type="submit">Buscar</button>
    </form>

    <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "contratoS";

 $conn = new mysqli($servername, $username, $password, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_contrato = $_POST['id_contrato'];

        if ($id_contrato != "") {
            $sql = "SELECT * FROM Contrato WHERE id_contrato = $id_contrato";
        } else {
            $sql = "SELECT *, DATEDIFF(data_devolucao, data_termino) AS atraso FROM Contrato";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Relatório de Gerenciamento de Nível de Serviço</h2>";
            echo "<table>
                <thead>
                    <tr>
                        <th>Contrato</th>
                        <th>Estado de Devolução Esperado</th>
                        <th>Estado de Devolução Real</th>
                        <th>Atraso (dias)</th>
                        <th>Cumprimento do SLA</th>
                    </tr>
                </thead>
                <tbody>";

            while($row = $result->fetch_assoc()) {
                $cumprimentoSLA = ($row['atraso'] <= 0) ? 'Sim' : 'Não';

                echo "<tr>
                    <td>{$row['nome_comodante']}</td>
                    <td>{$row['estado_devolucao_esperado']}</td>
                    <td>{$row['estado_devolucao_real']}</td>
                    <td>{$row['atraso']}</td>
                    <td>{$cumprimentoSLA}</td>
                </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "Contrato não encontrado ou nenhum contrato cadastrado.";
        }
    }
    ?>
</body>
</html>