<?php

include ('../conexao.php');

// Verifique se os dados foram enviados via método POST (endereço e dados pessoais pertencem a mesma tabela)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Obtenha os dados do endereço do POST
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $bairro = $_POST["bairro"];
    $localidade = $_POST["localidade"];
    $uf = $_POST["uf"];
    $comp = $_POST["comp"];
    $num = $_POST["num"];
    $tipo = $_POST["tipo"];

    // Obtenha os dados pessoais do POST
    $tel = $_POST["tel"];
    $cpf = $_POST["cpf"];
    $nomeCompleto = $_POST["nomeCompleto"];

    // Query para inserir os dados no banco de dados (usando declarações preparadas para prevenir injeção SQL)
    $sql = "UPDATE usuario
    SET 
        nomeCompleto = ?,
        cpf = ?,
        tel = ?,
        cep = ?,
        logradouro = ?,
        bairro = ?,
        localidade = ?,
        uf = ?,
        num = ?,
        comp = ?,
        tipo = ?
    WHERE id_user = 1;";
    
    // Prepare a consulta
    $stmt = $ligacao->prepare($sql);

    if ($stmt) {
        // Associe os parâmetros da consulta aos valores recebidos
        $stmt->bind_param("sssssssssss", $nomeCompleto, $cpf, $tel, $cep, $logradouro, $bairro, $localidade, $uf, $num, $comp, $tipo);

        // Execute a consulta
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error ao executar a consulta: " . $stmt->error;
        }

        // Feche a consulta
        $stmt->close();
    } else {
        echo "erro ao preparar a consulta: " . $ligacao->error;
    }

    // Feche a conexão com o banco de dados
    $ligacao->close();
} else {
    echo "Método não permitido.";
}
?>