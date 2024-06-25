<?php
session_start();
// Limpa todas as variáveis de sessão
session_unset();
// Fecha a sessão (os dados ainda estão disponíveis para leitura)
session_write_close();
header("Location: ../2 - Cadastro/login.php");
?>