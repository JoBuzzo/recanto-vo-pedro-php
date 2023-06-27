<?php

namespace BLL;
include_once '../DAL/UsuarioDAL.php';


use DAL\UsuarioDAL;


class UsuarioBLL
{

    public function SelectUser(string $usuario)
    {
        $dal = new UsuarioDAL();
        //linhas de código com regras de negócio

        return $dal->SelectUser($usuario);
    }
}
