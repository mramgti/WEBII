<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento de Veículos</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Painel do Veículo</h2>
        
        <form method="POST" action="">
            <label for="combustivel">Nível de combustível (Litros):</label>
            <input type="number" step="0.1" name="combustivel" id="combustivel" required>
            <button type="submit">Verificar Painel</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $combustivel = (float) $_POST['combustivel'];
            
            echo "<hr>";
            echo "<div class='resultado'>";
            
            // Operador ternário para exibir a mensagem
            $mensagem = $combustivel <= 1 ? "Encha o tanque agora" : "Há combustível suficiente"; 
            echo "Aviso: <strong>" . $mensagem . "</strong><br><br>";
            
            // Operador ternário para o controle lógico (booleano)
            $suficiente = $combustivel <= 1 ? FALSE : TRUE; 
            
            if (!$suficiente) {
                echo "<span class='alerta-erro'>Atenção: A ignição foi bloqueada por segurança.</span>";
            } else {
                echo "<span class='alerta-sucesso'>O veículo está liberado para viagem.</span>";
            }
            
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>