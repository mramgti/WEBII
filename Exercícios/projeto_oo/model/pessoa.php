<?php
class pessoa
{

    private $id;
    private $nome;
    private $endereco;
    private $telefone;
    private $email;
    private $sexo;
    private $idgrupo;

    public function __construct($id, $nome, $endereco, $telefone, $email, $sexo, $idgrupo)
{
    $this->id = $id;
    $this->nome = $nome;
    $this->endereco = $endereco;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->sexo = $sexo;
    $this->idgrupo = $idgrupo;
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
