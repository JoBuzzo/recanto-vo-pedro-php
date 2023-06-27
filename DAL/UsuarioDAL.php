<?php

namespace DAL;

include_once '../DAL/conexao.php';
include_once '../MODEL/usuario.php';

use MODEL\Usuario;

class UsuarioDAL
{

    public function SelectUser(string $usuario)
    {
        $sql = "select * from `usuario` where usuario=?;";
        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);
        $query->execute(array($usuario));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        
        Conexao::desconectar();

        $usuario = new Usuario();
        
        if ($linha) {
            $usuario->setId($linha['id']);
            $usuario->setUsuario($linha['usuario']);
            $usuario->setSenha($linha['senha']);
            $usuario->setEmail($linha['email']);
        }
        var_dump($linha);
        return $usuario;
    }
}