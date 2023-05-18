<?php

namespace DAL;

class Conexao{
    private static $dbNome='epiz_34221086_piscina'; 
    private static $dbHost = 'sql309.epizy.com';
    private static $dbUsuario = 'epiz_34221086'; 
    private static $dbSenha = 'vbCku07t3g1a9';   

    private static $cont = null; 

    public function __construct()
    {
        die("A função init não é permitida"); 
    }

    public static function conectar(){
        if (self::$cont == null){
            try{
               self::$cont = new \PDO("mysql:host=". self::$dbHost .";dbname=" . self::$dbNome , self::$dbUsuario, self::$dbSenha);
            }
            catch (\PDOException $exception) {
                die ($exception->getMessage());
            }
 
        }
        return self::$cont; 
    }

    public static function desconectar (){
        self::$cont = null; 
    }

}

?>