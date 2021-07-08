<?php
//lista de directorios donde buscar las clases.
$classmap= ['controllers', 'models', 'libraries', 'templates'];

// TEMPLATE a usar en las vistas
define('TEMPLATE', 'Basic');
define('CSS_FILE', '/css/estilo.css');
define('JS_FILE', '/js/script.js');
define('JS_FILE_GALERIA', '/js/galeria.js');
define('FAVICON', '/imagenes/template/favicon.png');
define('PORTFOLIO', '/imagenes/portfolio.png');

//PARÁMETROS DE CONFIGURACIÓN BDD

//LOCAL
define('DB_HOST', 'localhost'); //host
define('DB_USER', 'root'); //usuario
define('DB_PASS', ''); //password
define('DB_NAME', 'mascotas'); //base de datos

/*
// REMOTO
define('DB_HOST', 'fdb32.awardspace.net'); //host
define('DB_USER', '3868372_mascotas'); //usuario
define('DB_PASS', 'lazapa1234'); //password
define('DB_NAME', '3868372_mascotas'); //base de datos
*/

define('DB_CHARSET', 'utf8'); //codificación

//conector que debe usar PDBO, solamente si hemos visto PDO además de
//mysqli
define('SGBD','mysql');

//CONTROLADOR Y MÉTODO POR DEFECTO
define('DEFAULT_CONTROLLER', 'Welcome');
define('DEFAULT_METHOD', 'index');

//OTROS PARÁMETROS
define('DEBUG', true);

//PARA EL ENVIO DE EMAIL DE CONTACTO
define('CONTACT_EMAIL', 'laura_90bcn@hotmail.com'); //a on s'envien els emails de contacte
//es a on es reben els emails que venen del formulari de contacte
