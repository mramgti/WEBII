<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe o maior e menor valor</title>
</head>
<body>
    <form method="post">
        <input type="number" name="txtN1" placeholder="Digite o 1º número">
        <input type="number" name="txtN2" placeholder="Digite o 2º número">
        <input type="number" name="txtN3" placeholder="Digite o 3º número">
        <input type="submit" name="btInf" value="Informar">
    </form>

    <?php
        if (isset($_POST["btInf"])){
            $n1 = $_POST["txtN1"]==""? 0 : $_POST["txtN1"];
            $n2 = $_POST["txtN2"]==""? 0 : $_POST["txtN2"];
            $n3 = $_POST["txtN3"]==""? 0 : $_POST["txtN3"];

            if (($n1 > $n2) && ($n1 > $n3)){
                $primeiro_maior = $n1;}
            elseif (($n2 > $n1) && ($n2 > $n3)){
                $primeiro_maior = $n2;}
            elseif (($n3 > $n1) && ($n3 > $n2)){
                $primeiro_maior = $n3;}
              if (($primeiro_maior == $n1) && ($n2 > $n3)){
                $segundo_maior = $n2;
                $menor = $n3;}
              if (($primeiro_maior == $n1) && ($n3 > $n2)){
                $segundo_maior = $n3;
                $menor = $n2;}
              if (($primeiro_maior == $n2) && ($n1 > $n3)){
                $segundo_maior = $n1;
                $menor = $n3;}
              if (($primeiro_maior == $n2) && ($n3 > $n1)){
                $segundo_maior = $n3;
                $menor = $n1;}
              if (($primeiro_maior == $n3) && ($n1 > $n2)){
                $segundo_maior = $n1;
                $menor = $n2;}
              if (($primeiro_maior == $n3) && ($n2 > $n1)){
                $segundo_maior = $n2;
                $menor = $n1;}

                echo "<div> O menor número é: $menor <br> 
                O primeiro maior número é: $primeiro_maior <br>
                O segundo maior número é: $segundo_maior</div>";
    }      
            
    ?>
</body>
</html>