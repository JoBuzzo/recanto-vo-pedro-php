<?php

namespace DAL;

require_once '../DAL/conexao.php';
include_once '../MODEL/reserva.php';


use \Model\Reserva;
use DAL\Conexao;

class ReservaDAL {

    public function todos() {

    }

    public function inserir(Reserva $reserva){
        $coneccao = Conexao::conectar(); 
        $sql = "INSERT INTO `reserva` (`nome`, `numero`, `pago`, `totalPagar`, `status`) 
        VALUES ('{$reserva->getNome()}', {$reserva->getNumero()}, {$reserva->getPago()}, {$reserva->getTotalPagar()}, '{$reserva->getStatus()->getValue()}')";
     
        $resultado = $coneccao->query($sql); 
        $coneccao = Conexao::desconectar();
        return $resultado; 
    }

    public function editar(){

    }

    public function deletar(){

    }


};


?>