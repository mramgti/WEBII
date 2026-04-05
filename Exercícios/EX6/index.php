<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pirâmide de Asterisco</title>
</head>
<body>
    <form method="post">
        <input type="text" name="txtAltura">
        <input type="submit" value="Gerar" name="btGerar">
        <input type="submit" value="GerarInvertido" name="btGerarInvertido">
    </form>
    
    <?php
    // Verifica se o formulário foi enviado (ou seja, se o botão "btGerar" existe na requisição POST)
    if (isset($_POST["btGerar"])){
        
        // Pega o valor digitado no campo "txtAltura" e o armazena na variável $altura
        $altura = $_POST["txtAltura"];
        
        // Laço de repetição externo: controla em qual linha a pirâmide está.
        // Começa na linha 1 e vai até a linha que representa o número digitado ($altura).
        for($linha=1; $linha<=$altura; $linha++){
            
            // Laço de repetição interno: controla a quantidade de asteriscos impressos na linha atual.
            // O número de asteriscos impressos é sempre igual ao número da linha atual ($linha).
            for($coluna=1; $coluna<=$linha; $coluna++){
                echo "*"; // Imprime o asterisco na tela
            }
            
            // Após imprimir todos os asteriscos da linha atual, imprime uma quebra de linha HTML (<br>)
            // para que a próxima iteração comece na linha de baixo.
            echo "<br>";
        }
    }
    
    if (isset($_POST["btGerarInvertido"])){
        
        // Pega o valor digitado no campo "txtAltura" e o armazena na variável $altura
        $altura = $_POST["txtAltura"];
        
        // Laço de repetição externo: controla em qual linha a pirâmide está.
        // Começa na linha que representa o número digitado ($altura) e vai até a linha 1  
        for($linha=$altura; $linha>=1; $linha--){
            
            // Laço de repetição interno: controla a quantidade de asteriscos impressos na linha atual.
            // O número de asteriscos impressos é sempre igual ao número da linha atual ($linha).
            for($coluna=$linha; $coluna>=1; $coluna--){
                echo "*"; // Imprime o asterisco na tela
            }
            
            // Após imprimir todos os asteriscos da linha atual, imprime uma quebra de linha HTML (<br>)
            // para que a próxima iteração comece na linha de baixo.
            echo "<br>";
        }
        
    }
    ?>
</body>
</html>