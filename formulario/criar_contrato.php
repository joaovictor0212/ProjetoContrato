<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de contratos</title>
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
<body>


<h1>Tipos de Contratos</h1>
    <ul><br>
    <li><a href="contrato_comodato.php">Contrato de Comodato</a></li><br>
        <li><a href="contrato_servicos.html">Contrato de Prestação de Serviços</a></li><br>
        <li><a href="contrato_trabalho.html">Contratos Trabalhistas</a></li><br>
        <li><a href="contrato_investimento.html">Contrato de Investimento</a></li><br>
        <li><a href="contrato_guarda-chuvas.html">Contrato de Experiência</a></li><br>
        <li><a href="contrato_guarda-chuvas.html">Contrato de Teletrabalho</a></li><br>
        <li><a href="contrato_guarda-chuvas.html">Contrato temporário</a></li><br>
        <li><a href="contrato_guarda-chuvas.html">Contrato de trabalho terceirizado</a></li><br>
    </ul>
</body></html>

