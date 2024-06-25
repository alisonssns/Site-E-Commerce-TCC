<?php
include('../conexao.php');
include('../dados.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" content="width=, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="icon" href="/Imagens_visual/logo-t.png">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="header" id="header">
        <div class="infos">
            <a href="/3 - Home/home.php" class="logo">TechEase</a>

            <form action="/3 - Home/home.php">
                <input name="pesq" type="search" id="src" placeholder="Pesquisar..." required>
                <label><input type="submit" value="" style="display:none;"><img
                        src="/Imagens_visual/search.png"></label>
            </form>
            <div class="icons">
                <div class="icon">
                    <a href="/3 - Home/home.php" class="home"><img src="/imagens_visual/home.png"></a>
                    <a href="/8 - carrinho de compras/cart.php" class="cart">
                        <!-- Botão que leva ao carrinho de compras -->
                        <img src="/Imagens_visual/cart.png" alt="">
                        <div class="sup">+3</div>
                    </a>
                    <label class="menu-btn" for="abre"><img src="/Imagens_visual/menu.png"></label>
                    <!-- Botão ativa o input para abrir o menu -->
                </div>
                <input type="checkbox" id="abre">
                <div class="content">
                    <div class="rows">
                        <a href="/5 - Pagina Usuario/user.html" class="row" id="p">
                            <div class="img"><img src="/imagens_prod/user.png" alt=""></div> Editar Perfil
                        </a>
                        <a href="/10 - Sobre nós/sobre.html" class="row" id="p">
                            <div class="img"> <img src="/imagens_prod/info.png" alt=""></div> Sobre nós
                        </a>
                        <a href="/6 - FAQ/faq.html" class="row" id="p">
                            <div class="img"> <img src="/imagens_prod/help.png" alt=""></div> Ajuda e suporte
                        </a>
                        <div href="" class="row">
                            <div class="img"> <img src="/imagens_prod/power.png" alt=""></div>Sair
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="corpo" id="corpo">
        <section class="left">
            <div class="foto"></div>
            <div class="nome"><?php echo $nome; ?></div>
            <div class="hovers">
                <label for="conta" class="conta" id="btn1">Conta </label>
                <label for="seg" class="seg" id="btn2">Segurança</label>
                <label for="end" class="end" id="btn3">Endereço </label>
                <label for="ped" class="ped" id="btn4">Pedidos </label>
            </div>
        </section>
        <section class="right">

            <input type="radio" name="trocas" id="conta" checked>
            <input type="radio" name="trocas" id="seg">
            <input type="radio" name="trocas" id="end">
            <input type="radio" name="trocas" id="ped">

            <div class="cont-1">

                <div class="dados">Dados do usuario</div>
                <div class="sets">
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p1>Usuário</p1>
                            <p2><?php echo $nome; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden"
                                value="Nome de usuário" name="value"><input type="submit">
                        </form>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set">
                            <p1>E-mail</p1>
                            <p2><?php echo $email; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden"
                                value="E-Mail" name="value"><input type="submit">
                        </form>
                    </label>
                </div>

                <div class="sets">
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p1>Nome completo</p1>
                            <p2><?php echo $nomeComp; ?></p2><img src="/Imagens_visual/troca.png"><input
                                type="hidden" value="Nome Completo" name="value"><input type="submit">
                        </form>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p1>Apelido</p1>
                            <p2><?php echo $apelido; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden" value="Apelido"
                                name="value"><input type="submit">
                        </form>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p1>Documento</p1>
                            <p2><?php echo $cpf; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden" value="CPF"
                                name="value"><input type="submit">
                        </form>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set">
                            <p1>Telefone</p1>
                            <p2><?php echo $tel; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden"
                                value="Telefone" name="value"><input type="submit">
                        </form>
                    </label>
                </div>
            </div>
            <div class="cont-2">
                <div class="dados">Segurança</div>
                <div class="sets">
                    <a href="/6 - FAQ/faq.html" class="faq">
                        <cont>
                            <Box>Perguntas frequentes (FAQ)</Box><img src="/Imagens_visual/r.png" id="r">
                        </cont>
                    </a>
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p1>E-mail</p1>
                            <p2><?php echo $email; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden"
                                value="E-Mail" name="value"><input type="submit">
                        </form>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p1>Senha</p1>
                            <p2 class="senha"><?php echo $senha; ?></p2><img src="/Imagens_visual/troca.png"><input type="hidden" value="Senha"
                                name="value"><input type="submit">
                        </form>
                    </label>
                    <label for="cont-abre">
                        <div class="set" id="b">
                            <p3>Contato do suporte</p3><img src="/Imagens_visual/r.png" id="r">
                        </div>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set" id="b">
                            <p3>Recuperação de conta</p3><img src="/Imagens_visual/r.png" id="r"><input type="submit">
                        </form>
                    </label>
                    <label>
                        <form action="update.php" method="post" class="set">
                            <p3>Solicitar exclusão de conta</p3><img src="/Imagens_visual/r.png" id="r"><input
                                type="submit">
                        </form>
                    </label>

                </div>
            </div>
            <div class="cont-3">

                <div class="dados">Informações de Endereço</div>

                <div class="sets">
                    <div class="rows">
                        <div class="row">
                            <input type="text" placeholder="Nome completo" id="i1" value="Mirilia Morais dos Santos">
                            <input type="number" placeholder="CEP" id="i2" value="83503405">
                        </div>

                        <div class="row">
                            <input type="text" placeholder="Estado" id="i3" value="Paraná">
                            <input type="text" placeholder="Cidade" id="i3" value="Curitiba">
                        </div>

                        <div class="row">
                            <input type="text" placeholder="Bairro" id="i3" value="Jardim Morteu">
                            <input type="text" placeholder="Rua/Avenida" id="i3" value="Rua das flores">
                        </div>
                        <div class="row">


                            <input type="text" placeholder="Complemento" id="i1" value="Apartamento 13">
                            <input type="number" placeholder="Número" id="i2" value="220">
                        </div>

                        <div class="row">
                            <div class="radios">
                                <input type="radio" name="lugar" id="casa" checked>
                                <input type="radio" name="lugar" id="trab">
                                <label class="casa" for="casa">Casa</label>
                                <label class="trab" for="trab">Trabalho</label>
                            </div>
                            <input type="number" placeholder="Telefone de contato" id="i2" value="41996950185">
                        </div>

                    </div>
                </div>

            </div>

            <div class="cont-4">
                <div class="prods">
                    <div class="p_set">
                        <div class="P_row">
                            <div class="row1">
                                <p1>7 de dezembro de 2021</p1>
                            </div>
                            <div class="rowf">
                                <foto></foto>
                                <div class="infos">
                                    <div class="info_e" id="pago">Pago</div>
                                    <div class="info_d">Pagamento realizado em 8 de dezembro</div>
                                </div>
                                <div class="infos_2">
                                    <div class="n_i">
                                        <div class="box">
                                            <p1>Computador Gamer</p1>
                                            <p2>1 unidade</p2>
                                        </div>
                                    </div>
                                    <div class="valor">R$ 1121,99</div>
                                </div>
                            </div>
                            <div class="rowf">
                                <foto></foto>
                                <div class="infos">
                                    <div class="info_e" id="pago">Pago</div>
                                    <div class="info_d">Pagamento realizado em 8 de dezembro</div>
                                </div>
                                <div class="infos_2">
                                    <div class="n_i">
                                        <div class="box">
                                            <p1>Computador Gamer</p1>
                                            <p2>1 unidade</p2>
                                        </div>
                                    </div>
                                    <div class="valor">R$ 1121,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="P_row">
                            <div class="row1">
                                <p1>7 de dezembro de 2021</p1>
                            </div>
                            <div class="rowf">
                                <foto></foto>
                                <div class="infos">
                                    <div class="info_e" id="pago">Pago</div>
                                    <div class="info_d">Pagamento realizado em 8 de dezembro</div>
                                </div>
                                <div class="infos_2">
                                    <div class="n_i">
                                        <div class="box">
                                            <p1>Computador Gamer</p1>
                                            <p2>1 unidade</p2>
                                        </div>
                                    </div>
                                    <div class="valor">R$ 1121,99</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </section>
    </div>
    <div class="footer" id="footer">
        <div class="cima">
            <div class="loja_desc">
                <div class="Dname">TechEase<p1>.</p1>
                </div>
                <div class="sets-footer">
                    <div class="Ddesc"><i>Conectando você ao futuro tecnológico!</i></div>
                </div>
            </div>
            <div class="shop">
                <div class="Sname">Compras</div>
                <div class="sets-footer">
                    <div class="acessorios">Acessorios</div>
                    <div class="cadeiras">Cadeiras</div>
                    <div class="computadores">Computadores</div>
                    <div class="telas">Telas</div>
                </div>
            </div>
            <div class="link">
                <div class="Lname">Links</div>
                <div class="sets-footer">
                    <div class="contato">Contate-nos</div>
                    <div class="videos">Nossos videos</div>
                    <div class="designs">Designs</div>
                    <div class="sobre">Sobre nós</div>
                </div>
            </div>
            <div class="notificacoes">
                <div class="Nname">Notificações</div>
                <div class="sets-footer">
                    <div class="Ndesc">Insira seu Email para receber notificações sobre nossos produtos e possiveis
                        promoções.</div>
                    <div class="email">
                        <input type="email" placeholder="EMAIL" class="btnE">
                        <input type="submit" id="subm" value=">">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="baixo"> Copyright @ 2023 Direitos de imagem reservados pelos diretores<b>TechEase</b> </div>
    </div>

</body>
<input type="checkbox" id="cont-abre" onchange="applyblur()">
<div class="contato-box">
    <label for="cont-abre" class="fecha"></label>
    <input type="text" name="" id="" placeholder="Nome">
    <input type="email" name="" id="" placeholder="Email">
    <textarea name="" id="" cols="30" rows="10" placeholder="Escreva sua mensagem..."></textarea>
    <input type="submit" value="Enviar">
</div>
<script src="use.js"></script>

</html>