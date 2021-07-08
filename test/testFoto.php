<?php
include '../config/config.php';
include '../libraries/DB.php';
include '../models/Mascota.php';
include '../models/Foto.php';

//PRIMERA PRUEBA: recupera todas las fotos
echo "<h2>Recuperando las fotos...</h2>";
$fotos= Foto::get(); //recupera todas las fotos

//muestra una lista HTML con los datos
echo "<ul>";

foreach($fotos as $foto)
    echo "<li>$foto</li>";
echo "</ul>";

//SEGUNDA PRUEBA: recuperar una por su id
echo "<h2>Recuperando una foto por su id (3)...</h2>";

$foto= Foto::getById(3);

echo $foto? $foto : "<p>Esta mascota no existe</p>";

//4a PRUEBA: GUARDAR
echo "<h2>Guardar una foto</h2>";

$foto= new Foto();

$foto->fichero= 'imagen.jpg';
$foto->ubicacion= 'Montseny';
$foto->idmascota= 3;

$foto->guardar();

echo $foto->id? "Foto con id $foto->id guardado" :
"<p>ERROR al guardar: ".DB::get()->error."<p>";


//5A PRUEBA: ACTUALIZAR
echo "<h2>Actualizar la foto $foto->id</h2>";

//cambiamos algunos datos
$foto->ubicacion= 'Gualba';

//actualizamos y mostramos si se pudo actualizar o no
echo $foto->actualizar() !== false? "<p>Actualización correcta.</p>" :
"<p>ERROR: ".DB::get()->error."</p>";

//recuperamos de nuevo el ejemplar de la BDD para comprobar los cambios
echo Foto::getById($foto->id);

//6A PRUEBA: BORRAR
echo "<h2>Borrar la foto $foto->id</h2>";

//intento borrar la foto y muestro si lo he conseguido o no
echo Foto::borrar($foto->id) !==false? "<p>Borrado realizado correctamente</p>" :
"<p>ERROR ".DB::get()->error."</p>";

//intento recuperar la foto para comprobar que ya no esta
echo Foto::getById($foto->id)? "<p>$$foto</p>" :
"<p>Foto $foto->id inexistente</p>";


//7A PRUEBA: FILTRADO
echo "<h2>Recuperando fotos cuya raza tenga persa...</h2>";

$fotos= Foto::getFiltered('raza', 'persa', 'nombre', 'DESC');

echo "<ul>";
foreach($fotos as $foto)
    echo "<li>$foto $foto->tipo $foto->raza $foto->nombre</li>";
echo "</ul>";

