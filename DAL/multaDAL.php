<?php

namespace DAL;

require_once '../../DAL/conexao.php';
include_once '../../MODEL/multa.php';


use DAL\Conexao;
use Model\Multa;

class MultaDAL {
    public function inserir(Multa $multa)
    {
        $conexao = Conexao::conectar();

        $sql = "INSERT INTO `multa` (`motivo`, `valor`, `id_reserva`)
        VALUES ('{$multa->getMotivo()}', {$multa->getValor()}, {$multa->getReserva()->getId()});";

        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        return $resultado;
    }
};

?>