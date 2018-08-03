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
        <form action="cargaCampaniasDB.php" method="post" name="archivo" enctype="multipart/form-data" class="col-sm-5 mt-5">
            <div class="custom-file mb-3">
                <input class="custom-file-input" name="camp[]" type="file" accept=".dat" multiple required id="input1">
                <label class="custom-file-label" for="input1">Adjuntar campañas...</label>
            </div>
            <div class="custom-file mb-3">
                <input class="custom-file-input" name="formato[]" type="file" accept=".txt" multiple required id="input2">
                <label class="custom-file-label" for="input2">Adjuntar formatos...</label>
            </div>
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
            <input class="btn btn-primary ml-5" type="submit" name="Enviar" value="Enviar">
        </form>
    </main>
    <?php include('templates/inicial/footer.php');?>      
    <script>
        $('ul li:nth-child(2)').addClass('active');
        $('ul li:nth-child(2) a').addClass('active').append('<span class="sr-only">(current)</span>');

        $(document).ready(function(){
            $('#barco').on('change',function(){
                var barco = $(this).val();
                if (barco){
                    $.ajax({
                        type:'POST',
                        url:'/Servidor/CursoPHP/TrabajoFInal/TrabajoFinalPHP/ajaxData.php',
                        data:{
                            barco: barco
                        },
                        success:function(html){
                            $('#campania').html(html); 
                        }
                    }); 
                }
            });
        });
    </script>
    </body>
</html>