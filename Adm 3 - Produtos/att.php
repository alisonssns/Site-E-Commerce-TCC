<?php
include ('../conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="altera.css">
</head>

<body>

<div class="header">        
<form action="">
    <input name="pesq" type="search" id="src" placeholder="Pesquisar..." required>
    <label>
    <input type="submit" value="" style="display:none;">
    <img src="/Imagens_visual/search.png">
    </label>
</form>
</div>
    <label for="abre" class="Abre-painel">Painel de controle</label>
    <input type="checkbox" name="" id="abre">
    <div class="painel">
        <div class="links-1">
            <a href="">Login Administrador</a>
            <a href="">Atualizar produtos</a>
            <a href="">Adicionar produtos</a>
        </div>
        <div class="links-2">
            <a href="">Visualizar Compras</a>
            <a href="">Gerenciar usuários</a>
            <a href="">FAQ de perguntas</a>
        </div>
    </div>
    <div class="produtos">
        <?php
        $pesquisa = isset($_GET['pesq']) ? $_GET['pesq'] : '';   
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
                    <div class="set">        
                    <div class="id">'.$dados['id_prod'].'</div>
                    <div class="infos">
                    <div class="img"><div class="foto" style="background-image: url(/imagens_prod/'.$dados['Img_prod'].');"></div></div>
                    <div class="nome">'.$dados['nome_prod'].'</div>
                    <div class="valor">R$ '.$dados['valor_prod'].'</div>
                        <div class="btns">
                    <div class="excluir">Excluir</div>
                    <hr>
                    <div class="atual">Editar</div>
                        </div>
                    </div>
                </div>';
    }
}
         $stmt->close();
    } 

    else {
    echo'ERRO!';}
    ?>
    </div>
</body>

</html>