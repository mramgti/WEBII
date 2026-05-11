<?php
class conexao
{
    private static $dbName = "projeto_teste";
    private static $dbHost = "localhost";
    private static $dbUser = "root";
    private static $dbPass = "root";
    private static $con = null;

    //Quando o atributo é static utiliza-se self em vez de this

    public static function conectar()
    {
        if (self::$con == null) {
            try {
                self::$con = new PDO(
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,
                    self::$dbUser,
                    self::$dbPass
                );
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$con;
    }//fim do conectar
    public static function desconectar(){
        self::$con = null;
    }//fim do desconectar
}//fim da classe
