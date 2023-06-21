<?php

namespace BLL;

include_once '../../DAL/MultaDAL.php';
include_once '../../MODEL/multa.php';

use DAL\MultaDAL;
use MODEL\Multa;

class MultaBLL
{

    private $multaDAL;

    public function __construct()
    {
        $this->multaDAL = new MultaDAL();
    }

    public function listar()
    {
        return $this->multaDAL->listar();
    }

    public function inserir(Multa $multa)
    {
        $errors = [];

        if (strlen($multa->getMotivo()) < 3) {
            $errors[] = "O motivo deve ter no mínimo 3 caracteres.";
        }

        if (strlen($multa->getMotivo()) > 300) {
            $errors[] = "O motivo deve ter no máximo 300 caracteres.";
        }

        if ($multa->getValor() < 0) {
            $errors[] = "O valor deve ser maior que 0.";
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }

        $this->multaDAL->inserir($multa);
    }

    public function buscar(int $id)
    {
        return $this->multaDAL->buscar($id);
    }
    public function editar(Multa $multa)
    {
        $errors = [];
        if (strlen($multa->getMotivo()) < 0) {
            $errors[] = "Descrição deve ter no minimo 1 caracter";
        }
        if (strlen($multa->getValor()) < 0) {
            $errors[] = "O Valor deve ser maior do que zero";
        }
        if (strlen($multa->getPago()) < 0) {
            $errors[] = "O Valor deve ser maior do que zero";
        }


        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }

        $this->multaDAL->editar($multa);
    }
}
