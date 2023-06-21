<?php

require_once '../../BLL/MultaBLL.php';

use BLL\MultaBLL;

$id = $_GET['id'];

$bll = new MultaBLL();

$multa = $bll->buscar($id);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {




    try {
        $multa->setMotivo($_POST['motivo']);
        $multa->setValor($_POST['valor']);


        if (isset($_POST['pago'])) {
            $multa->setPago($_POST['pago']);
        } else {
            $multa->setPago(false);
        }

        $bll->editar($multa);


        header("location: ver.php?id={$multa->getId()}");
    } catch (Exception $e) {

        $errors = explode("\n", $e->getMessage());
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Multa</title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <div class="flex justify-center mt-14 h-screen p-2">
        <form method="POST">
            <div class="mb-6">
                <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo
                </label>
                <textarea id="motivo" name="motivo" placeholder="Digite aqui informações do motivo da multa " rows="4" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $multa->getMotivo(); ?></textarea>
            </div>
            <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                <div class="mt-6">
                    <input id="pago" type="checkbox" name='pago' value="true" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="pago" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pago?</label>
                </div>
                <div>
                    <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor da
                        Multa</label>
                    <input type="text" id="valor" name="valor" value="<?php echo $multa->getValor(); ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>


            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

            <?php if (isset($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li class="text-red-500 font-semibold"><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </form>
    </div>


    <?php include_once "../includes/body.php"; ?>


</body>

</html>