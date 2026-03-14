<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média Ponderada</title>
</head>
<body>
    <?php
     $nota1 = str_replace(",",".",$_POST["txtNota1"]);
     $peso1 = str_replace(",",".",$_POST["txtPeso1"]);
     $nota2 = str_replace(",",".",$_POST["txtNota2"]);
     $peso2 = str_replace(",",".",$_POST["txtPeso2"]);
     $nota3 = str_replace(",",".",$_POST["txtNota3"]);
     $peso3 = str_replace(",",".",$_POST["txtPeso3"]);

     $media = (($nota1*$peso1) + ($nota2*$peso2) + ($nota3*$peso3)) / ($peso1+$peso2+$peso3);
     
     //echo "A média ponderada é:" .$media;
     echo "<h1> A média ponderada é: ".number_format($media, 1, "," ,".")."</h1>";
     
     
    ?> 
</body>
</html>