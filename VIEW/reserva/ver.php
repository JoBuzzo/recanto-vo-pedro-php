<?php

require_once '../../BLL/ReservaBLL.php';

use BLL\ReservaBLL;

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


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>

    <div class="flex justify-center items-center w-full mt-8">
        <div class="flex justify-center items-cente md:w-1/2 w-full">
            <div class="p-4 w-full max-w-xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                        <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                            <h3 class="font-bold mb-5">
                                <?php echo $reserva->getNome();  ?>
                            </h3>
                            <dl class="text-base">
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Valor</dt>
                                <dd class="mb-4 font-light text-gray-700 sm:mb-5 dark:text-gray-400">
                                    <?php echo "Quantia Paga: " . $reserva->getPago() . " <br> Total a pagar: " . $reserva->getTotalPagar(); ?>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <dl>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Status</dt>
                        <dd class="mb-4 font-light text-gray-700 sm:mb-5 dark:text-gray-400"><?php echo $reserva->getStatus()->getValue() ?></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Mais informações</dt>
                        <dd class="mb-4 font-light text-gray-700 sm:mb-5 dark:text-gray-400"><?php echo $reserva->getDescricao() ? $reserva->getDescricao() : ''; ?></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Datas</dt>
                        <dd class="mb-4 font-light text-gray-700 sm:mb-5 dark:text-gray-400"><?php echo $reserva->getPrimeiroDiaF();
                                                                                                if ($reserva->getUltimoDia()) {
                                                                                                    echo " - " . $reserva->getUltimoDiaF();
                                                                                                } ?>
                        </dd>
                    </dl>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3 sm:space-x-4">
                            <button type="button" onclick="JavaScript:location.href='editar.php?id=' + <?php echo $reserva->getId(); ?>" class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                </svg>
                                Editar
                            </button>

                        </div>
                        <button type="button" onclick="remover( <?php echo $reserva->getId() ?> )" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Excluir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../includes/body.php"; ?>

    <script>
        var nomeReserva = <?php echo json_encode($reserva->getNome()); ?>;

        function remover(id) {
            if (confirm('Excluir reserva de ' + nomeReserva + '?')) {
                location.href = 'deletar.php?id=' + id;
            }
        }
    </script>
</body>

</html>