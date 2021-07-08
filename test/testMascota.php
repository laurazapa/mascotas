<?php
include '../config/config.php';
include '../libraries/DB.php';
include '../models/Mascota.php';

//PRIMERA PRUEBA: recuperar todas las mascotas
echo "<h2>Recuperando mascotas...</h2>";
$mascotas= Mascota::get();

//muestra una lista HTML con los datos
echo "<ul>";
foreach($mascotas as $mascota)
    echo "<li>$mascota</li>";
echo "</ul>";

//SEGUNDA PRUEBA: recuperar por su id
echo "<h2>Recuperando mascota por su id (3)...</h2>";
$mascota= Mascota::getById(3);
echo $mascota? "<p>$mascota</p>" : "<p>Mascota inexistente";

//3a PRUEBA: recuperar por su id
echo "<h2>Recuperando mascota por su id (300)...</h2>";
$mascota= Mascota::getById(300);
echo $mascota? "<p>$mascota></p>" : "<p>Mascota inexistente";

//4a PRUEBA: GUARDAR
echo "<h2>Guardar</h2>";
$mascota= new Mascota();

//pone los valores a las propiedades (vendrían de un formulario)
// nombre, sexo, biografia, nacimiento,fallecimiento, user, idraza
$mascota->nombre= 'Boira';
$mascota->sexo= 'H';
$mascota->biografia= 'La perrita más buena del mundo';
$mascota->nacimiento= '1999-09-17';
$mascota->fallecimiento= NULL;
$mascota->user= 'albertito';
$mascota->idraza= 3;
$mascota->iduser= 3;

$mascota->guardar(); //guarda la mascota y se actualiza su ID

//comprueba si se pudo guardar o no, en caso de error se muestran los
//detalles
echo $mascota->id? "<p>Guardado correctamente con id: $mascota->id</p>" :
"<p>ERROR al guardar: ".DB::get()->error."<p>";

//prueba a recuperar el libro de la BDD para ver si realmente se guardó
echo Mascota::getById($mascota->id);


//5A PRUEBA: ACTUALIZAR
echo "<h2>Actualizar la mascota $mascota->id</h2>";

//cambiamos algunos datos
$mascota->nacimiento= '2000-09-09';
$mascota->user= 'berto';

//actualizamos y mostramos si se pudo actualizar o no
echo $mascota->actualizar() !== false? "<p>Actualización correcta.</p>" :
"<p>ERROR: ".DB::get()->error."</p>";

//recuperamos de nuevo la mascota de la BDD para comprobar los cambios
echo Mascota::getById($mascota->id);


//6A PRUEBA: BORRAR
echo "<h2>Borrar la mascota $mascota->id</h2>";

//intento borrar la mascota y muestro si lo he conseguido o no
echo Mascota::borrar($mascota->id) !==false? "<p>Borrado realizado correctamente</p>" :
"<p>ERROR ".DB::get()->error."</p>";

//intento recuperar la mascota para comprobar que ya no esta
echo Mascota::getById($mascota->id)? "<p>$mascota</p>" :
"<p>Mascota $mascota->id inexistente</p>";


//7A PRUEBA: FILTRADO
echo "<h2>Recuperando mascotas cuyo nombre tenga t...</h2>";

$mascotas= Mascota::getFiltered('nombre', 't', 'user', 'DESC');

echo "<ul>";
    foreach($mascotas as $mascota)
echo "<li>$mascota</li>";
echo "</ul>";

   