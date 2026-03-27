<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuste de Saldo</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Sistema de Ajuste Bancário</h2>
        
        <form method="POST" action="">
            <label for="saldo">Informe o saldo atual (R$):</label>
            <input type="number" step="0.01" name="saldo" id="saldo" required>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $saldo = (float) $_POST['saldo'];
            
            echo "<hr>";
            echo "<div class='resultado'>";
            echo "<strong>Saldo inicial informado:</strong> R$ " . number_format($saldo, 2, ',', '.') . "<br><br>";

            if ($saldo < 100) { 
                $valor = 1000; 
                $saldo += $valor; 
                echo "<em>Ação: Bônus de R$ 1000 aplicado.</em><br>";
            } elseif ($saldo > 200) { 
                $saldo -= 100; 
                echo "<em>Ação: Taxa de R$ 100 debitada.</em><br>";
            } else { 
                $saldo -= 50; 
                echo "<em>Ação: Taxa de manutenção de R$ 50 debitada.</em><br>";
            }

            echo "<br><strong>Saldo final: R$ " . number_format($saldo, 2, ',', '.') . "</strong>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>