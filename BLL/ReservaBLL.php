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
        //validação
        //...

        $this->reservaDAL->inserir($reserva);
    }
}