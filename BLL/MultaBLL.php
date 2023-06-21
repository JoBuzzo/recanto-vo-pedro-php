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

        if($multa->getValor() < 0){
            $errors[] = "O valor deve ser maior que 0.";
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }

        $this->multaDAL->inserir($multa);
    }
}