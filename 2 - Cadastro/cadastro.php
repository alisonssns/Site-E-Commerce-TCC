<?php
$valid = isset($_GET["valid"]);
if ($valid == "Not") {
    $email = $_GET["email"];
    $nome = $_GET["nome"];
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
    if ($valid == "Not") {
        echo '<div class="popup">Aviso: email já cadastrado!</div>';
    }
    ?>
    
    <section>
        <div class="login"><!-- Formulário para login -->
            <div class="tit">CADASTRO</div> <!-- Título -->
            <form action="valid.php" method="post" class="pri">
                <input type="hidden" name="request" value="Cadastro">
                <div class="inputs">
                    <?php
                    if ($valid == "Not") {
                        echo '
                        <div class="nome">
                            <input type="text" name="nome_user_sp" placeholder="Nome" value="' . $nome . '">; <!-- Inserir nome -->
                            <div class="sobe">Nome</div>
                        </div>
                        <div class="email">
                            <input type="text" name="email_user_sp" id="rept" placeholder="E-mail" value="' . $email . '">
                            <!-- Inserir E-mail -->
                            <div class="sobe-3" id="srept">E-mail</div>
                        </div>';
                    } else {
                        echo '
                        <div class="nome">
                            <input type="text" name="nome_user_sp" placeholder="Nome">; <!-- Inserir nome -->
                            <div class="sobe">Nome</div>
                        </div>
                        <div class="email">
                            <input type="text" name="email_user_sp" placeholder="E-mail">
                            <!-- Inserir E-mail -->
                            <div class="sobe-3">E-mail</div>
                        </div>';
                    }
                    ;
                    ?>
                    <div class="senha">
                        <input type="password" name="senha_user_sp" placeholder="Senha">
                        <!-- Inserir Senha -->
                        <div class="sobe-2">Senha</div>
                    </div>
                </div>
                <div class="finl">
                    <input type="submit" value="CADASTRAR" id="sub"> <!-- Confirmar e realizar login -->
                </div>
            </form>
        </div>
                <div class="alter">
                    <a href="login.php" class="criar">Já possui conta?</a>
                </div>
    </section>
</body>

</html>