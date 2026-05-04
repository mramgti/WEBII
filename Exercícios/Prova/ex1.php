<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex1 - Prova</title>
    <link rel= stylesheet href= style.css>
</head>

<body>
    <div class="conteudo">
        <form method="post">
            <input type="text" name="txtNum" placeholder="Digite um nº inteiro positivo">
            <input type="submit" value="Calcular" name="btCalc">
        </form>
        <br>
        <?php
        if (isset($_POST["btCalc"])) {
            $soma = 0;
            $n1 = $_POST["txtNum"];
            if ($n1 >= 0) {
                for ($i = strlen($n1) - 1; $i >= 0; $i--) {
                    $soma = $soma + $n1[$i];
                }
                echo "<p>A soma dos dígitos do número $n1 é: $soma</p>";
            }else{
                echo "<p>Número inválido.</p>";
            }
        }

        ?>
    </div>
</body>

</html>