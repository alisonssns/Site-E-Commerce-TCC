<?php
session_start();

if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = array();
}

if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
    
    $id_prod = $_GET['id'];
    if (!isset($_SESSION['itens'][$id_prod])) {
        $_SESSION['itens'][$id_prod] = 1;
    } else {
        $_SESSION['itens'][$id_prod]++;
    }
}


if (count($_SESSION['itens']) == 0) {
    echo 'Carrinho vazio <br><a href="select.php">Voltar à página de produtos</a>';
} else {
    
        $_SESSION['dados']= array();
        
        try {
        $ligacao = new PDO('mysql:host=localhost;dbname=loja', 'root', '1234');
        $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $totalGeral = 0;
        foreach ($_SESSION['itens'] as $id_prod => $quantidade) {
            $select = $ligacao->prepare("SELECT * FROM produto WHERE id_prod = ?");
            $select->bindParam(1,$id_prod);
            $select->execute();
            $produto = $select->fetch(PDO::FETCH_ASSOC);

            if ($produto) {
                $total = $quantidade * $produto['valor_prod']; 
                $totalGeral += $total; 
                echo $produto['nome_prod'] . '<br>';
                echo 'Valor: R$ ' . number_format($produto['valor_prod'], 2, ",", ".") . '<br>';
                echo 'Categoria: ' . $produto["cat_prod"] . '<br>';
                echo 'Quantidade: ' . $quantidade . '<br>';
                echo 'Total: R$ ' . number_format($total, 2, ",", ".") . '<br>';
                echo '<a href="remover.php?remover=carrinho&id=' . $id_prod . '">Remover produto</a><hr>';
            }

            array_push(
            $_SESSION['dados'],
            array(
                'id_produtos' =>$id_prod,
                'quantidade' => $quantidade,
                'valor' => $produto['valor_prod'],
                'total' =>$total,
                'total_geral' => $totalGeral
            )
        );
       
        }
        echo 'Total Geral: R$ ' . number_format($totalGeral, 2, ",", ".") . '<br>';
        echo '<a href="finalizar.php">Finalizar pedido</a>';
    } catch (PDOException $e) {
        echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
    }
}
?>