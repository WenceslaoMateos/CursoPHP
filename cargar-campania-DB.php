<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

if (isset($_REQUEST['nombreCamp']) && $_REQUEST['nombreCamp'] != "" && $_REQUEST['cargaBarcoCamp'] != ""){
    
    $nombre = $_REQUEST['nombreCamp'];
    $idbarco = $_REQUEST['cargaBarcoCamp'];
    $desc = $_REQUEST['descripcion'];
    $sql = mysqli_query($db, "  INSERT INTO campanias (nombre, idbarcos, descripcion) 
                                    VALUES ('$nombre', $idbarco, '$desc');");

    echo $sql;
}
echo $sql;
header("location: cargar-campania.php");
die();
?>