<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos</title>
</head>
<body>
    <form method="post">
        <input type="number" name="txtNum" value="<?php echo isset($_POST["txtNum"]) ? $_POST["txtNum"] : "" ?>" 
            placeholder="Digite um número" required>
        <input type="submit" name= "btVerif" value="Verificar">
    </form>
    <?php
    if (isset($_POST["btVerif"])){
        // Força o valor a ser um número inteiro por segurança
        $num = (int)$_POST["txtNum"]; 
        $ehPrimo = true; // Mudamos o nome da variável para ficar mais claro

        // 1ª Regra: 0, 1 e números negativos não são primos
        if ($num <= 1) {
            $ehPrimo = false;
        } 
        // 2 é o único número par que é primo
        elseif ($num == 2) {
            $ehPrimo = true;
        } 
        // Qualquer outro número par não é primo (economiza testes)
        elseif ($num % 2 == 0) {
            $ehPrimo = false;
        } 
        // Se passou por tudo acima, testamos os ímpares até a raiz quadrada
        else {
            $limite = sqrt($num); // Calcula a raiz quadrada do número
            
            // O laço começa no 3 e pula de 2 em 2 ($i += 2), testando só ímpares
            for ($i = 3; $i <= $limite; $i += 2) {
                if ($num % $i == 0) {
                    $ehPrimo = false; // Achou um divisor, não é primo
                    break;            // Para o laço
                }
            }
        }

        // Exibe o resultado na tela
        if ($ehPrimo){
            echo "<p>O número <strong>$num</strong> é primo.</p>";
        } else {
            echo "<p>O número <strong>$num</strong> não é primo.</p>";
        }
    } 
?>

</body>
</html>