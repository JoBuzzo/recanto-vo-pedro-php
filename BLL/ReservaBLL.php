<?php

namespace BLL;

include_once '../../DAL/ReservaDAL.php';
include_once '../../MODEL/reserva.php';

use DAL\Conexao;
use DAL\ReservaDAL;
use MODEL\Reserva;

class ReservaBLL
{
    private $reservaDAL;

    public function __construct()
    {
        $this->reservaDAL = new ReservaDAL();
    }


    public function listar()
    {
        return $this->reservaDAL->listar();
    }

    public function buscar(int $id)
    {
        return $this->reservaDAL->buscar($id);
    }


    public function inserir(Reserva $reserva)
    {
        $errors = [];

        $primeiroDia = strtotime($reserva->getPrimeiroDia());
        if ($reserva->getUltimoDia()) {
            $ultimoDia = strtotime($reserva->getUltimoDia());
        }

        if (isset($ultimoDia) && $primeiroDia >= $ultimoDia) {
            $errors[] = "O primeiro dia deve ser anterior ao último dia.";
        }

        if ($this->existeReservaComPrimeiroDia($reserva->getPrimeiroDia())) {
            $errors[] = "Ja possui reservas com a data do primeiro dia.";
        }

        if (isset($ultimoDia) && $this->existeReservaComMesmoUltimoDia($reserva->getUltimoDia())) {
            $errors[] = "Ja possui reservas com a data do ultimo dia.";
        }

        if (strlen($reserva->getDescricao()) < 5) {
            $errors[] = "A descrição deve ter no mínimo 5 caracteres.";
        }

        if (strlen($reserva->getNome()) < 3) {
            $errors[] = "O nome deve ter no mínimo 3 caracteres.";
        }

        if (strlen($reserva->getNome()) > 100) {
            $errors[] = "O nome deve ter no máximo 100 caracteres.";
        }


        if (!preg_match('/^[0-9]{11}$/', $reserva->getNumero())) {
            $errors[] = "O número deve ter exatamente 11 dígitos.";
        }

        if ($reserva->getTotalPagar() < $reserva->getPago()) {
            $errors[] = "O valor cobrado deve ser maior ou igual ao campo do valor pago pelo cliente.";
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }


        $this->reservaDAL->inserir($reserva);
    }

    public function editar(Reserva $reserva)
    {

        $errors = [];

        $primeiroDia = strtotime($reserva->getPrimeiroDia());
        if ($reserva->getUltimoDia()) {
            $ultimoDia = strtotime($reserva->getUltimoDia());
        }

        if (isset($ultimoDia) && $primeiroDia >= $ultimoDia) {
            $errors[] = "O primeiro dia deve ser anterior ao último dia.";
        }

        if ($this->existeReservaComPrimeiroDia($reserva->getPrimeiroDia(), $reserva->getId())) {
            $errors[] = "Ja possui reservas com a data do primeiro dia.";
        }

        if (isset($ultimoDia) && $this->existeReservaComMesmoUltimoDia($reserva->getUltimoDia(), $reserva->getId())) {
            $errors[] = "Ja possui reservas com a data do ultimo dia.";
        }

        if (strlen($reserva->getDescricao()) < 5) {
            $errors[] = "A descrição deve ter no mínimo 5 caracteres.";
        }

        if (strlen($reserva->getNome()) < 3) {
            $errors[] = "O nome deve ter no mínimo 3 caracteres.";
        }

        if (strlen($reserva->getNome()) > 100) {
            $errors[] = "O nome deve ter no máximo 100 caracteres.";
        }


        if (!preg_match('/^[0-9]{11}$/', $reserva->getNumero())) {
            $errors[] = "O número deve ter exatamente 11 dígitos.";
        }

        if ($reserva->getTotalPagar() < $reserva->getPago()) {
            $errors[] = "O valor cobrado deve ser maior ou igual ao campo do valor pago pelo cliente.";
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }
        $this->reservaDAL->editar($reserva);
    }

    public function deletar(int $id)
    {
        $this->reservaDAL->deletar($id);
    }

    public function existeReservaComPrimeiroDia($primeiroDia, $reservaId = null)
    {
        $query = "SELECT COUNT(*) FROM reserva WHERE (primeiroDia = :primeiroDia OR ultimoDia = :primeiroDia) AND id != :reservaId";
        $conexao = Conexao::conectar();

        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':primeiroDia', $primeiroDia);
        $stmt->bindParam(':reservaId', $reservaId);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        $conexao = Conexao::desconectar();

        return $count > 0;
    }

    public function existeReservaComMesmoUltimoDia($ultimoDia, $reservaId = null)
    {
        $query = "SELECT COUNT(*) FROM reserva WHERE (ultimoDia = :ultimoDia OR primeiroDia = :ultimoDia) AND id != :reservaId";
        $conexao = Conexao::conectar();

        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':ultimoDia', $ultimoDia);
        $stmt->bindParam(':reservaId', $reservaId);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        $conexao = Conexao::desconectar();

        return $count > 0;
    }
}
