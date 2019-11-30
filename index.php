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
    <br /><br />
    <h2>Generador de Codigo de Barras para pagos MP -> BruBank</h2>
    <br />
    <?php
    switch($_POST['acc']){
        case 'Generar':
            $documento = str_pad($_POST['documento'], 8, "0", STR_PAD_LEFT);
            $separadores = array(",", ".");
            $valor = str_replace($separadores , '' , $_POST['monto']);

            $monto = str_pad($valor, 10, 0, STR_PAD_LEFT);

            switch ($_POST['entidad']) {
                case 'uala':
                    ?>
                    <img src="https://barcode.tec-it.com/barcode.ashx?data=900620330000000<?php echo $documento; ?>000000O&code=&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0"/><br /><br />
                    <strong>900620330000000<?php echo $documento; ?>000000O
                    <?php
                    break;

                case 'brubank'
                    ?>
                    <img src="https://barcode.tec-it.com/barcode.ashx?data=9006220300<?php echo $documento.$monto.$_POST['token']; ?>00000O&code=&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0"/><br /><br />
                    <strong>9006220300<?php echo $documento.$monto.$_POST['token']; ?>00000O</strong>
                    <?php  
                default:
                    header('Location: ?select=1');
                    break;
            }
            ?>

            <br /><br />
            <a href="?volver=1" target="_self">Volver al Inicio</a>
            <?php
            break;

        default:
            ?>
            <script type="text/javascript">
                function setTwoNumberDecimal(el) {
                    el.value = parseFloat(el.value).toFixed(2);
                }
            </script>
            <form method="POST">
                <label>Documento: </label><br />
                <input type="text" name="documento" value="" />

                <br /><br />
                <label>Monto:</label><br />
                <input type="number" name="monto" step="0.01" onchange="javascript:setTwoNumberDecimal(this);" />

                <br /><br />
                <label>Token: (Solo BruBank) </label><br />
                <input type="radio" name="entidad" value="brubank" /> BruBank | 
                <input type="radio" name="entidad" value="uala" /> Ualá

                <br /><br />
                <label>Token: (Solo BruBank) </label><br />
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