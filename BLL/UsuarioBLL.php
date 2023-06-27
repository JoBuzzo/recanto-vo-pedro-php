<?php
    namespace BLL; 
    use DAL\UsuarioDAL; 
    include_once 'C:\xampp\htdocs\recanto-vo-pedro-php\DAL\UsuarioDAL.php';
    
    class bllUsuario {
   
        public function SelectUser (string $usuario){
            $dal = new  \Dal\dalUsuario(); 
            //linhas de código com regras de negócio
           
            return $dal->SelectUser($usuario);
        }
    }