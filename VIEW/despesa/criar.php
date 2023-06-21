<?php

require_once '../../BLL/DespesaBLL.php';

use Model\Despesa;
use BLL\DespesaBLL;

$bll = new DespesaBLL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $despesa = new Despesa();

        $despesa->setDescricao($_POST['descricao']);
        $despesa->setValor($_POST['valor']);
        $despesa->setData($_POST['data']);

        
         $bll->inserir($despesa);

         header("location: lista.php");
    } catch (Exception $e) {
        $errors = explode("\n", $e->getMessage());
    }
}
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Despesas</title>
    <link rel="icon" type="image/png" href="/image/piscina.png" />

    <?php include_once "../includes/head.php"; ?>

</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>

    <div class="flex justify-center mt-14 h-screen p-2">
        <form method="POST">
            <div class="mb-6">
                <label for="descricao"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite aqui a descrição de sua despesa " rows="4"
                    required
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo isset($_POST['descricao']) ? $_POST['descricao'] : ''; ?></textarea>
            </div>

            <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                <div>
                    <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor da
                        Despesa</label>
                    <input type="text" id="valor" name="valor"
                        value="<?php echo isset($_POST['valor']) ? $_POST['valor'] : ''; ?>" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="despesa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data da
                        Despesa
                    </label>
                    <input type="date" id="data" name="data"
                        value="<?php echo isset($_POST['data']) ? $_POST['data'] : ''; ?>" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>


            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

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