<?php
include ('../conexao.php'); /* Inclui um arquivo PHP permitindo a conexão com o banco de dados */
session_start(); /* Inicia a sessao do usuário e guarda as informações que serão usadas*/

/* Define o comando que a variável receberá, executando uma linha de código MySQL */
$sql_code = "SELECT * FROM produto ORDER BY RAND () LIMIT 12"; 
$stmt = $ligacao->prepare($sql_code); /* Define valores e funcões à variável */

/* Define uma condição */
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

/* Define uma condição */
if (!isset($_SESSION['itens'])) { 
    $_SESSION['itens'] = array(); /* Condiciona o array itens que pertence a sessão */
}

/* Define uma condição */
if (isset($_GET['add']) && $_GET['add'] == "carrinho") {

    $id_prod = $_GET['id']; /* Define a variável id_prod como uma variável GET, definida como identificador do produto */
    if (!isset($_SESSION['itens'][$id_prod])) {  /* Analisa se o array itens está vazio */
        $_SESSION['itens'][$id_prod] = 1;  /* Define id_prod como 1*/
    } else {
        $_SESSION['itens'][$id_prod]++; /* Senão adiciona 1 a contagem já iniciada */
    }
}

/*  */
if (count($_SESSION['itens']) == 0) {
    $quantidadeGeral = 0;
    $totalGeral = 0;
} else {
    $_SESSION['dados'] = array();
        
        try {
        $ligacao = new PDO('mysql:host=localhost;dbname=loja', 'root', '1234');
        $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $totalGeral = 0;
        $quantidadeGeral = 0;
        foreach ($_SESSION['itens'] as $id_prod => $quantidade) {
            $select = $ligacao->prepare("SELECT * FROM produto WHERE id_prod = ?");
            $select->bindParam(1,$id_prod);
            $select->execute();
            $produto = $select->fetch(PDO::FETCH_ASSOC);

            if ($produto) {
                $total = $quantidade * $produto['valor_prod'];
                $quantidadeGeral += $quantidade;
                $totalGeral += $total;
            }

            array_push(
            $_SESSION['dados'],
            array(
                'id_produtos'    => $id_prod,
                'quantidade'     => $quantidade,
                'valor'          => $produto['valor_prod'],
                'total'          => $total,
                'total_geral'    => $totalGeral
            )
        );
       
        }
    } catch (PDOException $e) {
        echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="icon"href="/Imagens_visual/logo-t.png">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="cars.css">
    
</head>
<body>
    <div class="header"> <!-- Cabeçalho -->
        <div class="infos">
        <a href="/3 - Home/home.php" class="logo">TechEase</a> 
            
    <form action="/3 - Home/home.php">
        <input name="pesq" type="search" id="src" placeholder="Pesquisar..." required>
        <label><input type="submit" value="" style="display:none;"><img src="/Imagens_visual/search.png"></label>
    </form>
            <div class="icons">
            <div class="icon">
        <a href="/3 - Home/home.php" class="home"><img src="/imagens_visual/home.png"></a>
        <a href="/8 - carrinho de compras/cart.php" class="cart"> <!-- Botão que leva ao carrinho de compras -->
            <img src="/Imagens_visual/cart.png" alt=""><div class="sup">+3</div>
        </a>
        <label class="menu-btn" for="abre"><img src="/Imagens_visual/menu.png"></label> <!-- Botão ativa o input para abrir o menu -->
    </div>
                <input type="checkbox" id="abre">
                 <div class="content">
                    <div class="rows">
                        <a href="/5 - Pagina Usuario/user.html" class="row" id="p"> <div class="img"><img src="/imagens_prod/user.png"  ></div>Editar Perfil</a>
                        <a href="/10 - Sobre nós/sobre.html" class="row" id="p">    <div class="img"><img src="/imagens_prod/info.png"  ></div>Sobre nós</a>
                        <a href="/6 - FAQ/faq.html" class="row" id="p">             <div class="img"><img src="/imagens_prod/help.png"  ></div>Ajuda e suporte</a>
                        <div href="" class="row">                                   <div class="img"><img src="/imagens_prod/power.png" ></div>Sair</div>
                    </div>
                 </div>
        </div>
    </div>
        </div>


    <section class="products">
            <div class="prod">
                <div class="tit"><p1>Produtos do carrinho</p1></div>


            <div class="sets">
                <div class="box">
                    <?php

                    if (count($_SESSION['itens']) == 0) {
                    echo '
                    <div class="erro">
                    <p>Carrinho vazio!</p>
                    <a href="/3 - Home/home.php">Voltar à página de produtos</a>
                    </div>';
                    }else{

                    foreach ($_SESSION['itens'] as $id_prod => $quantidade) {
                    $select = $ligacao->prepare("SELECT * FROM produto WHERE id_prod = ?");
                    $select->bindParam(1,$id_prod);
                    $select->execute();
                    $produto = $select->fetch(PDO::FETCH_ASSOC);
            echo'
            <div class="set" id="set1">
            <div class="imgS">
                <div class="img_prod" style="background-image: url(/imagens_prod/'.$produto['Img_prod'].')"></div>
            </div>
            <div class="nome">

                <p2>    '.$produto['nome_prod'].'   </p2>
                <p1>    '.$produto["cat_prod"].'    </p1>
            </div>

                <div class="quant">
                            <a href="/php/remover.php?remover=carrinho&id=' . $id_prod . '">
                                <img src="/imagens_visual/minus.png">
                            </a>

                            <div class="q">'.$quantidade.'</div>

                            <a href="/php/remover.php?adicionar=carrinho&id=' . $id_prod . '">
                                <img src="/imagens_visual/plus.png">
                            </a>
                </div>

            <div class="preco">R$ ' . number_format($produto['valor_prod'], 2, ",", ".") .'</div>

            <a href="/php/remover.php?apagar=carrinho&id=' . $id_prod . '" class="close">
                <img src="/Imagens_visual/del.png">
            </a>

            </div>';
                    }}
            echo'
        </div>
            </div>
                </div>
        <div class="box-final">
            <div class="final">
                <div class="titF"><p1>Resumo da compra</p1></div>
                <div class="setF"><p1>Produtos('.$quantidadeGeral.')</p1><p2>R$ ' . number_format($totalGeral, 2, ",", ".") . '</p2></div>
                <div class="setFrete"><p1>Frete</p1><p3>Grátis</p2></div>
                <div class="bol_desc" id="bol_desc"><p1>Um Boleto estará disponível para download e impressão.</p1></div>
                <div class="pix_desc" id="pix_desc"><p1>Um QR code será gerado para o pagamento da sua compra.</p1></div>
                <div class="valor"><p1>Valor Total</p1><p1>R$ ' . number_format($totalGeral, 2, ",", ".") . '</p1></div> 
                <a href="/9 - Finalizar compra/final.html" class="btn"><input type="submit" value="Finalizar compra" id="btns"></a>
            </div> 
            <div class="pags">
                <input type="radio" name="pags" id="boleto" checked >
                <input type="radio" name="pags" id="pix"            >
                <label for="boleto" class="boleto"> Boleto  </label>
                <label for="pix" class="pix">    Pix     </label>
            </div>
        </div>';
        ?>
        </section>
        <section class="mais">
            <p4>Produtos de seu interesse</p4>
            <div class="mais-cont">
                <div class="volta" ><img src="/Imagens_visual/r.png"></div>
                <div class="avanca"><img src="/Imagens_visual/r.png" alt=""></div>
                <div class="box_prods">
            <?php
                if ($result->num_rows == 0) {
                    echo "<h2>Nenhum produto corresponde à pesquisa. Tente outra pesquisa.</h2>";
                } else {
                    while ($dados = $result->fetch_assoc()) {
                        echo '
                <form action="/4 - Produto Individual/prod.php" method="post" class="box-mais">
                <label>
                <input type="hidden" value="'.$dados['id_prod'].'" name="id">
                        <div class="img"><img src="/imagens_prod/'.($dados['Img_prod']).'" alt=""></div>
                <div class="cont">
                        <div class="text"><div class="nome_prod">' . ($dados['nome_prod']) . '</div>
                        <div class="value">R$ ' . number_format($dados['valor_prod'], 2, ',', '.') . '</div></div>
                        <div class="esp">'.$dados['desc_prod_home'].'</div>
                    </div>
                <input type="submit">
                </label>
                </form>';
                }
            }
        }
                ?>
                </div>
                </div>
        </section>

        <div class="footer">
            <div class="cima">
            <div class="loja_desc">
                <div class="Dname">TechEase<p1>.</p1></div> 
             <div class="sets">
                <div class="Ddesc"><i>Conectando você ao futuro tecnológico!</i></div>
             </div>
            </div>
            <div class="shop">
                <div class="Sname">Compras</div>
             <div class="sets">
                <div class="acessorios">Acessorios</div>
                <div class="cadeiras">Cadeiras</div>
                <div class="computadores">Computadores</div>
                <div class="telas">Telas</div>
             </div>
            </div>
            <div class="link">
                <div class="Lname">Links</div>
             <div class="sets">
                <div class="contato">Contate-nos</div>
                <div class="videos">Nossos videos</div>
                <div class="designs">Designs</div>
                <div class="sobre">Sobre nós</div>
             </div>
            </div>
            <div class="notificacoes">
                <div class="Nname">Notificações</div>
             <div class="sets">
                <div class="Ndesc">Insira seu Email para receber notificações sobre nossos produtos e possiveis promoções.</div>
                    <div class="email">
                     <input type="email" placeholder="EMAIL" class="btnE">
                     <input type="submit" id="subm" value=">">
                    </div>
             </div>
            </div>
            </div><hr>
            <div class="baixo"> Copyright @ 2023 Direitos de imagem reservados pelos diretores<b>TechEase</b> </div>
        </div>

</body> 
<script src="car.js"></script>
</html>