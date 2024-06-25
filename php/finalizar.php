<?php 

session_start();

foreach($_SESSION['dados'] as $produto) {
    $ligacao = new PDO('mysql:host=localhost;dbname=loja', 'root', '1234');
    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $insert = $ligacao-> prepare("INSERT INTO pedidos () VALUES (NULL,?,?,?,?)");
    $insert->bindParam(1,$produto['id_produtos']);
    $insert->bindParam(2,$produto['quantidade']);
    $insert->bindParam(3,$produto['valor']);
    $insert->bindParam(4,$produto['total']);
    $insert->execute();
}

?>