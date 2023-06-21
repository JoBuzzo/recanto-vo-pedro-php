<?php

namespace  DAL;

require_once '../../DAL/conexao.php';
include_once '../../MODEL/despesa.php';

use \Model\Despesa;

class  DespesaDAL
{

    public function inserir(Despesa $despesa)
    {
        $conexao = Conexao::conectar();

        $sql = "INSERT INTO `despesa` (`descricao`, `valor`, `data`) 
            VALUES ('{$despesa->getDescricao()}', {$despesa->getValor()}, '{$despesa->getData()}')";


        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        return $resultado;
    }

    public function editar(Despesa $despesa)
    {
        $sql = "UPDATE despesa SET descricao=?, valor=?, data=? WHERE id=?";
        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $resultado = $query->execute(array($despesa->getDescricao(), $despesa->getValor(), $despesa->getData(), $despesa->getId()));

        $con = Conexao::desconectar();

        return $resultado;
    }
    public function listar()
    {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM `despesa`;";

        $resultado = $conexao->query($sql);

        $conexao = Conexao::desconectar();

        foreach ($resultado as $r) {
            $despesa = new Despesa;
            $despesa->setId($r['id']);
            $despesa->setDescricao($r['descricao']);
            $despesa->setValor($r['valor']);
            $despesa->setData($r['data']);

            $listaDespesa[] = $despesa;
        }

        if (isset($listaDespesa)) {
            return $listaDespesa;
        } else {
            return array();
        }
    }

    public function buscar(int $id)
    {
        $sql = "select * from despesa where id=?;";

        $pdo = Conexao::conectar();
        $query = $pdo->prepare($sql);

        $query->execute(array($id));
        $resultado = $query->fetch(\PDO::FETCH_ASSOC);

        if (!$resultado) {
            header("Location: lista.php");
            exit;
        }

        Conexao::desconectar();

        $despesa = new Despesa();

        $despesa->setId($resultado['id']);
        $despesa->setDescricao($resultado['descricao']);
        $despesa->setValor($resultado['valor']);
        $despesa->setData($resultado['data']);

        return $despesa;
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM despesa WHERE id=?;";

        $pdo = Conexao::conectar();
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);

        $resultado = $query->execute(array($id));

        $con = Conexao::desconectar();

        return $resultado;
    }
}
