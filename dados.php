<?php
session_start();
$id = $_SESSION['id_user'];
$apelido = $_SESSION['p_nome'];
$query = "SELECT * FROM usuario WHERE id_user = '$id'";
$resultado = $ligacao->query($query);
if ($resultado->num_rows > 0) {
    $dados = $resultado->fetch_assoc();
    $nome = isset($dados['nome_user']) ? $dados['nome_user'] : "Indefinido";
    $email = isset($dados['email_user']) ? $dados['email_user'] : "Indefinido";
    $nomeComp = isset($dados['nomeC_user']) ? $dados['nomeC_user'] : "Indefinido";
    $cpf = isset($dados['cpf_user']) ? $dados['cpf_user'] : "Indefinido";
    $tel = isset($dados['tel_user']) ? $dados['tel_user'] : "Indefinido";
    $senha = isset($dados['senha_user']) ? $dados['senha_user'] : "Indefinido";
}
?>