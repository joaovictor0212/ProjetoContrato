<?php
  session_start();

  // Destruir a sessão
  session_destroy();

  // Remover a variável 'logged_in' do localStorage e exibir um alerta
  echo "<script>
    localStorage.removeItem('logged_in');
    alert('Sessão encerrada');
    window.location.href = '../index.php';
  </script>";
  exit;
?>
