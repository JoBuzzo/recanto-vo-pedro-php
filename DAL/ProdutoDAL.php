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

    public function listar()
    {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM `produto`;";

        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        foreach ($resultado as $r) {
            $produto = new Produto;
            $produto->setId($r['id']);
            $produto->setNome($r['nome']);
            $produto->setValor($r['valor']);
            $produto->setEstoque($r['estoque']);

            $listaProdutos[] = $produto;
        }

        if (isset($listaProdutos)) {
            return $listaProdutos;
        } else {
            return array();
        }
    }
};

?>