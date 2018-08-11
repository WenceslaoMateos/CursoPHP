<?php

$precisa_sesion = true;
$msg_error = 0;

require('templates/coneccion.php');

if (isset($_REQUEST['nombreBarco']) && $_REQUEST['nombreBarco'] != ""){
    
    $nombre = $_REQUEST['nombreBarco'];
    $usuario = mysqli_query($db, "  INSERT INTO barcos (nombre) 
                                    VALUES ('$nombre');");
}
header("location: ./cargar-barco.php");
die();
?>