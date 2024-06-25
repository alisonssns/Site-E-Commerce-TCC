<?php
$valid = isset($_GET["valid"]);
if ($valid == "Not"){
$email = $_GET["email"];
$senha = $_GET["senha"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign</title>
    <link rel="stylesheet" href="cadastros.css">
</head>

<body>
    <video src="/imagens_visual/vid.mp4" autoplay loop muted></video> <!-- Video no fundo da página -->
    <?php
if ($valid == "Not"){
    echo'<div class="popup">Aviso: email ou senha incorretos!</div>';
}
?>

    <section>
        <div class="login"><!-- Formulário para login -->
            <div class="tit">LOGIN</div> <!-- Título -->
            <form action="valid.php" method="post" class="pri">
                <input type="hidden" name="request" value="login">
                <div class="inputsl">
                    <?php
                    if($valid == "Not"){
                        echo'
                        <div class="email">
                            <input type="text" name="email_user_sp" id="rept" placeholder="E-mail" value="'.$email.'">
                            <!-- Inserir E-mail -->
                            <div class="sobe" id="srept">E-mail</div>
                        </div>
                        <div class="senha"><input type="password" name="senha_user_sp" id="rept" placeholder="Senha">
                            <!-- Inserir senha -->
                            <div class="sobe-2" id="srept">Senha</div>
                        </div>';
                    }else{
                        echo'
                        <div class="email">
                            <input type="text" name="email_user_sp" id="email" placeholder="E-mail">
                            <!-- Inserir E-mail -->
                            <div class="sobe">E-mail</div>
                        </div>
                        <div class="senha"><input type="password" name="senha_user_sp" id="senha" placeholder="Senha">
                            <!-- Inserir senha -->
                            <div class="sobe-2">Senha</div>
                        </div>';
                    };
                    ?>
                </div>
                <div class="finl">
                    <input type="submit" value="ENTRAR" id="sub"> <!-- Confirmar e realizar login -->
                </div>
            </form>
            </div>
                <div class="alter">
                    <a href="cadastro.php" class="criar">Não possui conta?</a>
                </div>
    </section>
</body>

</html>