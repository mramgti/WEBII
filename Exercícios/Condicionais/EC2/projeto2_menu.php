<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Preferências</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Portal de Conteúdo</h2>
        
        <form method="POST" action="">
            <label for="op">Escolha uma categoria:</label>
            <select name="op" id="op" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Esporte">Esporte</option>
                <option value="Notícias">Notícias</option>
                <option value="Tecnologia">Tecnologia</option>
            </select>
            <button type="submit">Acessar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $op = $_POST['op']; 
            
            echo "<hr>";
            echo "<div class='resultado'>";
            
            switch ($op) { 
                case "Esporte": 
                    echo "<strong>Você selecionou Esporte.</strong><br>"; 
                    echo "Carregando o painel de resultados dos jogos de hoje...";
                    break; 
                case "Notícias": 
                    echo "<strong>Você selecionou Notícias.</strong><br>"; 
                    echo "Carregando as principais manchetes do dia...";
                    break; 
                default: 
                    echo "<span class='alerta-erro'>Seleção não reconhecida.</span><br>"; 
                    echo "A categoria escolhida não possui conteúdo disponível.";
                    break; 
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>