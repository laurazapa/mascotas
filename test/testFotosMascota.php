<?php
include '../config/config.php';
include '../libraries/DB.php';
include '../models/Mascota.php';
include '../models/Foto.php';


//PRUEBA: recuperar una mascota por su id y recuperar sus fotos
echo "<h2>Recuperando mascota por su id (1)...</h2>";
$mascota= Mascota::getById(1);
echo $mascota? "<p>$mascota</p>" : "<p>Mascota inexistente";

$fotos= $mascota->getFotos();

foreach($fotos as $foto){
    echo "<figure>";
        echo "<img src='../imagenes/mascotas/$foto->fichero' alt='$foto->nombre'>";
        echo "<figcaption>$foto->nombre ($foto->tipo $foto->raza)</figcaption>";
    echo "</figure>";
}






