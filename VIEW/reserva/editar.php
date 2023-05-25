<?php

require_once '../../BLL/ReservaBLL.php';

use BLL\ReservaBLL;
use Enum\ReservaStatus;

$id = $_GET['id'];

$bll = new ReservaBLL();

$reserva = $bll->buscar($id);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['status'] == ReservaStatus::CONFIRMADO) {
        $status = new ReservaStatus('CONFIRMADO');
    }

    if ($_POST['status'] == ReservaStatus::PENDENTE) {
        $status = new ReservaStatus('PENDENTE');
    }

    if ($_POST['status'] == ReservaStatus::CANCELADO) {
        $status = new ReservaStatus('CANCELADO');
    }

    try {
        $reserva->setNome($_POST['nome']);
        $reserva->setNumero($_POST['numero']);
        $reserva->setPago($_POST['pago']);
        $reserva->setTotalPagar($_POST['valorTotal']);
        $reserva->setStatus($status);
        $reserva->setDescricao($_POST['descricao']);
        $reserva->setPrimeiroDia($_POST['primeiroDia']);
        $reserva->setUltimoDia($_POST['ultimoDia']);

        $bll->editar($reserva);

        header("location: ver.php?id={$reserva->getId()}");
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
    <title>Editar <?php echo $reserva->getNome(); ?></title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <div class="flex justify-center mt-14 h-screen p-2">
        <form method="POST">
            <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do cliente</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $reserva->getNome() ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de telefone</label>
                    <input type="text" id="numero" name="numero" value="<?php echo $reserva->getNumero(); ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="grid mb-6 md:gap-6 gap-2 md:grid-cols-3 grid-cols-2">
                <div>
                    <label for="pago" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor pago pelo cliente</label>
                    <input type="text" id="pago" name="pago" value="<?php echo $reserva->getPago(); ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="valorTotal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor cobrado</label>
                    <input type="text" id="valorTotal" name="valorTotal" value="<?php echo $reserva->getTotalPagar(); ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o Status</label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="PENDENTE" <?php if ($reserva->getStatus()->getValue() == 'PENDENTE') echo 'selected'; ?>>Pendente</option>
                        <option value="CANCELADO" <?php if ($reserva->getStatus()->getValue() == 'CANCELADO') echo 'selected'; ?>>Cancelado</option>
                        <option value="CONFIRMADO" <?php if ($reserva->getStatus()->getValue() == 'CONFIRMADO') echo 'selected'; ?>>Confirmado</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-6">
                <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                    <div>
                        <label for="primeiroDia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primeiro dia</label>
                        <input name="primeiroDia" id="primeiroDia" type="date" value="<?php echo $reserva->getPrimeiroDia(); ?>" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="primeiroDia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ultimo dia</label>
                        <input name="ultimoDia" id="ultimoDia" type="date" value="<?php echo $reserva->getUltimoDia(); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite aqui informações adicionais por exemplo: horário de devolução, data que vai pagar e entre outros ..." rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $reserva->getDescricao(); ?></textarea>
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