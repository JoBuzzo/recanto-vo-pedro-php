<?php

$view = "multa";

require_once '../../BLL/MultaBLL.php';

use BLL\MultaBLL;


$bll = new MultaBLL();

$multas = $bll->listar();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Multas</title>


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <?php if ($multas) : ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-14 mx-24">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">
                            Motivo
                        </th>
                        <th class="px-6 py-3">
                            Valor
                        </th>
                        <th class="px-6 py-3">
                            Responsavel
                        </th>
                        <th colspan="2" class="px-6 py-3">
                            Pago
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($multas as $multa) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $multa->getMotivo(); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $multa->getValor(); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a class="font-medium hover:underline cursor-pointer" onclick="JavaScript:location.href='../reserva/ver.php?id=' + <?php echo $multa->getReserva()->getId(); ?>">
                                    <?php echo $multa->getReserva()->getNome(); ?>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php echo $multa->getPago(true); ?>
                            </td>
                            <td>
                                <a class="font-medium hover:underline cursor-pointer" onclick="JavaScript:location.href='ver.php?id=' + <?php echo $multa->getId(); ?>">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="flex justify-center mt-14 font-semibold dark:text-white">
            Nenhuma Multa encontrada :(
        </div>
    <?php endif ?>

    <?php include_once "../includes/body.php"; ?>


</body>

</html>