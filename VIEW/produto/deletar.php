<?php 

require_once '../../BLL/ProdutoBLL.php';

use BLL\ProdutoBLL;

$id = $_GET['id'];

$bll = new ProdutoBLL();

$produto = $bll->buscar($id);

$bll->deletar($id);

header("location: lista.php");