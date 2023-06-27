<?php
namespace Model;

 class Usuario{

    public int $id;
    public string $email;    
    public string $senha;
    public string $usuario; 

    public function __construct(){}

    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){ 
        return $this->senha;
    }

    public function getUsuario(){   
        return $this->usuario; 
    }
     
    public function setId(int $id){
        $this->id = $id; 
    }


    public function setEmail($email){
        $this->email = $email;
    }   

    public function setSenha($senha){
        $this->senha = $senha;
    }       

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }   



}

?>