<?php

namespace BLL;

include_once '../../DAL/DespesaDAL.php';
include_once '../../MODEL/despesa.php';

use DAL\DespesaDAL;
use MODEL\Despesa;

class DespesaBLL
{

    private $despesaDAL;

    public function __construct()
    {
        $this->despesaDAL = new DespesaDAL();
    }

    public function listar()
    {
        return $this->despesaDAL->listar();
    }

    public function buscar($id)
    {
        return $this->despesaDAL->buscar($id);
    }

    public function inserir(Despesa $despesa)
    {

        $errors = [];

        if (strlen($despesa->getDescricao()) < 0) {
            $errors[] = "Descrição deve ter no minimo 1 caracter";
        }
        if (strlen($despesa->getValor()) < 0) {
            $errors[] = "O Valor deve ser maior do que zero";
        }


        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }

        $this->despesaDAL->inserir($despesa);
    }

    public function deletar(int $id)
    {
        $this->despesaDAL->deletar($id);
    }
    public function editar(Despesa $despesa)
    {
        $errors = [];
        if (strlen($despesa->getDescricao()) < 0) {
            $errors[] = "Descrição deve ter no minimo 1 caracter";
        }
        if (strlen($despesa->getValor()) < 0) {
            $errors[] = "O Valor deve ser maior do que zero";
        }


        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }

        $this->despesaDAL->editar($despesa);
    }
}
