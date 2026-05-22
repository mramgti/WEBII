<?php
//iniciando o uso da sessão
session_start();
include_once "config/conexao.php";
include_once "model/chamada.php";
include_once "dao/ChamadaDao.php";
include "topo.html";
include_once "model/pessoa.php";
include_once "dao/PessoaDao.php";

$p1Dao = new ChamadaDao();
$p2Dao = new PessoaDao(); //toda a tabela que tiver chave estrangeira deve-se iniciar mais um objeto pra chamar a tabela da chave estrangeira

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
if (isset($_GET["id"])) { //a própria pagina passa um método GET a ela mesma   
    //buscar o cadastro correspondente
    $result = $p1Dao->readId($_GET["id"]);
    //var_dump($result);
} else {
    $result = ["idchamada" => "", "id" => "", "atendido" => "", "data" => "", "hora" => "", "observacao" => ""]; // mesmos param do model e da tabela do BD
}
?>
<form method="post" action="controller/ChamadaController.php">
    <!-- Criando um campo invisível para enviar o id -->
    <input type="hidden" class="form-control" name="txtIdChamada" value="<?php echo $result["idchamada"] ?>">
    <div class="col-md-4 offset-md-4 p-1">
        <select class="form-select" name="cbId">
            <?php
            $result2 = $p2Dao->read();
            foreach ($result2 as $linha) {
                if ($linha->id == $result["id"]) {
                    echo "<option value='{$linha->id}' selected>{$linha->nome}</option>";
                } else {
                    echo "<option value='{$linha->id}'>{$linha->nome}</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="Checkbox" class="btn btn-outline-success" id="rbAtendido" name="rbAtendido" placeholder="Escolha a data" value="1" <?php echo $result["atendido"] ? "checked" : "" ?>>
        <label for="rbAtendido">Atendido</label>
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="date" class="form-control" name="txtData" placeholder="Escolha a data" value="<?php echo $result["data"] ?>">
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="hora" class="form-control" name="txtHora" placeholder="Escolha a hora" value="<?php echo $result["hora"] ?>">
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <textarea class="form-control" name="txtObservacao" placeholder="Escolha a observação" <?php echo $result["observacao"] ?>>
        </textarea>
    </div>
    <!--Botão submit-->
    <div class="col-md-4 offset-md-4 p-1">
        <input type="submit" value="Gravar" name="btGravar">
    </div>
</form>

<!--Tabela exibindo os dados que estão armazenados no banco de dados -->
<table class="table table-hover">
    <tr>
        <th>Data</th>
        <th>Hora</th>
        <th>Pessoa</th>
        <th>Observação</th>
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
            echo "<td>" . $item->data . "</td>";
            echo "<td>" . $item->hora . "</td>";
            echo "<td>" . $item->id . "</td>";
            echo "<td>" . $item->observacao . "</td>";
            echo "<td>";
            //link para alterar
            echo "<a href='indexchamada.php?id={$item->idchamada}'><img src='img/alterar.png' width='18'></a>";
            //link para deletar
            echo "<a href='controller/ChamadaController.php?id={$item->idchamada}'><img src='img/apagar.png' width='18'></a>";
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