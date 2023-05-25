<?php

require_once '../../BLL/ProdutoBLL.php';

use Model\Produto;
use BLL\ProdutoBLL;

$bll = new ProdutoBLL();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        $produto = new Produto();

        $produto->setNome($_POST['nome']);
        $produto->setValor($_POST['valor']);
        $produto->setEstoque($_POST['estoque']);

        $bll->inserir($produto);
    } catch (\PDOException $e) {
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


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body>
    
    <?php include_once "../components/navbar.php"; ?>


    <div class="flex justify-center mt-14 h-screen p-2">
        <form method="POST">
            <div class="mb-6">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Produto</label>
                <textarea id="nome" name="nome" placeholder="Digite aqui informações adicionais do produto por exemplo: nome, marca ..." rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?></textarea>
            </div>
            <div class="grid mb-6 md:gap-6 gap-2 grid-cols-2">
                <div>
                    <label for="valor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor da Unidade</label>
                    <input type="text" id="valor" name="valor" value="<?php echo isset($_POST['valor']) ? $_POST['valor'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="estoque" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantia em estoque</label>
                    <input type="number" id="estoque" name="estoque" value="<?php echo isset($_POST['estoque']) ? $_POST['estoque'] : ''; ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>