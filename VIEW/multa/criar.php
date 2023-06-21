<?php

require_once '../../BLL/MultaBLL.php';
require_once '../../BLL/ReservaBLL.php';


use Model\Multa;
use BLL\MultaBLL;
use BLL\ReservaBLL;

$bllReserva = new ReservaBLL();

$reservas = $bllReserva->listar();

$bll = new MultaBLL();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $multa = new Multa();

        $multa->setMotivo($_POST['motivo']);
        $multa->setValor($_POST['valor']);

        if(isset($_POST['pago'])){
            $multa->setPago($_POST['pago']);
        }else{
            $multa->setPago(false);
        }


        
        $reserva = $bllReserva->buscar($_POST['reserva']);
        $multa->setReserva($reserva);

        $bll->inserir($multa);

        header("location: lista.php");
    } catch (Exception $e) {
        $errors = explode("\n", $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <?php include_once "../includes/head.php"; ?>

</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>


    <div class="flex justify-center mt-14 h-screen p-2">
        <form method="POST">
            <div class="mb-6">
                <label for="motivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motivo da multa</label>
                <textarea id="motivo" name="motivo" rows="4" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?></textarea>
            </div>
            <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                <div>
                    <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor da multa</label>
                    <input type="text" id="valor" name="valor" value="<?php echo isset($_POST['valor']) ? $_POST['valor'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <?php include_once "../components/selectReserva.php";
                    select($reservas);
                    ?>
                </div>
            </div>
            <div class="flex items-center mb-4">
                <input id="pago" type="checkbox" name='pago' value="true"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="pago" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pago?</label>
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