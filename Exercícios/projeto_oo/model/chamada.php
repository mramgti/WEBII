<?php
class chamada
{

    private $idchamada;
    private $id;
    private $atendido;
    private $data;
    private $hora;
    private $observacao;

    public function __construct($idchamada, $id, $atendido, $data, $hora, $observacao)
    {
        $this->idchamada = $idchamada;
        $this->id = $id;
        $this->atendido = $atendido;
        $this->data = $data;
        $this->hora = $hora;
        $this->observacao = $observacao;
    }

    public function __get($key)
    {
        return $this->{$key};
    }

    public function __set($key, $value)
    {
        $this->{$key} = $value;
    }
}
