<?php
include "Conta.php";

class Poupanca extends Conta
{
    //Atributo
    private $rendimento;

    //Métodos
    public function __construct($agencia, $conta, $saldo, $rendimento)
    {
        $this->rendimento = $rendimento;
        parent::__construct($agencia, $conta, $saldo);
    }

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function sacar($valor)
    {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
            echo "Valor sacado com sucesso<br>";
        } else {
            echo "Saldo insuficiente<br>";
        }
    }
}
$cp = new Poupanca("0001", "1234-6", 150, 0.5);
$cp->depositar(50);
$cp->sacar(250);
echo $cp->getDetalhes();
$cp->sacar(150);
echo $cp->getDetalhes();
