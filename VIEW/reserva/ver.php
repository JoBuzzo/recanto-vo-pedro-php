<?php

require_once '../../BLL/ReservaBLL.php';

use BLL\ReservaBLL;
use Enum\ReservaStatus;

$id = $_GET['id'];

$bll = new ReservaBLL();

$reserva = $bll->buscar($id);


if(isset($_POST['id'])){
    $id = $_POST['id'];
    $bll->deletar($id);

    header("location: lista.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de <?php echo $reserva->getNome(); ?></title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <div class="flex justify-center mt-14 h-screen p-4">
        <div>
            <div class="flex space-x-2 mb-6">
                <a onclick="JavaScript:location.href='editar.php?id=' + <?php echo $reserva->getId(); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                    Editar
                </a>
                <form action="#" method="POST">
                    <input type="text" hidden value="<?php echo $reserva->getId(); ?>" name="id">
                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">
                        Deletar
                    </button>
                </form>
            </div>
            <div class="md:flex md:justify-between md:space-x-8 mb-6">
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

            </div>
            <div class="md:flex md:justify-between md:space-x-8 mb-6">
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
                                if ($reserva->getStatus()->getValue() == ReservaStatus::CONFIRMADO) echo 'text-green-400'; ?>">
                        <span class="text-gray-900 dark:text-white">Status: </span><?php echo $reserva->getStatus()->getValue(); ?>
                    </h1>
                </div>
            </div>

            <div class="mb-6">
                <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                    <div>
                        <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white whitespace-nowrap">
                            <span class="font-medium"> Primeiro dia: </span><?php echo $reserva->getPrimeiroDiaF() ?>
                        </h1>
                    </div>
                    <div>
                        <?php if ($reserva->getUltimoDia()) : ?>
                            <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white whitespace-nowrap">
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

    <?php include_once "../includes/body.php"; ?>


</body>

</html>
