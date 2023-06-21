<?php function select($reservas)
{ ?>
    <label for="reserva" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione a reserva</label>
    <select id="reserva" name="reserva" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="0" >Faça sua escolha</option>
        <?php foreach ($reservas as $reserva) : ?>
            <option value="<?php echo $reserva->getId(); ?>"><?php echo "{$reserva->getNome()} - {$reserva->getPrimeiroDiaF()}" ?></option>
        <?php endforeach ?>
    </select>
<?php } ?>