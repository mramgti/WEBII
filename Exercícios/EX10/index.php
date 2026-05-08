<?php
class Fabricante
{
    //Atributo
    private $nome;

    //Construtor da classe
    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        //retorna o atributo nome
        return $this->nome;
    }
}
//Criando o objeto do tipo Fabricante
$f1 = new Fabricante("Dell");
echo $f1->getNome();

class Produto
{
    //Atributos
    private $descricao;
    private $preco;
    private $fabricante;

    //Métodos
    public function __construct($descricao, $preco, Fabricante $fabricante)
    {
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->fabricante = $fabricante;
    }

    public function getDetalhe()
    {
        return "<br>O produto {$this->descricao} é fabricado por:
        {$this->fabricante->getNome()}";
    }
}
//Criando o objeto do tipo produto
$p1 = new Produto("Notebook Gamer G15", "5000", $f1);
echo $p1->getDetalhe();
