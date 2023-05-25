<?php

require_once '../../BLL/ReservaBLL.php';

use MODEL\Reserva;
use BLL\ReservaBLL;
use Enum\ReservaStatus;


$bll = new ReservaBLL();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['status'] == ReservaStatus::CONFIRMADO) {
        $status = new ReservaStatus('CONFIRMADO');
    }

    if ($_POST['status'] == ReservaStatus::PENDENTE) {
        $status = new ReservaStatus('PENDENTE');
    }

    try {
        $reserva = new Reserva();
        $reserva->setNome($_POST['nome']);
        $reserva->setNumero($_POST['numero']);
        $reserva->setPago($_POST['pago']);
        $reserva->setTotalPagar($_POST['valorTotal']);
        $reserva->setStatus($status);
        $reserva->setDescricao($_POST['descricao']);
        $reserva->setPrimeiroDia($_POST['primeiroDia']);
        $reserva->setUltimoDia($_POST['ultimoDia']);

        $bll->inserir($reserva);

        header("location: lista.php");
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
    <title>Adicionar Reserva</title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

</head>

<body>

    <?php include_once "../components/navbar.php"; ?>

    <div class="flex justify-center mt-14 h-screen p-2">
        <form method="POST">
            <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do cliente</label>
                    <input type="text" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de telefone</label>
                    <input type="text" id="numero" name="numero" value="<?php echo isset($_POST['numero']) ? $_POST['numero'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="grid mb-6 md:gap-6 gap-2 md:grid-cols-3 grid-cols-2">
                <div>
                    <label for="pago" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor pago pelo cliente</label>
                    <input type="text" id="pago" name="pago" value="<?php echo isset($_POST['pago']) ? $_POST['pago'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="valorTotal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor cobrado</label>
                    <input type="text" id="valorTotal" name="valorTotal" value="<?php echo isset($_POST['valorTotal']) ? $_POST['valorTotal'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o Status</label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="PENDENTE" <?php if (isset($_POST['status']) && $_POST['status'] == 'PENDENTE') echo 'selected'; ?>>Pendente</option>
                        <option value="CONFIRMADO" <?php if (isset($_POST['status']) && $_POST['status'] == 'CONFIRMADO') echo 'selected'; ?>>Confirmado</option>
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                    <div>
                        <label for="primeiroDia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primeiro dia</label>
                        <input name="primeiroDia" id="primeiroDia" type="date" value="<?php echo isset($_POST['primeiroDia']) ? $_POST['primeiroDia'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="primeiroDia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ultimo dia</label>
                        <input name="ultimoDia" id="ultimoDia" type="date" value="<?php echo isset($_POST['ultimoDia']) ? $_POST['ultimoDia'] : ''; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite aqui informações adicionais por exemplo: horário de devolução, data que vai pagar e entre outros ..." rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo isset($_POST['descricao']) ? $_POST['descricao'] : ''; ?></textarea>
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>