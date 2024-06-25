<style>
    .a{
        background-color: red;
    }
    .b{
        background-color: green;
    }
</style>
<?php
    $ligacao = mysqli_connect("127.0.0.1:3306", "root","1234","loja");
		if (!$ligacao) ( die("Conexão falhou:" . mysqli_connect_error())) ;

$sql = $ligacao->prepare 
("CALL prod ('".$_POST["nome_prod_sp"]."',
            '".$_POST["desc_prod_sp"]."',
            '".$_POST["valor_prod_sp"]."',
            '".$_POST["valor_in_prod_sp"]."',
            '".$_POST["quant_prod_sp"]."',
            '".$_POST["espec_prod_sp"]."',
            '".$_POST["cat_prod_sp"]."',
            '".$_POST["cod_prod_sp"]."',
            '/imagens/".$_POST["img_prod_sp"]."',
             @saida, @saida_rotulo)");
$sql->execute();
$sql->close();

$result = $ligacao->query("SELECT @saida, @saida_rotulo");
$row = $result->fetch_assoc();
$saida = $row['@saida'];
$saida_rotulo = $row['@saida_rotulo'];

if ($saida_rotulo == 'OPS!') {
    echo '<div class="a">' . $saida . '</div>';
} else {
    echo '<div class="b">' . $saida . '</div>';
}

mysqli_close($ligacao); 
?>