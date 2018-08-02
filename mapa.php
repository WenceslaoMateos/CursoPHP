<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Visor de Campañas</title>
        <?php include('templates/inicial/head.php');?>  
        <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
        <link rel="stylesheet" href="./css/mapa.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://openlayers.org/en/v4.6.5/build/ol.js"></script>
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    </head>
    <body>
        <?php include('templates/inicial/header.php');?>  
        <div class="row" style="margin-right: 0px;">
            <aside class="col-4">
            
            </aside>
            <div id="map" class="map col-8 mt-2"></div>
            <!--<a id="popup" tabindex="0" class="btn btn-lg btn-danger" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="asdfasdf"></a>-->     
        </div>
        <script src="./js/mapasHidrografia.js">/*Mapas de hidrografia*/</script>
        <script src="./js/mapasOpenmaps.js">/*Mapas de hidrografia*/</script>
        <script src="./js/mapa.js"></script>
        <?php include('templates/inicial/footer.php');?>  
    </body>
</html>