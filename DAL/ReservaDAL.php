<?php

namespace DAL;

require_once '../DAL/conexao.php';
include_once '../MODEL/reserva.php';
require_once '../ENUM/ReservaStatus.php';


use \Model\Reserva;
use DAL\Conexao;
use \Enum\ReservaStatus;

class ReservaDAL
{

    public function listar()
    {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM `reserva` ORDER BY primeiroDia;";

        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        foreach ($resultado as $r) {
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
        } else {
            return array();
        }
    }

    public function inserir(Reserva $reserva)
    {
        $conexao = Conexao::conectar();
        $ultimoDia = $reserva->getUltimoDia() ? "'{$reserva->getUltimoDia()}'" : "NULL";

        $sql = "INSERT INTO `reserva` (`nome`, `numero`, `pago`, `totalPagar`, `status`, `descricao`, `primeiroDia`, `ultimoDia`) 
        VALUES ('{$reserva->getNome()}', {$reserva->getNumero()}, {$reserva->getPago()}, {$reserva->getTotalPagar()}, '{$reserva->getStatus()->getValue()}', '{$reserva->getDescricao()}', '{$reserva->getPrimeiroDia()}', {$ultimoDia})";


        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        return $resultado;
    }

    public function buscar(int $id)
    {
        $sql = "select * from reserva where id=?;";

        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);

        $query->execute(array($id));
        $resultado = $query->fetch(\PDO::FETCH_ASSOC);

        if (!$resultado) {
            header("Location: lista.php");
            exit;
        }

        Conexao::desconectar();

        $reserva = new Reserva();

        $reserva->setId($resultado['id']);
        $reserva->setNome($resultado['nome']);
        $reserva->setNumero($resultado['numero']);
        $reserva->setPago($resultado['pago']);
        $reserva->setTotalPagar($resultado['totalPagar']);
        $reserva->setStatus(new ReservaStatus($resultado['status']));
        $reserva->setDescricao($resultado['descricao']);
        $reserva->setPrimeiroDia($resultado['primeiroDia']);
        $reserva->setUltimoDia($resultado['ultimoDia']);

        return $reserva;
    }



    public function editar(Reserva $reserva)
    {
        $sql = "UPDATE reserva SET nome=?, numero=?, pago=?, totalPagar=?, status=?, descricao=?, primeiroDia=?, ultimoDia=? WHERE id=?";

        $pdo = Conexao::conectar();
        $ultimoDia = $reserva->getUltimoDia() ? "{$reserva->getUltimoDia()}" : NULL;
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);

        $resultado = $query->execute(array($reserva->getNome(), $reserva->getNumero(), $reserva->getPago(), $reserva->getTotalPagar(),$reserva->getStatus()->getValue(),
        $reserva->getDescricao(), $reserva->getPrimeiroDia(), $ultimoDia, $reserva->getId()));

        $con = Conexao::desconectar();

        return $resultado;

    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM reserva WHERE id=?;";

        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        $query = $pdo->prepare($sql);
        
        $resultado = $query->execute(array($id));

        $con = Conexao::desconectar();

        return $resultado;
    }
};
