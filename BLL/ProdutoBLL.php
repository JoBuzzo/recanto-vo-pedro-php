<?php

namespace BLL;

include_once '../../DAL/ProdutoDAL.php';
include_once '../../MODEL/produto.php';

use DAL\ProdutoDAL;
use MODEL\Produto;

class ProdutoBLL
{
    private $produtoDAL;

    public function __construct()
    {
        $this->produtoDAL = new ProdutoDAL();
    }

    public function listar()
    {
        return $this->produtoDAL->listar();
    }

    public function buscar(int $id)
    {
        return $this->produtoDAL->buscar($id);
    }
    
    public function inserir(Produto $produto)
    {
        $errors = [];

        if (strlen($produto->getNome()) < 3) {
            $errors[] = "O nome deve ter no mínimo 3 caracteres.";
        }

        if (strlen($produto->getNome()) > 100) {
            $errors[] = "O nome deve ter no máximo 100 caracteres.";
        }

        if($produto->getEstoque() < 0){
            $errors[] = "O estoque deve ser maior que 0.";
        }

        if($produto->getValor() < 0){
            $errors[] = "O estoque deve ser maior que 0.";
        }

        if (count($errors) > 0) {
            throw new \Exception(implode("\n", $errors));
        }

        $this->produtoDAL->inserir($produto);
    }
};
