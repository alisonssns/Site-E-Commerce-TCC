<?php 

session_start();

if (isset($_GET['remover']) && $_GET['remover'] == "carrinho") {
    $id_prod = $_GET['id'];
    
    $quantidade = (isset($_GET['quantidade'])) ? $_GET['quantidade'] : 1;
   
    if (isset($_SESSION['itens'][$id_prod]) && $_SESSION['itens'][$id_prod] > 1) {    
        $_SESSION['itens'][$id_prod]--;

    } else {
       
        unset($_SESSION['itens'][$id_prod]);
    }
    header("Location: /8 - carrinho de compras/cart.php");
    exit();
}

if (isset($_GET['adicionar']) && $_GET['adicionar'] == "carrinho") {
    $id_prod = $_GET['id'];
    
    $quantidade = (isset($_GET['quantidade'])) ? $_GET['quantidade'] : 1;
   
    if (isset($_SESSION['itens'][$id_prod]) && $_SESSION['itens'][$id_prod] >= 1) {    
        $_SESSION['itens'][$id_prod]++;

    } else {
       
        unset($_SESSION['itens'][$id_prod]);
    }
    header("Location: /8 - carrinho de compras/cart.php");
    exit();
}

if (isset($_GET['apagar']) && $_GET['apagar'] == "carrinho") {
    $id_prod = $_GET['id'];
    
    $quantidade = (isset($_GET['quantidade'])) ? $_GET['quantidade'] : 1;
    unset($_SESSION['itens'][$id_prod]);

    header("Location: /8 - carrinho de compras/cart.php");
    exit();
}
?>