<?php
//iniciando o uso da sessão
session_start();
include_once "config/conexao.php";
include_once "model/pessoa.php";
include_once "model/grupo.php";
include_once "dao/GrupoDao.php";
include_once "dao/PessoaDao.php";
include "topo.html";
//include_once "controller/PessoaController.php";

$p1Dao = new PessoaDao();
$grupoDao = new GrupoDao();

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
    $result = ["id" => "", "nome" => "", "email" => "", "endereco" => "", "telefone" => "", "sexo" => "", "idgrupo" => ""];
}
?>
<form method="post" action="controller/pessoaController.php">
    <!-- Criando um campo invisível para enviar o id -->
    <input type="hidden" class="form-control" name="txtId" value="<?php echo $result["id"] ?>">
    <div class="col-md-4 offset-md-4 p-1">
        <input type="text" class="form-control" name="txtNome" placeholder="Digite o nome" value="<?php echo $result["nome"] ?>">
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="email" class="form-control" name="txtEmail" placeholder="Digite o email" value="<?php echo $result["email"] ?>">
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="text" class="form-control" name="txtEndereco" placeholder="Digite o endereço" value="<?php echo $result["endereco"] ?>">
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="tel" class="form-control" name="txtTelefone" placeholder="Digite o telefone" value="<?php echo $result["telefone"] ?>">
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="radio" class="form-check-input" id="rbSexo" name="rbSexo" value="M" <?php echo $result["sexo"] == "M" ? "checked" : "" ?>>Masculino
        <input type="radio" class="form-check-input" id="rbSexo" name="rbSexo" value="F" <?php echo $result["sexo"] == "F" ? "checked" : "" ?>>Feminino
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <select class="form-select" name="cbIdGrupo">
            <option value="">Selecione um grupo</option>
            <?php
            $resultGrupo = $grupoDao->read();
            if ($resultGrupo) { // Garante que $resultGrupo não é nulo
                foreach ($resultGrupo as $linha) {
                    if ($linha->idgrupo == $result["idgrupo"]) {
                        echo "<option value='{$linha->idgrupo}' selected>{$linha->descricao}</option>";
                    } else {
                        echo "<option value='{$linha->idgrupo}'>{$linha->descricao}</option>";
                    }
                }
            }
            ?>
        </select>
    </div>
    <div class="col-md-4 offset-md-4 p-1">
        <input type="submit" value="Gravar" name="btGravar">
    </div>
</form>

<!--Tabela exibindo os dados que estão armazenados no banco de dados -->
<table class="table table-hover">
    <tr>
        <th>Nome</th>
        <th>Endereço</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Sexo</th>
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
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->endereco . "</td>";
            echo "<td>" . $item->email . "</td>";
            echo "<td>" . $item->telefone . "</td>";
            echo "<td>" . $item->sexo . "</td>";
            echo "<td>";
            //link para alterar
            echo "<a href='index.php?id={$item->id}'><img src='img/alterar.png' width='18'></a>";
            //link para deletar
            echo "<a href='controller/PessoaController.php?id={$item->id}'><img src='img/apagar.png' width='18'></a>";
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