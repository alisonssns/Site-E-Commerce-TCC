<?php
    $ligacao = mysqli_connect("127.0.0.1:3306", "root","1234","aluga_armario_4a");
		if (!$ligacao) ( die("Conexão falhou:" . mysqli_connect_error()));   

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            position: absolute;
            inset: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .table{
            display: flex;
            flex-direction: column;
            width: 600px;
            border: 1px solid black;
        }

        .info{
            display: flex;
            flex-direction: row;
            width: 100%;
        }
        
        .armario,.aluno{
            background-color: black;
            color: white;
            font-weight: bold;
            border: 1px solid rgba(255, 255, 255, 0.151);
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rows{
            display: flex;
            flex-direction: row;
            width: 100%;
            height:40px;
        }

        .amar, .alun{
            display:flex;
            flex-direction:row;
            width:50%;
        }

        .cod, .cor, .andar{
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 33.3333%;
            border: 1px solid black;
        }

        .nome,.serie{
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            border: 1px solid black;
        }

        .info-extra{
            display: flex;
            flex-direction: row;
            width: 100%;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="table">
        <div class="info">
            <div class="Armario">Armario</div>
            <div class="Aluno">Aluno</div>
        </div>
    <?php
    $sql_code = "SELECT * FROM armario, aluno where id_aluno=aluno.id";
    $stmt = $ligacao->prepare($sql_code);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<h2>Nenhum produto corresponde à pesquisa. Tente outra pesquisa.</h2>";
        } else {
            while ($dados = $result->fetch_assoc()) {
                echo '
                    <div class="rows">
                        <div class="amar">
                            <div class="cod">'.$dados['codigo'].'</div>
                            <div class="cor">'.$dados['cor'].'</div>
                            <div class="andar">'.$dados['andar'].'</div>
                        </div>
                        <div class="alun">
                            <div class="nome">'.$dados['nome'].'</div>
                            <div class="serie">'.$dados['cgm'].'</div>
                        </div>
                    </div>';
            }
        }
        $stmt->close();
    }
    ?>
    <div class="info-extra">
        <div class="amar">
            <div class="cod">Codigo</div>
            <div class="cor">Cor</div>
            <div class="andar">Andar</div>
        </div>
        <div class="alun">
            <div class="nome">Nome</div>
            <div class="serie">Serie</div>
        </div>
    </div>
    </div>
</body>
</html>