<?php 

require_once '../../BLL/MultaBLL.php';

use BLL\MultaBLL;

$id = $_GET['id'];

$bll = new MultaBLL();

$multa = $bll->buscar($id);

// $bll->deletar($id);

header("location: lista.php");