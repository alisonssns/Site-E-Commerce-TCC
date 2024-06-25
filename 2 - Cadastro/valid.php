<?php 
include('../conexao.php'); /* Puxa o arquivo php que inicia conexão */
?>

<?php
$request = $_POST['request'];
if ($request == "Cadastro") {

    $sql = $ligacao->prepare("CALL usuario_crud ('" . $_POST["nome_user_sp"] . "','" . $_POST["email_user_sp"] . "','" . $_POST["senha_user_sp"] . "', @saida, @saida_rotulo)");
    $sql->execute();
    $sql->close();
    $result = $ligacao->query("SELECT @saida, @saida_rotulo");
    $row = $result->fetch_assoc();
    $saida = $row['@saida'];
    $saida_rotulo = $row['@saida_rotulo'];

    if ($saida_rotulo == 'OPS!') {
        $email = $_POST["email_user_sp"];
        $nome = $_POST["nome_user_sp"];
        $valid = "Not";
        header("Location: cadastro.php?email=" . urlencode($email) . "&nome=" . urlencode($nome) . "&valid=" . urlencode($valid));
        exit;
    } else {

        echo "
            <script>
            setTimeout(function() {
                window.location.href = '../3 - Home/home.php';
                });
            </script>";
    }
} else {
    $sql = $ligacao->prepare("CALL user_login ('" . $_POST["email_user_sp"] . "','" . $_POST["senha_user_sp"] . "', @saida, @saida_rotulo)");
    $sql->execute();
    $sql->close();
    $result = $ligacao->query("SELECT @saida, @saida_rotulo");
    $row = $result->fetch_assoc();
    $saida = $row['@saida'];
    $saida_rotulo = $row['@saida_rotulo'];

    if ($saida_rotulo == 'OPS!') {
        $email = $_POST["email_user_sp"];
        $senha = $_POST["senha_user_sp"];
        $valid = "Not";
        header("Location: login.php?email=" . urlencode($email) . "&senha=" . urlencode($senha) . "&valid=" . urlencode($valid));
        exit;
    } else {

        echo "
            <script>
            setTimeout(function() {
              window.location.href = '../3 - Home/home.php';
            });
          </script>";
    }
}

include('../nome.php');

?>