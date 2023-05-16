<?php

namespace DAL;

require_once '../DAL/conexao.php';
include_once '../MODEL/reserva.php';
require_once '../ENUM/ReservaStatus.php';


use \Model\Reserva;
use DAL\Conexao;
use \Enum\ReservaStatus;

class ReservaDAL {

    public function listar()
     {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM `reserva` ORDER BY primeiroDia;";
        
        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        foreach($resultado as $r){
            $reserva = new Reserva;
            $reserva->setId($r['id']);
            $reserva->setNome($r['nome']);
            $reserva->setNumero($r['numero']);
            $reserva->setPago($r['pago']);
            $reserva->setTotalPagar($r['totalPagar']);
            $reserva->setDescricao($r['descricao']);
            $reserva->setPrimeiroDia($r['primeiroDia']);
            $reserva->setUltimoDia($r['ultimoDia']);
            $reserva->setStatus(new ReservaStatus($r['status']));

            $listaReservas[] = $reserva;
        }

        if (isset($listaReservas)) {
            return $listaReservas;
        }else {
            return array();
        }
    }

    public function inserir(Reserva $reserva){
        $conexao = Conexao::conectar(); 
        $ultimoDia = $reserva->getUltimoDia() ? "'{$reserva->getUltimoDia()}'" : "NULL";

        $sql = "INSERT INTO `reserva` (`nome`, `numero`, `pago`, `totalPagar`, `status`, `descricao`, `primeiroDia`, `ultimoDia`) 
        VALUES ('{$reserva->getNome()}', {$reserva->getNumero()}, {$reserva->getPago()}, {$reserva->getTotalPagar()}, '{$reserva->getStatus()->getValue()}', '{$reserva->getDescricao()}', '{$reserva->getPrimeiroDia()}', {$ultimoDia})";

     
        $resultado = $conexao->query($sql); 

        $conexao = Conexao::desconectar();

        return $resultado; 
    }

    public function editar(){

    }

    public function deletar(){

    }


};
