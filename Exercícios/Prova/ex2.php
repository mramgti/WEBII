<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex2 - Prova</title>
    <link rel=stylesheet href=style.css>
</head>

<body>
    <div class="conteudo">
        <form method="post">
            <input type="text" name="txtAno" placeholder="Digite o Ano">
            <input type="submit" value="Verificar" name="btVerif">
        </form>
        <br>
        <?php
        if (isset($_POST["btVerif"])) {
            $ano = $_POST["txtAno"];

            if (($ano % 4 == 0) && ($ano % 100 != 0)) {
                echo "<p>O ano $ano é bissexto</p>";
            } elseif (($ano % 100 == 0) && ($ano % 400 == 0)) {
                echo "<p>O ano $ano é bissexto</p>";
            } else {
                echo "<p>O ano $ano não é bissexto</p>";
            }
        }

        ?>
    </div>
</body>

</html>