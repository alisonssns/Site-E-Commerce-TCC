
<?php
    include ('../conexao.php'); /* Puxa o arquivo php que inicia conexão */
    session_start();
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pagina inicial</title>
<link rel="icon"href="/Imagens_visual/logo-t.png">
<link rel="stylesheet" href="homess.css">
</head>

<body>
<div class="header"> <!-- Cabeçario da página -->
    <div class="infos">
    <a href="/3 - Home/home.php" class="logo">TechEase</a>  
        
<form action=""> <!-- Formulário para barra de pesquisa -->
    <input name="pesq" type="search" id="src" placeholder="Pesquisar..." required> <!-- Barra de pesquisa -->
    <label> <!-- Tag que ativa o input ao clicar em qualquer elemento dentro da label -->
    <input type="submit" value="" style="display:none;"> <!-- Input escondido -->
    <img src="/Imagens_visual/search.png">
    </label> <!-- Botão para confirmar a pesquisa -->
</form>
        <div class="icons"><!-- Caixa com o menu e icone do carrinho -->
    <div class="icon">
        <a href="/3 - Home/home.php" class="home"><img src="/imagens_visual/home.png"></a>
        <a href="/8 - carrinho de compras/cart.php" class="cart"> <!-- Botão que leva ao carrinho de compras -->
            <img src="/Imagens_visual/cart.png" alt=""><div class="sup">+3</div>
        </a>
        <label class="menu-btn" for="abre"><img src="/Imagens_visual/menu.png"></label> <!-- Botão ativa o input para abrir o menu -->
    </div>
            <input type="checkbox" id="abre"> <!-- Input escondido que abre o menu quando ativado -->
             <div class="content"> <!-- Caixa do menu -->

                <div class="rows">

                    <a href="/5 - Pagina Usuario/user.php" class="row" id="p"> <!-- Botão que te leva a pagina de usuário -->
                        <div class="img"><img src="/imagens_prod/user.png">
                    </div>Editar Perfil</a>

                    <a href="/10 - Sobre nós/sobre.html" class="row" id="p">    <!-- Botão que te leva a página sobre os criadores -->
                        <div class="img"><img src="/imagens_prod/info.png">
                    </div>Sobre nós</a>

                    <a href="/6 - FAQ/faq.html" class="row" id="p">
                        <div class="img"><img src="/imagens_prod/help.png">     <!-- Botão que te leva a página do FAQ -->
                    </div>Ajuda e suporte</a>

                    <a href="/close.php" class="row">
                        <div class="img"><img src="/imagens_prod/power.png" alt=""> <!-- Fecha a sessão do usuário atual -->
                    </div>Sair</a>
                </div>

             </div>
    </div>
</div>
    </div>
    <div class="f-header"> <!-- Caixa abaixo do cabeçalho com imagem -->
        <div class="content">
<div class="left">
        <div class="text">Seja bem vindo <u><?php echo $_SESSION['p_nome']; ?></u> que tal conhecer mais sobre nossa loja e nossos  produtos?</div>
</div>        
        <div class="img"><img src="/Imagens_visual/phone.png"></div> <!-- Imagem escolhida -->
    </div>
    </div>

    <div class="categorias">
<div class="cats"> <!-- Caixa de categorias a serem escolhidas -->
<!-- Opção de categoria --><label><form action="" class="consoles">        Dispositivos        <input type="hidden" name="pesq" value="Dispositivo">   <input type="submit"></form></label> 
<!-- Opção de categoria --><label><form action="" class="monitores">       Monitores           <input type="hidden" name="pesq" value="Monitor">       <input type="submit"></form></label>
<!-- Opção de categoria --><label><form action="" class="acessorio">       Acessórios          <input type="hidden" name="pesq" value="Acessorio">     <input type="submit"></form></label>
<!-- Opção de categoria --><label><form action="" class="hardwares">       Hardwares           <input type="hidden" name="pesq" value="Hardware">      <input type="submit"></form></label>
</div>

<form action="" id="ordem-form"> <!-- Formulário para escolher um tipo de ordem dos produtos -->
<select name="ordem" id="ordem" class="ordem">
        <option value="" disabled selected> Ordenar por </option> <!-- Nome principal -->
        <option value="valor_prod desc">    Maior valor </option> <!-- Opção de ordem -->
        <option value="valor_prod asc">     Menor valor </option> <!-- Opção de ordem -->
        <option value="id_prod desc">       Recentes    </option> <!-- Opção de ordem -->
</select>
<input type="submit" value="" class="submit" style="display:none;">
</form>
    </div>

    <div class="boxes"> <!-- Caixa que contêm os produtos -->

    <?php
$ordem = isset($_GET['ordem']) ? $ligacao->real_escape_string($_GET['ordem']) : '';
$pesquisa = isset($_GET['pesq']) ? $_GET['pesq'] : '';
$sql_code = "SELECT * FROM produto WHERE nome_prod LIKE ? OR cat_prod LIKE ? ORDER BY $ordem";
$stmt = $ligacao->prepare($sql_code);

if ($stmt) {
    $param = "%$pesquisa%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<h2>Nenhum produto corresponde à pesquisa. Tente outra pesquisa.</h2>";
    } else {
        while ($dados = $result->fetch_assoc()) {
            echo '
            <label class="box">
                <form action="/4 - Produto Individual/prod.php" method="post">
                <input type="hidden" value="'.$dados['id_prod'].'" name="id"> 
                <div class="img">
                <img src="/imagens_prod/'.($dados['Img_prod']).'" alt="">
                </div>
                <div class="cont">
                    <div class="text">
                        <div class="nome_prod">' . ($dados['nome_prod']) . '</div>
                        <div class="value">R$ ' . number_format($dados['valor_prod'], 2, ',', '.') . '</div>
                        <f1>Frete grátis</f1>
                    </div>
                    
                    <div class="esp">'.$dados['desc_prod_home'].'</div>
                    <input type="submit" style="display: none;">
                </div>
                </form>
            </label>';
        }
    }
    $stmt->close();
} 

else {

$sql_code = "SELECT * FROM produto WHERE nome_prod LIKE ? OR cat_prod LIKE ?";
$stmt = $ligacao->prepare($sql_code);

if ($stmt) {
    $param = "%$pesquisa%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<h2>Nenhum produto corresponde à pesquisa. Tente outra pesquisa.</h2>";
    } else {
        while ($dados = $result->fetch_assoc()) {
            echo '
            <label class="box">
            <form action="/4 - Produto Individual/prod.php" method="post">
            <input type="hidden" value="'.$dados['id_prod'].'" name="id"> 
            <div class="img">
            <img src="/imagens_prod/'.($dados['Img_prod']).'" alt="">
            </div>
            <div class="cont">
                <div class="text">
                    <div class="nome_prod">' . ($dados['nome_prod']) . '</div>
                    <div class="value">R$ ' . number_format($dados['valor_prod'], 2, ',', '.') . '</div>
                    <f1>Frete grátis</f1>
                </div>
                
                <div class="esp">'.$dados['desc_prod_home'].'</div>
                <input type="submit" style="display: none;">
            </div>
            </form>
        </label>';
            }
        }
    }
}
?>



</div>
    <div class="footer"> <!-- Rodapé -->
        <div class="cima"> <!-- Parte de cima do rodapé -->
        <div class="loja_desc">
            <div class="Dname">TechEase<p1>.</p1></div> 
         <div class="sets">
            <div class="Ddesc"><i>Conectando você ao futuro tecnológico!</i></div>
         </div>
        </div>
        <div class="shop">
            <div class="Sname">Compras</div>
         <div class="sets">
            <div class="acessorios">Acessórios</div>
            <div class="cadeiras">Cadeiras</div>
            <div class="computadores">Computadores</div>
            <div class="telas">Hardwares</div>
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
    <script src="home.js"></script>
</body>
</html>