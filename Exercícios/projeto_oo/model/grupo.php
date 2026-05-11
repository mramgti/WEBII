<?php
class grupo
{
    //Atributos presentes na tabela grupo
    private $idgrupo;
    private $descricao;
    

    public function __construct($idgrupo, $descricao)
    {
        $this->idgrupo = $idgrupo;
        $this->descricao = $descricao;     
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
