<?php
    session_start();

    if(!isset($_SESSION["alunos"])){
        $_SESSION["alunos"]= array();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de notas</title>
</head>
<body>
    <form method="post">
        <input type="text" name="txtNome" placeholder="Digite o nome"><br>
        <input type="text" name="txtMatricula" placeholder="Digite a matrícula"><br>
        <input type="number" step="0.1" name="txtNota1" placeholder="Digite a 1ª nota"><br>
        <input type="number" step="0.1" name="txtNota2" placeholder="Digite a 2ª nota"><br>
        <input type="submit" value="Salvar" name="btSalvar">
        <a href="limpar.php">Limpar</a>
    </form>
    <?php
        if(isset($_POST["btSalvar"])){
            $nome = $_POST["txtNome"];
            $matricula = $_POST["txtMatricula"];
            $nota1 = $_POST["txtNota1"];
            $nota2 = $_POST["txtNota2"];
            $media = ($nota1+$nota2)/2;

            $_SESSION["alunos"][]=["nome"=>$nome,"matricula"=>$matricula, "nota1"=>$nota1, "nota2"=>$nota2, "media"=>$media];
            header("location:index.php");//redireciona o usuário para página principal, evitando entradas da session duplicadas
        }
        if (count($_SESSION["alunos"])>0){
    ?><!--<tr>Cria linhas de uma table e <td> Cria colunas de uma table-->
    <table border='1'>
        <tr><td>Nome</td><td>Matrícula</td><td>1ª Nota</td><td>2ª Nota</td><td>Média</td></tr>
        <?php 
            foreach($_SESSION["alunos"] as $item){
                echo "<tr>";
                echo "<td>{$item["nome"]}</td>";
                echo "<td>{$item["matricula"]}</td>";
                echo "<td>{$item["nota1"]}</td>";
                echo "<td>{$item["nota2"]}</td>";
                echo "<td>{$item["media"]}</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <?php
        }else{
            echo "<p>Não existe aluno cadastrado</p>";
        }
    ?>
</body>
</html>