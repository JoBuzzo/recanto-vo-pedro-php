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

    public function editar(Produto $produto)
    {
        $sql = "UPDATE produto SET nome=?, valor=?, estoque=? WHERE id=?";
        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $resultado = $query->execute(array($produto->getNome(), $produto->getValor(), $produto->getEstoque(), $produto->getId()));

        $con = Conexao::desconectar();

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

    public function buscar(int $id)
    {
        $sql = "select * from produto where id=?;";

        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);

        $query->execute(array($id));
        $resultado = $query->fetch(\PDO::FETCH_ASSOC);

        if (!$resultado) {
            header("Location: lista.php");
            exit;
        }

        Conexao::desconectar();

        $produto = new Produto();

        $produto->setId($resultado['id']);
        $produto->setNome($resultado['nome']);
        $produto->setValor($resultado['valor']);
        $produto->setEstoque($resultado['estoque']);

        return $produto;
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM produto WHERE id=?;";

        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
        $query = $pdo->prepare($sql);
        
        $resultado = $query->execute(array($id));

        $con = Conexao::desconectar();

        return $resultado;
    }
};

?>