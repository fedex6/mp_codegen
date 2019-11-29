<!DOCTYPE html>
<html>
<head>
    <title>Generador de Codigos para MP->BruBank</title>
    <style type="text/css">
        @font-face {
            font-family: "CODE39";
            src: local("Code39FireRedA"), url("font/C39fira.TTF") format("truetype");
        }
            * { /*box-shadow: inset 0 0 0 1px red;*/ font-size: 20pt; font-family: 'Helvetica', 'Arial', sans-serif; }
            body { text-align: center; padding: 0; margin: 0; width: 100vw; background: #FFF; }
            input { width: 90vw; font-size: 30pt; }

            .codigo { font-family: "CODE39"; font-size: 30px; }
    </style>
</head>

<body>
    <?php
    switch($_POST['acc']){
        case 'Generar':
            $documento = str_pad($_POST['documento'], 8, "0", STR_PAD_LEFT);
            $separadores = array(",", ".");
            $valor = str_replace($separadores , '' , $_POST['monto']);

            $monto = str_pad($valor, 10, 0, STR_PAD_LEFT);
            ?>
            <!-- <span class="codigo">*9006220300<?php echo $documento.$monto.$_POST['token']; ?>00000O*</span>-->
            <img src="https://barcode.tec-it.com/barcode.ashx?data=9006220300<?php echo $documento.$monto.$_POST['token']; ?>00000O&code=&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0"/><br /><br />
            <strong>9006220300<?php echo $documento.$monto.$_POST['token']; ?>00000O</strong>

            <br /><br />
            <a href="?volver=1" target="_self">Volver al Inicio</a>
            <?php
            break;

        default:
            ?>
            <form method="POST">
                <label>Documento: </label><br />
                <input type="text" name="documento" value="" />

                <br /><br />
                <label>Monto: (coma o punto para dividir los decimales)</label><br />
                <input type="text" name="monto" value="0.00" />

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
</body>
</html>