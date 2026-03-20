<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora de Subtração</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" class="conteudo">
        <input type="number" name="txtN1" placeholder="Digite o 1º valor">
        <input type="number" name="txtN2" placeholder="Digite o 2º valor">
        <input type="submit" name="btCalc" value="Calcular">
        <input type="submit" name="btLimpar" value="Limpar">
    </form>
    <?php

        if (isset($_POST["btCalc"])){
            $n1 = $_POST["txtN1"]==""? 0 : $_POST["txtN1"];
            $n2 = $_POST["txtN2"]==""? 0 : $_POST["txtN2"];
            
            if (($n1 < 0) || ($n2 < 0)){
                echo "<div class='conteudo'> O 1º número ou 2º número não pode ser negativo.</div>";
            }else{
                if ($n1 > $n2) {
                    $res = $n1 - $n2;
                    echo "<div class='conteudo'> O resultado é: $res</div>";
                }else{
                    $res = $n2 - $n1;
                    echo "<div class='conteudo'> O resultado é: $res</div>";
                }
            }
               
        }

        if (isset($_POST["btLimpar"])){

            echo "<div class='conteudo'></div>";
        }
    ?>
</body>
</html>