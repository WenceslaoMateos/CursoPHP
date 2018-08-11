<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

$sql = mysqli_query($db, 'SELECT * FROM usuarios;');
$usr_listado="";
if($sql){
    while($usuario = mysqli_fetch_array($sql)){
        $usr_listado .= '
        <tr>
        <td>' . $usuario['id'] . '</td>
        <td>' . $usuario['nombre'] . '</td>
        <td>' . $usuario['apellido'] . '</td>
        <td>' . $usuario['email'] . '</td>
        <td>
        <a href="editar-usuarios-DB.php?id=' . $usuario['id'] . '&confirma=no" class="btn btn-primary">Editar</a>
        <a href="borrar-usuario.php?id=' . $usuario['id'] . '" class="btn btn-warning">Borrar</a>
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
        <title>Edicion de Usuarios</title>
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
                    <h1>Usuarios</h1>
                </div>
                <!--<div class="col-6 mt-2">
                    <a href="cargar-campania.php" class="btn btn-primary">Agregar nuevo</a>
                </div>-->
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php echo $usr_listado;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include('templates/inicial/footer.php');?>      
    </body>
</html>