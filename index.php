<!------------------------------------------#
#                                           #
#   GENERADOR DE CODIGOS DE BARRA PARA      # 
#   PASAR DINERO DE MercadoPago A           #
#   UALA o brubank                          #
#                                           #
#   Nacido en el Grupo de Telegram:         #
#   Banca Digital Argentina                 #
#   ( https://t.me/BancaArg )               #
#                                           #
#   Todas las sugerencias seran siempre     #
#   bienvenidas. Gracias !                  #
#                                           #
#   Hecho por @fedex6                       #
#                                           #
#------------------------------------------->

<?php 
//Funciones
function limpiar($raw){
    $simbolos = array(",", ".", ";", ":", "/", "*", "+", "-", "_", "%", "$", "#", "@", "!", "^", "&", "[", "]", "{", "}", "(", ")", "<", ">", "'", "|", "=", " ");
    $limpio = str_replace($simbolos, '', $raw);

    return $limpio;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Generador de Codigos para MP->BruBank</title>
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
    <style type="text/css">
            * { font-size: 18pt; font-family: 'Sulphur Point', sans-serif; }
            body { text-align: center; padding: 0; margin: 0; width: 100vw; background: url('background.png'); background-color: #262241; }
            input { width: 50vw; font-size: 24pt; }
            footer{ font-size: 8pt; margin-top: 15px; }
            h2 { padding: 0; margin: 0; }
            .container{
                width: 60vw;
                background: #FFF;
                margin: 5px auto;
                padding: 15px;
                    /* Borde Redondeado */
                    -webkit-border-radius: 10px;
                    -moz-border-radius: 10px;
                    border-radius: 10px;
                    /* Sombra */
                    -webkit-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.3);
                    -moz-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.3);
                    box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.3);
            }
    </style>
</head>

<body>
    <img src="logo.png">
    <div class="container">
        
        <h2>Generador de Codigo de Barras</h2>
        <?php
        switch(limpiar($_POST['acc'])){
            case 'Generar':
                $documento = str_pad(limpiar($_POST['documento']), 8, "0", STR_PAD_LEFT);
                $monto = str_pad(limpiar($_POST["monto"]), 10, 0, STR_PAD_LEFT);
                $token = limpiar($_POST['token']);

                switch (limpiar($_POST['entidad'])) {
                    case 'uala':
                        ?>
                        <h1>UALA</h1>
                        <img src="https://barcode.tec-it.com/barcode.ashx?data=900620330000000<?php echo $documento; ?>000000O&code=&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0"/><br /><br />
                        <strong>900620330000000<?php echo $documento; ?>000000O</strong>
                        <?php
                        break;
                    case 'brubank':
                        ?>
                        <h1>BRUBANK</h1>
                        <img src="https://barcode.tec-it.com/barcode.ashx?data=9006220300<?php echo $documento.$monto.$token; ?>00000O&code=&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0"/><br /><br />
                        <strong>9006220300<?php echo $documento.$monto.$token; ?>00000O</strong>
                        <?php  
                        break;
                        
                    case '':
                        echo '<span style="color: red;">* No seleccionaste Entidad</span>';
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

                    <br />
                    <label>Monto:</label><br />
                    <input type="number" name="monto" step="0.01" onchange="javascript:setTwoNumberDecimal(this);" />

                    <br />
                    <label>Entidad: <span style="color: red;">*</span></label>
                    <input type="radio" name="entidad" value="brubank" style="width: 26px !important; height: 30px;" /> BruBank | 
                    <input type="radio" name="entidad" value="uala" style="width: 26px !important; height: 30px;"/> Ualá

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
    </div>

    <footer style="text-align: center;">
        <a href="https://github.com/fedex6/mp_codegen" target="_new" style="text-decoration: none;"><img src="github.png" height="20px"></a>
        <br />
        <a href="https://cloudflare.com" target="_new" style="text-decoration: none;"><img src="https://www.cloudflare.com/media/images/web-badges/cf-web-badges-f-4.png" /></a>
        <br />
        <span style="color: #FFF; font-size: 8pt;">&copy; Poio <?php echo date('Y'); ?></span>
    </footer>

</body>
</html>