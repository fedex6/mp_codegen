<!----------------------------------------------------------------------#
#                                                                       #
#   GENERADOR DE CODIGOS DE BARRA PARA PASAR DINERO DE MercadoPago A    #    
#   UALA o BRUBANK                                                      #
#                                                                       #
#   Nacido en el Grupo de Telegram: Banca Digital Argentina             #
#   ( https://t.me/BancaArg )                                           #
#                                                                       #
#   Todas las sugerencias seran siempre bienvenidas. Gracias !          #
#                                                                       #
#   Hecho por @fedex6                                                   #
#                                                                       #
#----------------------------------------------------------------------->

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
    <link href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/886cb61438.js" crossorigin="anonymous"></script>
    <style type="text/css">
            * { font-size: 18pt; font-family: 'Sulphur Point', sans-serif; }
            body { text-align: center; padding: 0; margin: 0; width: 100vw; background: url('background.png'); background-color: #262241; }
            input { width: 50vw; font-size: 24pt; }
            small { font-size: 10pt; line-height: 11pt; }
            footer{ font-size: 8pt; margin-top: 15px; }
            h1 { padding: 0; margin: 10px; line-height: 19pt;}
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

            .info {
                font-family: 'Inconsolata', monospace;
                width: 50vw;
                background: #ff5b4f;
                color: #FFF;
                margin: 20px auto;
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

            .destacado {
                font-family: 'Inconsolata', monospace;
                font-size: 12pt;
                line-height: 13pt;
                margin: 0px;
                padding: 0px;
                font-weight: bold;
            }

            .detalle {
                font-family: 'Inconsolata', monospace;
                font-size: 11pt;
                line-height: 12pt;
                margin: 0px;
                padding: 0px;
            }

            .izquierda{ text-align: left; }
            .small { font-size: 10pt; line-height: 11pt; }
    </style>
</head>

<body>
    <img src="logo.png?date=<?php echo date('YmdHis'); ?>" />
    <div class="container">
        
        <h2>Generador de Codigo de Barras</h2>
        <?php
        
        switch(limpiar($_POST['acc'])){
            case 'Generar':
                $documento = str_pad(limpiar($_POST['documento']), 8, "0", STR_PAD_LEFT);
                $monto = str_pad(limpiar($_POST["monto"]), 10, 0, STR_PAD_LEFT);
                $token = limpiar($_POST['token']);

                switch (limpiar($_POST['entidad'])) {
                    /*
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
                    */
                    case 'naranjaX':
                        ?>
                        <h1>Naranja X</h1>
                        <img src="https://barcode.tec-it.com/barcode.ashx?data=90062350<?php echo $documento.date('Ymd'); ?>00000000000O&code=&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0"/><br /><br />
                        <strong>90062350<?php echo $documento.date('Ymd'); ?>00000000000O</strong>
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
                    
                    <!--
                    <br />
                    <label>Monto:</label><br />
                    <input type="number" name="monto" step="0.01" onchange="javascript:setTwoNumberDecimal(this);" />
                    -->

                    <br />
                    <label>Entidad: <span style="color: red;">*</span></label>
                    <input type='hidden' name="entidad" value='naranjaX' />
                    <span style="font-weight: bold;">Naranja X</span><br />
                    <small>( Solo se permite 1 pago por dia desde Mercado Pago al mismo DNI. )</small>

                    <!-- 
                    <input type="radio" name="entidad" value="brubank" style="width: 26px !important; height: 30px;" /> BruBank | 
                    <input type="radio" name="entidad" value="uala" style="width: 26px !important; height: 30px;"/> Ualá

                    <br /><br />
                    <label>Token: (Solo BruBank) </label><br />
                    <input type="text" name="token" value="" />
                     -->
                    <br /><br />
                    <input type="submit" name="acc" value="Generar" />
                </form>
                <?php
                break;
        }
        
        ?>

        <div class="info">
            <h1>INFORMACION IMPORTANTE</h1>
            <span class="destacado">
                El sitio no almacena ningun tipo de dato.<br />
                El codigo se puede ver en el repositorio de GitHub
            </span>

            <br /><br />

            <div class="izquierda">     
                <span class="detalle">
                    MercadoPago bloqueo el m&eacute;todo para poder transferir pagando como si fuese un servicio a Brubank o Ual&aacute;. Si llega a aparecer un m&eacute;todo similar, actualizaremos este generador.
                    <br />
                    Fue bueno mientras dur&oacute; (2 d&iacute;as ?).
                </span>
            </div>

        </div>

        <span class="destacado izquierda">
            Gracias a todos, especialmente a <i class="fab fa-telegram-plane small"></i> Gonza que fue al primero que vi pasar el dato, y a <i class="fab fa-telegram-plane small"></i> Mat&iacute;as que me va pasando la data para hacer esto. :)
        </span><br />

        <div align="center" style="width: 100%">
            <table cellspacing="4px">
                <tr valign="top">
                    <td align="center" bgcolor="4f6cff" style="padding-right: 5px; padding-left: 5px;">
                        <span class="small" style="color:#FFF;">Grupos en </span><br />
                        <i class="fab fa-telegram-plane" style="font-size: 22pt; color: #FFF;"></i>
                    </td>
                    <td>
                        <a href="https://t.me/BancaArg" target="_blank" style="text-decoration: none; color: #4f6cff; font-size: 11pt;">&bull; Banca Digital Argentina</a>
                        <br />
                        <a href="https://t.me/joinchat/N8OS8RQfcyqm-0eZSuAfkQ" target="_blank" style="text-decoration: none; color: #4f6cff; font-size: 11pt;">&bull; Bancos Digitales Argentina</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <footer style="text-align: center; width: 50vw; margin: 5px auto;">
        <table width="100%">
            <tr valign="top">
                <td>
                    <a href="https://github.com/fedex6/mp_codegen" target="_new" style="text-decoration: none;"><img src="github.png" height="20px"></a>
                </td>
                <td>
                    <span style="color: #FFF; font-size: 8pt;">&copy; Poio <?php echo date('Y'); ?> - <a href="https://t.me/fedex6" style="text-decoration: none; color: #4f6cff; font-size: 8pt" target="_blank"><i class="fab fa-telegram-plane" style="font-size: 8pt;"></i> Fedex</a></span>
                </td>
                <td>
                    <a href="https://cloudflare.com" target="_new" style="text-decoration: none;"><img src="https://www.cloudflare.com/media/images/web-badges/cf-web-badges-f-4.png" /></a>
                </td>
            </tr>
        </table>
    </footer>
    
    </body>
</html>