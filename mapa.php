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
        <div class="row mr-0" style="min-height: 100vh;">
            <aside class="col-4">
                <form method="post" name="filtro" enctype="multipart/form-data" class=" mt-5">
                    <div class="mb-3 form-group">
                        <select class="form-control form-control-sm" name="barco" id="barco">
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
                    <div class="mb-3 form-group">
                        <select class="form-control form-control-sm" name="campania" id="campania">
                            <option value="">Seleccione una campaña</option>
                        </select>
                    </div>
                        <div class="row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Desde</label>
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="datetime-local" id="desde">
                            </div>
                        </div>
                        <div class="row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Hasta</label>
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="datetime-local" id="hasta">
                            </div>
                        </div>
                    <button type="button" class="btn btn-primary ml-5 mt-3" name="agregar" value="agregar" id="agregar">Agregar filtro</button>
                    <div class="form-group mt-3">
                        <table class="table table-striped table-bordered  table-sm" id="filtros_a_aplicar" name="filtros_a_aplicar" rows="3" readonly>
                            <thead class="thead-dark d-none" id="filtros_a_aplicar_head">
                                <tr>
                                    <td>Barco</td>
                                    <td>Campaña</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            <tbody class="d-none" id="filtros_a_aplicar_body">
                                <tr>
                                    <td>Desde: </td>
                                    <td>Hasta: </td>
                                    <td></td>
                                </tr>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary ml-5 d-none" name="aplicar" value="aplicar" id="aplicar">Aplicar filtros</button>
                </form>            
            </aside>
            <div id="map" class="map col-8 mt-2"></div>
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