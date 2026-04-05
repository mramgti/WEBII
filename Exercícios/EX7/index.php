<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palíndromo</title>
    <link rel= stylesheet href= style.css>
</head>
<body>
<div class="conteudo">
    <form method="post">
        <input type="text" name="txtFrase">
        <input type="submit" value="Verificar" name= "btVerif">
    </form>
    <br>
    <?php
        if (isset($_POST["btVerif"])){
            $frase = str_replace(" ","",strtoupper($_POST["txtFrase"]));
            //strtoupper - converte tudo para maiúsculo.
            //str_replace - substitui um caractere por outro ex: espaços em branco por vazio.
            $fraseInv = "";
            $original = $_POST["txtFrase"];

            for($i = strlen($frase)-1; $i >= 0; $i--){
                $fraseInv = $fraseInv.$frase[$i]; //a variavel recebe a concatenação das letras uma por uma.
                //$fraseInv .= $frase[$i];
            }   

            if ($frase == $fraseInv){
                echo "<p>A palavra \"$original\" é um palíndromo, pois gerou: $fraseInv</p>";
            }else{
                echo "<p>A palavra \"$original\" não é um palíndromo, pois gerou: $fraseInv</p>";
            }
        } 
    ?>
    </div>
</body>
</html>