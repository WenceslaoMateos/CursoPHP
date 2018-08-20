<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

if(isset($_REQUEST['desde']))
    $filtros_desde = $_REQUEST['desde'];
if(isset($_REQUEST['hasta']))
    $filtros_hasta = $_REQUEST['hasta'];
if(isset($_REQUEST['campania']))
    $filtros_campania = $_REQUEST['campania'];
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>

    </head>
    <body>
        <?php include('templates/online/header.php');?>  
            <main>
            <div class="row mr-0" style="height: 27rem;">
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
                        <div class="form-group">
                            <select class="form-control form-control-sm" name="campania" id="campania">
                                <option value="">Seleccione una campaña</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary ml-5 mb-3" name="agregar" value="agregar" id="agregar_camp">Agregar campaña</button>
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
                        <button type="button" class="btn btn-primary ml-5 mt-3" name="agregar" value="agregar" id="agregar_fecha">Agregar fecha</button>
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
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary ml-5 d-none" name="aplicar" value="aplicar" id="aplicar">Aplicar filtros</button>
                    </form>            
                </aside>
                <div id="map" class="map col-8 mt-2"></div>
                <div id="popup" class="ol-popup bg-secondary" style="display: none;">
                    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                    <div id="popup-content" class="text-white"></div>
                </div>
            </div>
        </main>
        <?php include('templates/inicial/footer.php');?>  
        <script>
            $('ul li:nth-child(1)').addClass('active');
            $('ul li:nth-child(1) a').addClass('active').append('<span class="sr-only">(current)</span>');
            var desde = '<?php if(!empty($filtros_desde)) echo serialize($filtros_desde);?>';
            var hasta = '<?php if(!empty($filtros_hasta)) echo serialize($filtros_hasta);?>';
            var campanias = '<?php if(!empty($filtros_campania)) echo serialize($filtros_campania);?>';
        </script>
        <script src="./js/mapasHidrografia.js">/*Mapas de hidrografia*/</script>
        <script src="./js/mapasOpenmaps.js">/*Mapas de hidrografia*/</script>
        <script src="./js/mapa.js"></script>
    </body>
</html>