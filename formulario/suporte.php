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
<script >
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

    <h2>Suporte ao Usuário</h2>
    
    <p>Se você está enfrentando problemas ou tem alguma dúvida, estamos aqui para ajudar! Por favor, preencha o formulário abaixo e entraremos em contato o mais rápido possível.</p>
    <form action="/projeto/formulario/enviar_suporte.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="problema">Descreva seu problema:</label><br>
        <textarea id="problema" name="problema"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
