<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $componentes = ["HD", "Memória RAM", "Placa de Vídeo", "Placa Mãe", "Fonte", "Processador"];

    //echo "<pre>";         //exibe o texto pre-formatado exatamente como no código fonte
    print_r($componentes); //mostra o array no formato chave-valor
    //echo "</pre>";
    
    echo $componentes[3];
    

    foreach ($componentes as $pecas) {
        echo "$pecas<br>";
    }

    $carros = array(["Marca" => "Fiat", "Modelo" => "Uno", "Ano" => "2020"], ["Marca" => "Ford", "Modelo" => "Ka", "Ano" => ["2020", "2021"]]);
    echo $carros[0]["Marca"],' ',$carros[0]["Ano"],' ---- ',$carros[1]["Marca"],' ',$carros[1]["Ano"][1];
    foreach ($carros as $carro) {
        foreach ($carro as $k => $item) {
            if (is_array($item)) {
                echo "<p>$k: {$item[0]}</p>";
            } else {
                echo "<p>$k: {$item}</p>";
            }
        }
    }
    ?>


</body>

</html>