<?php
include '../config/config.php';
include '../libraries/DB.php';
include '../models/Usuario.php';

//PRIMERA PRUEBA: recuperar todos
echo "<h2>Recuperando usuarios...</h2>";
$usuarios= Usuario::get();

//muestra una lista HTML con los datos
echo "<ul>";
foreach($usuarios as $usuario)
    echo "<li>$usuario</li>";
echo "</ul>";

//SEGUNDA PRUEBA: recuperar por su id
echo "<h2>Recuperando por su id (3)...</h2>";
$usuario= Usuario::getById(3);
echo $usuario? "<p>$usuario</p>" : "<p>Usuario inexistente";

//3a PRUEBA: recuperar por su id
echo "<h2>Recuperando por su id (300)...</h2>";
$usuario= Usuario::getById(300);
echo $usuario? "<p>$usuario></p>" : "<p>Usuario inexistente";


//4a PRUEBA: GUARDAR
echo "<h2>Guardar</h2>";
$usuario= new Usuario();

//pone los valores a las propiedades (vendrían de un formulario)
$usuario->user= 'Holita';
$usuario->pass= '1234';
$usuario->nombre= 'Hola';
$usuario->apellidos= 'adios';
$usuario->email= 'hola@adios.es';
$usuario->direccion= 'Calle Falsa';
$usuario->poblacion= 'Una';
$usuario->provincia= 'Esa';
$usuario->cp= '08037';

$usuario->guardar(); //guarda y se actualiza su ID

//comprueba si se pudo guardar o no, en caso de error se muestran los
//detalles
echo $usuario->id? "<p>Guardado correctamente con id: $usuario->id</p>" :
"<p>ERROR al guardar: ".DB::get()->error."<p>";

//prueba a recuperar la mascota de la BDD para ver si realmente se guardó
echo Usuario::getById($usuario->id);


//5A PRUEBA: ACTUALIZAR
echo "<h2>Actualizar el usuario $usuario->id</h2>";

//cambiamos algunos datos
$usuario->nombre= 'Holaaa';
$usuario->apellidos= 'Adioooos';

//actualizamos y mostramos si se pudo actualizar o no
echo $usuario->actualizar() !== false? "<p>Actualización correcta.</p>" :
"<p>ERROR: ".DB::get()->error."</p>";

//recuperamos de nuevo el libro de la BDD para comprobar los cambios
echo Usuario::getById($usuario->id);


//6A PRUEBA: BORRAR
echo "<h2>Borrar el usuario $usuario->id</h2>";

//intento borrar y muestro si lo he conseguido o no
echo Usuario::borrar($usuario->id) !==false? "<p>Borrado realizado correctamente</p>" :
"<p>ERROR ".DB::get()->error."</p>";

//intento recuperar el usuario para comprobar que ya no esta
echo Usuario::getById($usuario->id)? "<p>$usuario</p>" :
"<p>Usuario $usuario->id inexistente</p>";

//7A PRUEBA: FILTRADO
echo "<h2>Recuperando usuarios cuyo user tenga C...</h2>";

$usuarios= Usuario::getFiltered('user', 'c', 'nombre', 'DESC');

echo "<ul>";
foreach($usuarios as $usuario)
    echo "<li>$usuario</li>";
    echo "</ul>";
    




