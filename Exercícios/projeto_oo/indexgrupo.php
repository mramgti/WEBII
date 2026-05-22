<?php
//iniciando o uso da sessão
session_start();
include_once "config/conexao.php";
include_once "model/grupo.php";
include_once "dao/GrupoDao.php";
include "topo.html";
//include_once "controller/GrupoController.php";

$p1Dao = new GrupoDao();

?>


<?php
if (isset($_SESSION["resultado"])) {
    if ($_SESSION["resultado"] == true) {
        echo "<p>{$_SESSION["mensagem"]}</p>";
    } else {
        echo "<p>Erro ao efetuar a operação.</p>";
    }
    $_SESSION["resultado"] = null;
    $_SESSION["mensagem"] = null;
}

//Verificando se existe algum parâmetro na URL
if (isset($_GET["id"])) {
    //buscar o cadastro correspondente
    $result = $p1Dao->readId($_GET["id"]);
    //var_dump($result);
} else {
    $result = ["idgrupo" => "", "descricao" => ""];
}
?>
<form method="post" action="controller/GrupoController.php">
    <!-- Criando um campo invisível para enviar o id -->
    <input type="hidden" class="form-control" name="txtIdGrupo" value="<?php echo $result["idgrupo"] ?>">
    <div class="col-md-4 offset-md-4 p-1">
    <input type="text" class="form-control" name="txtDescricao" placeholder="Digite a descrição" value="<?php echo $result["descricao"] ?>">
    </div>
    <!--Botão submit-->
    <div class="col-md-4 offset-md-4 p-1">
    <input type="submit" value="Gravar" name="btGravar">
    </div>
</form>

    <!--Tabela exibindo os dados que estão armazenados no banco de dados -->
    <table class="table table-hover">
        <tr>
            <th>Descrição</th>
            <th></th>
        </tr>
        <?php
        $result = $p1Dao->read();
        // Se o result estiver nulo é porque aconteceu um erro
        if (is_null($result)) {
            echo "<tr><td colspan='6'>Erro ao buscar os dados do banco></td></tr>";
        } else {
            //Não aconteceu nenhum erro,percorrer os itens do array
            foreach ($result as $item) {
                echo "<tr>";
                echo "<td>" . $item->descricao . "</td>";
                echo "<td>";
                //link para alterar
                echo "<a href='indexgrupo.php?id={$item->idgrupo}'><img src='img/alterar.png' width='18'></a>";
                //link para deletar
                echo "<a href='controller/GrupoController.php?id={$item->idgrupo}'><img src='img/apagar.png' width='18'></a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</div>
<?php
include "rodape.html";
?>