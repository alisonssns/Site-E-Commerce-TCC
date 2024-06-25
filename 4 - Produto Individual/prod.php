<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prodds.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Produto</title>
    <link rel="icon"href="/Imagens_visual/logo-t.png">
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
        $servername = "127.0.0.1:3306";
        $username = "root";
        $password = "1234";
        $dbname = "loja";
        $id = $_POST ['id'];
        
        $conexao = new mysqli($servername, $username, $password, $dbname);
        
        if ($conexao->connect_error) {
            die("Falha na conexão: " . $conexao->connect_error);
        }
        $sql = "SELECT *FROM produto WHERE id_prod = '$id'";
        $result = $conexao->query($sql);

            $row = $result->fetch_assoc();
            $img = $row["Img_prod"];
            $nome = $row["nome_prod"];
            $preco = $row["valor_prod"];
            $descricao = $row ["desc_prod"];
            $esp = $row ["espec_prod"];
            $bonus = $preco*(17/100);  
            $val_plus = $preco+$bonus;  

echo'
    <section class="produtos" id="po">
        <div class="card">
            <div class="img" style="background-image: url(/imagens_prod/'.$img.');"></div>
        </div>
        <div class="card2">
            <div class="cardbox">

        <div class="nome">'.$nome.'</div>
        <div class="low">
        <P1><s>R$ '. number_format($val_plus, 2, ',', '.').'</s></P1>
        </div>
            <div class="box">
            <div class="preco">R$ '. number_format($preco, 2, ',', '.').'</div>
        
            <div class="fav">
                <div class="av">★★★★★</div><as>(192)</as>
            </div>

            </div>
            <hr>
            <div class="boxnew">
            <label class="desc" id="desc" for="descrição">Descrição do produto</label>
            <label class="esp" id="esp" for="especificações">Especificações </label>
            </div>
            <input type="radio" name="muda" id="descrição"      onchange="muda1()" checked>
            <input type="radio" name="muda" id="especificações" onchange="muda2()">
            <div class="text" id="t1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse congue tempus ultricies. Suspendisse potenti. Pellentesque et lectus congue, gravida nisl tempus, mollis orci. Nulla facilisi. Mauris venenatis, diam vitae facilisis hendrerit, lorem felis hendrerit sem, ac cursus sem quam quis leo. Morbi convallis sem eget lectus cursus, non fringilla tellus blandit. Morbi molestie, nibh sed facilisis tincidunt, justo eros condimentum est, quis finibus orci urna quis libero.

            Curabitur eget iaculis nisi. Sed tempus scelerisque nisi, id bibendum erat. Vestibulum et interdum erat. Pellentesque eleifend non justo non commodo. Nulla congue turpis odio, at vulputate elit fermentum sed. Nunc efficitur tristique posuere. Nullam eget orci at nulla aliquam vulputate. In finibus in nunc non varius. Aliquam consectetur massa sed vehicula tempor. Sed nisi orci, convallis id dignissim quis, cursus et lacus. Quisque rhoncus eros non eleifend imperdiet. Morbi sit amet tellus lobortis, efficitur dui a, vulputate odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nunc a turpis tellus. Cras consectetur finibus purus, feugiat egestas metus fringilla euismod.</div>
            <div class="text-s" id="t2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod urna ac dui iaculis, et commodo lectus facilisis. In quis sapien eu libero iaculis euismod. Duis turpis nibh, varius sed facilisis ac, elementum sit amet sem. Quisque at commodo metus. Aliquam varius dui eget enim fermentum hendrerit. Donec ut tempus tortor, at dignissim augue. Sed rutrum orci convallis nunc vulputate, vel vestibulum velit iaculis. Proin tristique, leo sit amet dignissim pharetra, augue sapien pulvinar lorem, sed aliquam libero nibh non arcu. Quisque tincidunt ut metus eget ultrices. Morbi eu nisi volutpat, iaculis diam scelerisque, efficitur metus. Vestibulum id imperdiet mi, vitae laoreet justo. Etiam sed tellus sed urna porttitor sollicitudin. Nullam ut ultricies dui, in imperdiet quam.</div>
        
            <form action="" method="" class="bx">
                <input type="number" id="qnt" placeholder="QNT">
                <a href="../8 - carrinho de compras/cart.php?add=carrinho&id='.$id.'" class="submit"> Adicionar ao carrinho </a>
            </form>
            </div>
        </div>';
?>
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

    <script src="prod.js"></script>
</body>
</html>