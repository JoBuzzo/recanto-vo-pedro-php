<?php

require_once '../BLL/ReservaBLL.php';

use BLL\ReservaBLL;
use Enum\ReservaStatus;

$id = $_GET['id'];

$bll = new ReservaBLL();

$reserva = $bll->buscar($id);




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de <?php echo $reserva->getNome(); ?></title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

</head>

<body>

    <nav class="bg-white border border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <i class="fas fa-swimming-pool text-xl p-2 dark:text-white"></i>
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Recanto Vô Pedro</span>
            </a>
            <div class="flex md:order-2">
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquisar...">
                </div>
                <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                </div>
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../VIEW/lista.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Inicio</a>
                    </li>
                    <li>
                        <a href="../VIEW/criar.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Adicionar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="flex justify-center mt-14 h-screen p-2">
        <div>
            <div class="grid mb-6 grid-cols-4 items-center">
                <div>
                    <h1 class="block text-2xl font-medium text-gray-900 dark:text-white">
                        <?php echo $reserva->getNome();  ?>
                    </h1>
                </div>
                <div>
                    <a href="<?php echo $reserva->getNumeroLink();  ?>" target="_blank" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <?php echo $reserva->getNumero();  ?>
                    </a>
                </div>

                <div>
                    <a onclick="JavaScript:location.href='editar.php?id=' + <?php echo $reserva->getId(); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Editar
                    </a>
                </div>
            </div>
            <div class="grid mb-6 md:gap-6 gap-2 md:grid-cols-3 grid-cols-2">
                <div>
                    <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                        <span class="font-medium">Valor pago pelo cliente: </span><?php echo $reserva->getPago();  ?>
                    </h1>
                </div>
                <div>
                    <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                        <span class="font-medium">Valor cobrado: </span><?php echo $reserva->getTotalPagar();  ?>
                    </h1>
                </div>

                <div>
                    <h1 class="block mb-2 text-base font-medium 
                                <?php if ($reserva->getStatus()->getValue() == ReservaStatus::CANCELADO) echo 'text-red-600';
                                if ($reserva->getStatus()->getValue() == ReservaStatus::PENDENTE) echo 'text-yellow-500';
                                if ($reserva->getStatus()->getValue() == ReservaStatus::CONFIRMADO) echo 'text-green-600'; ?>">
                        <span class="text-gray-900 dark:text-white">Status: </span><?php echo $reserva->getStatus()->getValue(); ?>
                    </h1>
                </div>
            </div>

            <div class="mb-6">
                <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                    <div>
                        <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                            <span class="font-medium"> Primeiro dia: </span><?php echo $reserva->getPrimeiroDiaF() ?>
                        </h1>
                    </div>
                    <div>
                        <?php if ($reserva->getUltimoDia()) : ?>
                            <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                                <span class="font-medium">Ultimo dia :</span><?php echo $reserva->getUltimoDiaF(); ?>
                            </h1>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label for="descricao" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Descrição</label>
                <textarea id="descricao" rows="4" disabled class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $reserva->getDescricao() ? $reserva->getDescricao() : ''; ?></textarea>
            </div>
        </div>
    </div>





</body>

</html>