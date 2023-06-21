<?php

require_once '../../BLL/DespesaBLL.php';

use BLL\DespesaBLL;

$id = $_GET['id'];

$bll = new DespesaBLL();

$despesa = $bll->buscar($id);


if (isset($_POST['id'])) {
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
    <link rel="icon" type="image/png" href="/image/piscina.png" />


    <?php include_once "../includes/head.php"; ?>


</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <?php include_once "../components/navbar.php"; ?>



    <div class="flex justify-center mt-14 h-screen p-4">
        <div>
            <div class="flex space-x-2 mb-6">
                <a onclick="JavaScript:location.href='editar.php?id=' + <?php echo $despesa->getId(); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                    Editar
                </a>
                <form action="#" method="POST">
                    <input type="text" hidden value="<?php echo $despesa->getId(); ?>" name="id">
                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">
                        Deletar
                    </button>
                </form>
            </div>
            <div class="md:flex md:justify-between md:space-x-8 mb-6">
                <div>
                    <h1 class="block text-2xl font-medium text-gray-900 dark:text-white">
                        <?php echo $despesa->getDescricao();  ?>
                    </h1>
                </div>


            </div>
            <div class="md:flex md:justify-between md:space-x-8 mb-6">
                <div>
                    <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                        <span class="font-medium">Data da Despesa: </span><?php echo $despesa->getDataF();  ?>
                    </h1>
                </div>
                <div>
                    <h1 class="block mb-2 text-base font-normal text-gray-900 dark:text-white">
                        <span class="font-medium">Valor: </span><?php echo $despesa->getValor();  ?>
                    </h1>
                </div>
            </div>

        </div>
    </div>

    <?php include_once "../includes/body.php"; ?>


</body>

</html>