<?php
include "Conta.php";
class Corrente extends Conta
{
    private $limite;
    private $taxa;

    public function __construct($agencia, $conta, $saldo, $limite, $taxa)
    {
        $this->limite = $limite;
        $this->taxa = $taxa;
        parent::__construct($agencia, $conta, $saldo);
    }

    public function depositar($valor)
    {
        if ($this->saldo < 0) {
            $valor -= $this->taxa;
        }
        $this->saldo += $valor;
    }

    public function sacar($valor)
    {
        if ($valor > 0 && ($this->saldo + $this->limite) >= $valor) {
            $this->saldo -= $valor;
            return true;
        }
        return false;
    }
}
