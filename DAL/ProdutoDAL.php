<?php

namespace DAL;


require_once '../../DAL/conexao.php';
include_once '../../MODEL/produto.php';


use \Model\Produto;


class ProdutoDAL{
    public function inserir(Produto $produto)
    {
        $conexao = Conexao::conectar();

        $sql = "INSERT INTO `produto` (`nome`, `valor`, `estoque`) 
        VALUES ('{$produto->getNome()}', {$produto->getValor()}, {$produto->getEstoque()})";


        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        return $resultado;
    }
};

?>