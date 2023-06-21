<?php

namespace DAL;

require_once '../../DAL/conexao.php';
require_once '../../DAL/ReservaDAL.php';
include_once '../../MODEL/multa.php';


use DAL\Conexao;
use DAL\ReservaDAL;
use Model\Multa;

class MultaDAL
{

    public function listar()
    {
        $conexao = Conexao::conectar();

        $sql = "SELECT * FROM `multa` ORDER BY `id_reserva`;";


        $resultado = $conexao->query($sql);

        foreach ($resultado as $r) {
            $multa = new Multa;
            $multa->setId($r['id']);
            $multa->setMotivo($r['motivo']);
            $multa->setValor($r['valor']);
            $multa->setPago($r['pago']);
            $reservaDAL = new ReservaDAL();
            $multa->setReserva($reservaDAL->buscar($r['id_reserva']));

            $listaMultas[] = $multa;
        }

        if(isset($listaMultas)){
            return $listaMultas;
        }else{
            return array();
        }
    }

    public function inserir(Multa $multa)
    {
        $conexao = Conexao::conectar();

        $sql = "INSERT INTO `multa` (`motivo`, `valor`, `id_reserva`, `pago`)
        VALUES ('{$multa->getMotivo()}', {$multa->getValor()}, {$multa->getReserva()->getId()}, '{$multa->getPago()}');";

        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        return $resultado;
    }
};
