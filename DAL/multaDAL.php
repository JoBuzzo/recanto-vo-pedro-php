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

        if (isset($listaMultas)) {
            return $listaMultas;
        } else {
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


    public function editar(Multa $multa)
    {
        $sql = "UPDATE multa SET motivo=?, valor=?, pago=? WHERE id=?";
        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $resultado = $query->execute(array($multa->getMotivo(), $multa->getValor(), $multa->getPago(), $multa->getId()));

        $con = Conexao::desconectar();

        return $resultado;
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM multa WHERE id=?";
        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);

        $query->execute(array($id));
        $resultado = $query->fetch(\PDO::FETCH_ASSOC);

        if (!$resultado) {
            header("Location: lista.php");
            exit;
        }


        $multa = new Multa();
        $multa->setId($resultado['id']);
        $multa->setMotivo($resultado['motivo']);
        $multa->setValor($resultado['valor']);
        $multa->setPago($resultado['pago']);

        $reservaDAL = new ReservaDAL();
        $multa->setReserva($reservaDAL->buscar($resultado['id_reserva']));

        Conexao::desconectar();

        return $multa;
    }
};
