<?php 

require_once '../../BLL/DespesaBLL.php';

use BLL\DespesaBLL;

$id = $_GET['id'];

$bll = new DespesaBLL();

$despesa = $bll->buscar($id);

$bll->deletar($id);

header("location: lista.php");