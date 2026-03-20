<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média</title>
</head>
<body>
    <?php
        if ((isset($_GET["txtNota1"]))&&
            (isset($_GET["txtNota2"]))&&
            (isset($_GET["txtNota3"]))) {
        
        // Se usasse empty:
        // if ((!empty($_GET["txtNota1"])) &&
        //     (!empty($_GET["txtNota2"])) && 
        //     (!empty($_GET["txtNota3"]))) {

        $n1 = $_GET["txtNota1"]==""? 0 : $_GET["txtNota1"]; 
        $n2 = $_GET["txtNota2"]==""? 0 : $_GET["txtNota2"]; 
        $n3 = $_GET["txtNota3"]==""? 0 : $_GET["txtNota3"]; 

        if (($n1<0)||($n1>10)||($n2<0)||($n2>10)||($n3<0)||($n3>10))
        {
            echo "Valor inválido";
            die;
        }
        
        $media = ($n1+$n2+$n3)/3;

        echo "<h1>A média do aluno é: ".number_format($media, 1, ',','.')."</h1>";
        if ($media >=6){
            echo "<h1>Aprovado! </h1>";
        }else{
            echo "<h1>Reprovado! </h1>";
        }
    }else{
        echo "Erro inesperado!";
    }
    ?>
</body>
</html>