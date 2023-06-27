<?php

$view = "reserva";

require_once '../../BLL/ReservaBLL.php';

use BLL\ReservaBLL;
use Enum\ReservaStatus;


$bll = new ReservaBLL();

$reservas = $bll->listar();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reservas</title>


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <?php if ($reservas) : ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-14 mx-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">
                            Nome
                        </th>
                        <th class="px-6 py-3">
                            Numero
                        </th>
                        <th class="px-6 py-3">
                            Pago / Cobrado
                        </th>
                        <th class="px-6 py-3">
                            Datas
                        </th>
                        <th class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="font-medium hover:underline cursor-pointer" onclick="JavaScript:location.href='ver.php?id=' + <?php echo $reserva->getId(); ?>">
                                    <?php echo $reserva->getNome(); ?>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?php echo $reserva->getNumeroLink(); ?>" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <?php echo $reserva->getNumero(); ?>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php echo "{$reserva->getPago()} / {$reserva->getTotalPagar()}"; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo "{$reserva->getPrimeiroDiaF()} <br> {$reserva->getUltimoDiaF()}"; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold 
                                <?php if ($reserva->getStatus()->getValue() == ReservaStatus::CANCELADO) echo 'text-red-600';
                                if ($reserva->getStatus()->getValue() == ReservaStatus::PENDENTE) echo 'text-yellow-500';
                                if ($reserva->getStatus()->getValue() == ReservaStatus::CONFIRMADO) echo 'text-green-400'; ?>">
                                <?php echo $reserva->getStatus()->getValue(); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="flex justify-center mt-14 font-semibold">
            Nenhuma reserva encontrada :(
        </div>
    <?php endif ?>

    <?php include_once "../includes/body.php"; ?>


</body>

</html>