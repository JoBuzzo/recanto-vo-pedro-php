<?php
    include_once 'C:\xampp\htdocs\recanto-vo-pedro-php\BLL\UsuarioBLL.php';
include_once 'C:\xampp\htdocs\recanto-vo-pedro-php\MODEL\usuario.php';


    $usuario = trim($_POST['usuario']);
     $senha = trim($_POST['senha']);


    echo "Usuario: " . $usuario. "</br>";
    echo "Senha: " . $senha. "</br>";   


    $bll = new  \BLL\bllUsuario();

$objUsuario = new \MODEL\usuario();

$objUsuario = $bll->SelectUser($usuario);

if ($objUsuario != null) {
    //echo "UsuarioDB: " . $objUsuario->getUsuario() . "</br>";
    //echo "SenhaDB: " . $objUsuario->getSenha() . "</br>" . "</br>";
    if (md5($senha) == $objUsuario->getSenha()){
        session_start();
        $_SESSION['login'] =  $objUsuario->getUsuario() ;
        header("location:reserva/lista.php");
    }
    else header("location:index.php");
}
else echo "usuario não encontrado";


?>