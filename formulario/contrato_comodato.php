

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
<script>
 function checkLoginStatus() {
        let usuarioLogado = localStorage.getItem('logged_in');

        if (usuarioLogado) {
            document.getElementById('login-link').style.display = 'none';
            document.getElementById('logout-link').style.display = 'block';
        } else {
            document.getElementById('login-link').style.display = 'block';
            document.getElementById('logout-link').style.display = 'none';
        }
    }

    window.onload = checkLoginStatus;
    window.addEventListener('storage', checkLoginStatus);
  </script>

</head>

<body>
    
    <h2>Contrato de Comodato</h2>

    <form id="contratoForm" action="../controle/inserir_contrato.php" method="post">
        <div class="campo">
            <label for="nomeComodante">Nome do Comodante:</label>
            <input type="text" id="nomeComodante" name="nomeComodante" required>
        </div>
        <div class="campo">
            <label for="enderecoComodante">Endereço do Comodante:</label>
            <input type="text" id="enderecoComodante" name="enderecoComodante" required>
        </div>
        <div class="campo">
            <label for="nomeComodatario">Nome do Comodatário:</label>
            <input type="text" id="nomeComodatario" name="nomeComodatario" required>
        </div>
        <div class="campo">
            <label for="enderecoComodatario">Endereço do Comodatário:</label>
            <input type="text" id="enderecoComodatario" name="enderecoComodatario" required>
        </div>
        <div class="campo">
            <label for="bemComodado">Bem Comodado:</label>
            <input type="text" id="bemComodado" name="bemComodado" required>
        </div>
        <div class="campo">
            <label for="dataInicio">Data de Início do Comodato:</label>
            <input type="date" id="dataInicio" name="dataInicio" required>
        </div>
        <div class="campo">
            <label for="dataTermino">Data de Término do Comodato:</label>
            <input type="date" id="dataTermino" name="dataTermino" required>
        </div>
        <div class="campo">
            <label for="condicoes">Condições do Bem Comodado:</label>
            <textarea id="condicoes" name="condicoes" required></textarea>
        </div>
        <div class="campo">
    <label for="estadodevolucaoesperado">Estado de Devolução Esperado:</label>
    <select id="estadodevolucaoesperado" name="estadodevolucaoesperado">
        <option value="novo">Novo</option>
        <option value="bom">Bom</option>
        <option value="regular">Regular</option>
        <option value="ruim">Ruim</option>
    </select>
</div>
<div class="campo">
    <label for="responsavel_manutencao">Responsável pela Manutenção:</label>
    <input type="text" id="responsavel_manutencao" name="responsavel_manutencao">
</div>
        
        <style>
.botoes {
    display: flex;
    padding: 10px 20px;  
    text-align: center;
}
.botoes button, .botoes .button {
    text-align: left; 
    margin-right: 20px; 
}
</style>

<div class="botoes">
    <button type="submit" id="salvar">Salvar</button> 
    <a href="visualizar_contrato.php" id="visualizar" class="button">Visualizar</a>
     <a href="../index.php" id="voltar" button type="button">Voltar</a>
</div>
</form>



    <script src="script.js"></script>
</body>
</html>
