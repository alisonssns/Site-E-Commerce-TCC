<?php
session_start();
$email = $_POST["email_user_sp"];
$query = "SELECT * FROM usuario WHERE email_user = '$email'";
$resultado = $ligacao->query($query);
if ($resultado->num_rows > 0) {
    $dadosUsuario = $resultado->fetch_assoc();
    $nomeCompleto = $dadosUsuario['nome_user'];
    $nomes = explode(" ", $nomeCompleto);
    $primeiroNome = $nomes[0];
    $_SESSION['p_nome'] = $primeiroNome;
    $_SESSION['id_user'] = $dadosUsuario['id_user'];
}
;
?>