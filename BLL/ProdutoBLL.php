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

    public function inserir(Produto $produto)
    {
        $this->produtoDAL->inserir($produto);
    }
};
