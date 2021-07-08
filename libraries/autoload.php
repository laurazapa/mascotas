<?php
//FICHERO autoload.php

//función que usaremos para buscar las clases
function load($clase){
    global $classmap; //indicamos que use la variable global
    
    //para cada directorio de la lista
    foreach($classmap as $directorio){
        $ruta= "$directorio/$clase.php"; //calcula la ruta
        
        if(is_readable($ruta)){
            require_once $ruta;
            break;
        }
    }
}

//registrar la función autoload
spl_autoload_register("load");