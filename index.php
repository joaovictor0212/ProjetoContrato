<!DOCTYPE html>
<html>
<head>
  <title>Projeto contrato</title>
  <link rel="stylesheet" type="text/css" href="./estilo/geral.css">
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
  </script>
</head>
<body id="backhome">

<header>
  <table>
    <tr>
      <th class="titulo" width="90%"><h2>SISTEMA DE CONTROLE CONTRATOS</h2></th>
      <th width="1%"><a href="/projeto/formulario/cad_usuario.php">Cadastro</a></th>
      <th id="login-link" width="180%"> <a href="/projeto/formulario/form_login.php">Login</a></th>
      <th id="logout-link" width="180%" style="display: none;"> <a href="/projeto/formulario/logout.php">Logout</a></th>
      <th id="statusLogin" width="1%"></th>
      <th width="1%"><a href="/projeto/formulario/suporte.php">Suporte</a></th> <!-- Link para a página de suporte -->
    </tr>
  </table>
</header>
<div id="flex-container">
  </div>

<div id="flex-container">
  
  <article class="box">
    <h3><a href="/projeto/formulario/criar_contrato.php">Criar contrato</a></h3>
  </article>
  <article class="box">
    <h3><a href="/projeto/formulario/escolher_contratoRGNS.php">Consultar contratos</a></h3>
  </article>
  <article class="box">
    <h3><a href="/projeto/formulario/excluir_contrato.php">Excluir contratos</a></h3>
  </article>
  <article class="box">
    <h3><a href="/projeto/formulario/escolher_contrato.php">Modificar contratos</a></h3>
  </article>
</div>
<br>

<img src="/projeto/assets/contrato.png" width="100%" id="contratoImage">

</body>
</html>
