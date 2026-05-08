<?php
    //Classe abstrata
    abstract class Conta{
        //Atributos
        protected $agencia;
        protected $conta;
        protected $saldo;

        //Método
        public function __construct($agencia, $conta, $saldo){
            $this->agencia = $agencia;
            $this->conta = $conta;
            $this->saldo = $saldo;
        }

        public function getDetalhes(){
            return "Agencia: {$this->agencia} | Conta: {$this->conta} | Saldo: {$this->saldo}<br>";
        }

        public abstract function depositar($valor);

        public abstract function sacar($valor);
    }
