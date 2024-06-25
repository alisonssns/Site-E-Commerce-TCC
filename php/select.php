<?php 

$ligacao = new PDO('mysql:host=localhost;dbname=loja',"root","1234");
$ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$select = $ligacao->prepare("SELECT * FROM produto");
$select->execute();
$fetch = $select->fetchAll();

foreach($fetch as $produto) {

    echo 'Nome do produto: ' .$produto ['nome_prod'].'&nbsp;
          Quantidade: ' .$produto['quant_prod'].'
          Preço: ' . number_format($produto['valor_prod'],2,",",".").'
          <a href="carrinho.php?add=carrinho&id='.$produto['id_prod'].'"> Adicionar ao carrinho </a>
          <br>';
}


?>