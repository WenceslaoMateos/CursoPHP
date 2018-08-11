<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

$sql = mysqli_query($db, 'SELECT campanias.id, campanias.nombre, barcos.nombre AS barco, descripcion FROM campanias INNER JOIN barcos ON campanias.idbarcos = barcos.id ORDER BY barco ASC;');
$camp_listado="";
if($sql){
    while($camp = mysqli_fetch_array($sql)){
        $camp_listado .= '
        <tr>
        <td>' . $camp['id'] . '</td>
        <td>' . $camp['nombre'] . '</td>
        <td>' . $camp['barco'] . '</td>
        <td>' . $camp['descripcion'] . '</td>
        <td>
        <a href="editar-campania-DB.php?id=' . $camp['id'] . '" class="btn btn-primary">Editar</a>
        <a href="borrar-campania.php?id=' . $camp['id'] . '" class="btn btn-warning">Borrar</a>
        </td>
        </tr>
        ';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('templates/inicial/head.php');?>  
        <title>Edicion de Campañas</title>
    </head>
    <body>
    <?php include('templates/online/header.php');?>  
        <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h3 class="h3">Carga de nuevas mediciones</h3>
                        <p>Aqui usted puede cargar nuevos mediciones en el sistema. Recuerde que el archivo de mediciones debe ir acompañado de un archivo de tipos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>Campañas</h1>
                </div>
                <div class="col-6 mt-2">
                    <a href="cargar-campania.php" class="btn btn-primary">Agregar nueva</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Barco</th>
                                <th>Descripción</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $camp_listado;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include('templates/inicial/footer.php');?>      
    </body>
</html>