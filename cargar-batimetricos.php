<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('templates/inicial/head.php');?>  
        <title>Carga de sensores</title>
    </head>
<body>
    <?php include('templates/online/header.php');?>  
    <main>
    <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h3 class="h3">Carga de nuevas campañas</h3>
                        <p>Aqui usted puede cargar nuevas campañas en el sistema.</p>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
    <div class="row justify-content-md-center">
        <?php
        if (!array_key_exists('Enviar',$_POST)) {
            ?>
            <form method="post" name="archivo" enctype="multipart/form-data">
    <div class="row justify-content-md-center">
                <table class="table">
                    <tr>
                        <td colspan="11">
                            <div class="checkbox">
                                <label><input type="checkbox" name="-Wc" value=" -Wc"> Curvas de nivel</label> 
                            </div>
                        </td>    
                    </tr>
                    <tr>
                        <td colspan="4"><input type="radio" name="-Q" value=" -Qm" checked> Grilla<br></td>
                        <td colspan="4"><input type="radio" name="-Q" value=" -Qs" checked> Superficie<br></td>
                        <td colspan="4"><input type="radio" name="-Q" value=" -Qi" checked> Imagen<br></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name=" -T" value=" -Tb" checked> BMP<br></td>
                        <td><input type="radio" name=" -T" value=" -Te" checked> EPS<br></td>
                        <td><input type="radio" name=" -T" value=" -TE" checked> EPS PageSize<br></td>
                        <td><input type="radio" name=" -T" value=" -Tf" checked> PDF<br></td>
                        <td><input type="radio" name=" -T" value=" -TF" checked> PDF multipagina<br></td>
                        <td><input type="radio" name=" -T" value=" -Tj" checked> JPEG<br></td>
                        <td><input type="radio" name=" -T" value=" -Tg" checked> PNG<br></td>
                        <td><input type="radio" name=" -T" value=" -TG" checked> PNG transparente<br></td>
                        <td><input type="radio" name=" -T" value=" -Tm" checked> PPM<br></td>
                        <td><input type="radio" name=" -T" value=" -Ts" checked> SVG<br></td>
                        <td><input type="radio" name=" -T" value=" -Tt" checked> TIFF<br></td>
                    </tr>
                    <tr>
                        <th>Adjuntar</th>
                        <td colspan="11"><input name="adjunto" type="file" accept=".tmp"></td>
                    </tr>
                </table>
                <input type="submit" class="btn btn-primary col-md-auto" name="Enviar" value="Enviar"></div>
            </form>
            <?php
        }   
        else{
            $filename= "map.pdf";
            $name = $_FILES['adjunto']['tmp_name']; 
            exec("grdview $name " .  $_POST["-Wc"] ." -B1a2 -BWSneZ+b+tBatimetrico -JM-57/-38/7i " . $_POST["-Q"] . " -JZ4i -P -p170/20 -Cseafloor2.cpt > map.ps");
            exec("psconvert -Tf -Z -A4 -E720 map.ps");
            header("Content-type: application/octet-stream");
            header("Content-disposition: attachment;filename=$filename");
            readfile($filename);
        }
            ?>
            </div></div>
        </main>
        <?php include('templates/inicial/footer.php');?>      
        <script>
            $('ul li:nth-child(4)').addClass('active');
            $('ul li:nth-child(4) a').addClass('active').append('<span class="sr-only">(current)</span>');
        </script>
    </body>
</html>
