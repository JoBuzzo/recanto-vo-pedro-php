<?php 

require_once '../../BLL/ReservaBLL.php';

use BLL\ReservaBLL;

$id = $_GET['id'];

$bll = new ReservaBLL();

$reserva = $bll->buscar($id);

$bll->deletar($id);

header("location: lista.php");
