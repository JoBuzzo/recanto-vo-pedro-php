<?php
namespace BLL;

include_once '../DAL/ReservaDAL.php';
include_once '../MODEL/reserva.php';

use DAL\ReservaDAL;
use MODEL\Reserva;

class ReservaBLL
{
    private $reservaDAL;

    public function __construct()
    {
        $this->reservaDAL = new ReservaDAL();
    }

    public function inserir(Reserva $reserva)
    {
        $errors = [];

        if (strlen($reserva->getNome()) < 3) {
            $errors[] = "O nome deve ter no mínimo 3 caracteres.";
        }

        if (strlen($reserva->getNome()) > 100) {
            $errors[] = "O nome deve ter no máximo 100 caracteres.";
        }

        if (!preg_match('/^[0-9]{11}$/', $reserva->getNumero())) {
            $errors[] = "O número deve ter exatamente 11 dígitos.";
        }

        if($reserva->getTotalPagar() < $reserva->getPago()){
            $errors[] = "O valor cobrado deve ser maior ou igual ao campo do valor pago pelo cliente.";
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }


        $this->reservaDAL->inserir($reserva);
    }
}