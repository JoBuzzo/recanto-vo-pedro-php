<?php


include_once '../BLL/UsuarioBLL.php';
include_once '../MODEL/usuario.php';

use BLL\UsuarioBLL;

$usuario = trim($_POST['usuario']);
$senha = trim($_POST['senha']);


echo "Usuario: " . $usuario. "</br>";
echo "Senha: " . $senha. "</br>";       


$bll = new  UsuarioBLL();

$objUsuario = new \MODEL\usuario();

$objUsuario = $bll->SelectUser($usuario);

if ($objUsuario) {
    if (md5($senha) == $objUsuario->getSenha()){
        session_start();
        $_SESSION['login'] =  $objUsuario->getUsuario() ;
        header("location:reserva/lista.php");
    }
    else header("location:index.php");
}
else echo "usuario não encontrado";
