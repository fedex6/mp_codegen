<?php

switch($_POST['acc']){
    case 'Generar':
        
        break;

    default:
        ?>
        <form method="POST">
            <label>Documento: </label><br />
            <input type="text" name="documento" value="" />

            <br /><br />
            <label>Monto: (coma o punto para dividir los decimales)</label><br />
            <input type="text" name="monto" value="" />

            <br /><br />
            <label>Token: </label><br />
            <input type="text" name="token" value="" />

            <br /><br />
            <input type="submit" name="acc" value="Generar" />
        </form>
        <?php
        break;
}

?>