<?php

$view = "despesa";

require_once '../../BLL/DespesaBLL.php';

use BLL\DespesaBLL;

$bll = new DespesaBLL();

$despesa = $bll->listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Despesas</title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <?php include_once "../includes/head.php"; ?>

</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <?php if ($despesa) : ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-14 mx-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">
                            Descricao
                        </th>
                        <th class="py-3">
                            Data da Despesa
                        </th>
                        <th class="py-3">
                            Valor da Despesa
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($despesa as $despesa) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a class="font-medium hover:underline cursor-pointer" onclick="JavaScript:location.href='ver.php?id=' + <?php echo $despesa->getId(); ?>">
                                    <?php echo $despesa->getDescricao(); ?>
                                </a>
                            </td>

                            <td class="px-6 py-4">
                                <?php echo $despesa->getDataF(); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $despesa->getValor(); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="flex justify-center mt-14 font-semibold">
            Nenhuma despesa encontrada :(
        </div>
    <?php endif ?>


    <?php include_once "../includes/body.php"; ?>

</body>

</html>