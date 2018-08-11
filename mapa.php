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
        <?php include('templates/online/header.php');?>  
        <div class="row" style="margin-right: 0px;">
            <aside class="col-4">
                <form action="buscaDatosDB.php" method="post" name="filtro" enctype="multipart/form-data" class=" mt-5">
                    <div class="mb-3">
                        <select class="form-control" name="barco" require id="barco">
                            <option value="">Seleccione un barco</option>
                            <?php
                            $barcos = mysqli_query($db, "SELECT * FROM barcos;");
                            if(mysqli_num_rows($barcos) > 0){
                                while($barco = mysqli_fetch_assoc($barcos)){
                                    echo '<option value="' . $barco['id'] . '">' . $barco['nombre'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="campania" id="campania" require>
                            <option value="">Seleccione una campaña</option>
                        </select>
                    </div>
                    <button class="btn btn-primary ml-5" name="Enviar" value="Enviar" id="enviar">Filtrar</button>
                </form>            
            </aside>
            <div id="map" class="map col-8 mt-2"></div>
            <!--<a id="popup" tabindex="0" class="btn btn-lg btn-danger" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="asdfasdf"></a>-->     
        </div>
        <script src="./js/mapasHidrografia.js">/*Mapas de hidrografia*/</script>
        <script src="./js/mapasOpenmaps.js">/*Mapas de hidrografia*/</script>
        <script src="./js/mapa.js"></script>
        <?php include('templates/inicial/footer.php');?>  
        <script>
            $('ul li:nth-child(1)').addClass('active');
            $('ul li:nth-child(1) a').addClass('active').append('<span class="sr-only">(current)</span>');
        </script>
    </body>
</html>