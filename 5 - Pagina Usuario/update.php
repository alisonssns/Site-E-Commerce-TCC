<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="updates.css">
</head>
<body>
    <div class="header">
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
                        <a href="/5 - Pagina Usuario/user.html" class="row" id="p"><div class="img"><img src="/imagens_prod/user.png" alt=""></div>      Editar Perfil</a>
                        <a href="/10 - Sobre nós/sobre.html" class="row" id="p"><div class="img"><img src="/imagens_prod/info.png" alt=""></div>         Sobre nós</a>
                        <a href="/6 - FAQ/faq.html" class="row" id="p"><div class="img"><img src="/imagens_prod/help.png" alt=""></div>                  Ajuda e suporte</a>
                        <div href="" class="row">       <div class="img"><img src="/imagens_prod/power.png" alt=""></div>  Sair</div>
                    </div>
                 </div>
        </div>
    </div>
        </div>

<?php
$value = $_POST['value'];
echo'
<div class="content">
    <div class="infos">
        <t1>Alterar '.$value.'</t1>
    <div class="inputs">
        <input type="text" name="" id="" placeholder="'.$value.'">
        <input type="text" name="" id="" placeholder="Confirmar '.$value.'">
    </div>
    <input type="submit" value="Alterar" id="submit">
    </div>
</div>';
?>

<div class="footer">
    <div class="cimaF">
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
</html>