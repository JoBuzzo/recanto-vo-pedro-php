<?php

require_once '../../BLL/MultaBLL.php';

use BLL\MultaBLL;

$id = $_GET['id'];

$bll = new MultaBLL();

$multa = $bll->buscar($id);


// if(isset($_POST['id'])){
//     $id = $_POST['id'];
//     $bll->deletar($id);

//     header("location: lista.php");
// }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multa de <?php echo $multa->getReserva()->getNome(); ?></title>


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <div class="flex justify-center mt-14 h-screen p-4">
        <div>
            <div class="flex space-x-2 mb-6">
                <a onclick="JavaScript:location.href='editar.php?id=' + <?php echo $multa->getId(); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                    Editar
                </a>
                <form action="#" method="POST">
                    <input type="text" hidden value="<?php echo $multa->getId(); ?>" name="id">
                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">
                        Deletar
                    </button>
                </form>
            </div>
            <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                <span class="font-medium">Multa de Luis: </span> <?php echo $multa->getReserva()->getNome() ?>
            </h1>
           
            <div class="md:flex md:justify-between md:space-x-8 mb-6">
                <div>
                    <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                        <span class="font-medium">Valor da multa: </span><?php echo $multa->getValor();  ?>
                    </h1>
                </div>
                <div>
                    <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                        <span class="font-medium">Pago: </span><?php echo $multa->getPago(true);  ?>
                    </h1>
                </div>
            </div>

            <div class="mb-6">
                <label for="motivo" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Motico da multa</label>
                <textarea id="motivo" rows="4" disabled class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $multa->getMotivo();  ?></textarea>
            </div>

        </div>
    </div>



    <?php include_once "../includes/body.php"; ?>


</body>

</html>