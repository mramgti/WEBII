<?php
// BLOCO 1: INICIALIZAÇÃO DA SESSÃO
// Esta função é obrigatória e DEVE ser a primeira coisa no código, antes de qualquer HTML.
// Ela avisa ao PHP: "Ei, procure uma sessão existente para este usuário. Se não achar, crie uma nova".
session_start();

// Verificamos se o "compartimento" chamado "cadastro" já existe dentro da nossa sessão.
// A função isset() verifica se a variável foi "setada" (configurada/existe).
// O sinal "!" inverte a lógica: "Se NÃO existir a sessão cadastro..."
if (!isset($_SESSION["cadastro"])) {
    // Se não existir, nós a criamos como um Array (Vetor) vazio.
    // Isso é crucial para podermos adicionar os dados do formulário nela depois sem dar erro.
    $_SESSION["cadastro"] = array();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão e vetor</title>
</head>

<body>
    <form method="post">
        <input type="text" name="txtNome" placeholder="Digite o seu nome"><br>
        <input type="text" name="txtTelefone" placeholder="Digite o seu telefone"><br>
        <input type="text" name="txtIdade" placeholder="Digite a sua idade"><br>

        <input type="submit" value="Salvar" name="btSalvar">
    </form>

    <?php
    // BLOCO 3: PROCESSAMENTO DOS DADOS ENVIADOS
    if (isset($_POST["btSalvar"])) {

        $nome = trim($_POST["txtNome"]);
        $telefone = trim($_POST["txtTelefone"]);
        $idade = trim($_POST["txtIdade"]);


        if (empty($nome) || empty($telefone) || empty($idade)) {

            // Cria a mensagem de erro e pula todo o resto do código
            $_SESSION["erro"] = "Por favor, preencha todos os campos antes de salvar!";
        } else {

            // 1. Criamos a "bandeira" (flag) assumindo que não é duplicado
            $duplicado = false;

            // 2. Verificamos se já existe algo na sessão para podermos pesquisar
            if (isset($_SESSION["cadastro"])) {
                foreach ($_SESSION["cadastro"] as $item) {
                    // Se o nome, telefone e idade forem IGUAIS aos que vieram do formulário...
                    if ($item["nome"] == $nome && $item["telefone"] == $telefone && $item["idade"] == $idade) {
                        $duplicado = true; // Opa! Achamos um igual.
                        break; // Para o laço imediatamente, pois não precisa procurar mais.
                    }
                }
            }

            // 3. Só salva se NÃO for duplicado
            if (!$duplicado) {
                $_SESSION["cadastro"][] = [
                    "nome" => $nome,
                    "telefone" => $telefone,
                    "idade" => $idade
                ];
            } else {
                // Se for duplicado, podemos criar uma sessão temporária só para mostrar um aviso
                $_SESSION["erro"] = "Este cadastro já existe no sistema!";
            }
        }

        // Padrão PRG para evitar reenvio de formulário com F5
        header("Location: index_comentado.php"); // (mude para o nome do seu arquivo)
        exit();
    }

    // --- MENSAGEM DE ERRO NA TELA ---
    // Verifica se existe uma mensagem de erro na sessão para ser exibida
    if (isset($_SESSION["erro"])) {
        echo "<p style='color: red; font-weight: bold;'>{$_SESSION["erro"]}</p>";
        // Apaga a mensagem logo depois de mostrar, para não ficar fixa na tela
        unset($_SESSION["erro"]);
    }

    if (count($_SESSION["cadastro"]) > 0) {
    ?>

        <table border="1">
            <tr>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Idade</td>
            </tr>

            <?php
            // O foreach é o laço de repetição perfeito para Arrays.
            // Ele lê a sessão "cadastro" e, para cada item encontrado, guarda na variável $item.
            foreach ($_SESSION["cadastro"] as $item) {
                echo "<tr>";
                // Como cada $item é um array associativo, acessamos os dados por seus "nomes/chaves"
                echo "<td>{$item["nome"]}</td>";
                echo "<td>{$item["telefone"]}</td>";
                echo "<td>{$item["idade"]}</td>";
                echo "</tr>";
            }
            ?>
        </table>

    <?php
    } else {
        // Se o count() for 0, cai no ELSE e mostramos essa mensagem amigável.
        echo "<p>Insira um novo cadastro</p>";
    }
    ?>
</body>

</html>