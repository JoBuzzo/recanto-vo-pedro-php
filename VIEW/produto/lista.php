<?php

$view = "produto";

require_once '../../BLL/ProdutoBLL.php';

use BLL\ProdutoBLL;

$bll = new ProdutoBLL();

$produtos = $bll->listar();

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



    <?php if ($produtos) : ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-14 mx-24">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">
                            Nome
                        </th>
                        <th class="py-3">
                            Quantia em estoque
                        </th>
                        <th colspan="2" class="py-3">
                            Valor por unidade
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $produto->getNome(); ?>
                            </td>

                            <td class="px-6 py-4">
                                <?php echo $produto->getEstoque(); ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $produto->getValor(); ?>
                            </td>
                            <td>
                                <a class="font-medium hover:underline cursor-pointer" onclick="JavaScript:location.href='ver.php?id=' + <?php echo $produto->getId(); ?>">
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
            Nenhum produto encontrado :(
        </div>
    <?php endif ?>


    <?php include_once "../includes/body.php"; ?>

</body>

</html>