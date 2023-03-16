<?php

require_once('vendor/autoload.php');
require_once('conf.php');
require_once('src/Peticion.php');

use DWES04\Peticion;

$peticion = new Peticion();
$path = $peticion -> getPath();
$path = str_replace('/DWES04','',$path);


echo("<br>");
echo("<br>");

/* ROUTING */
switch ($path) {
    case '/nuevoproducto':
        echo('ROUTE /nuevoproducto');
        break;
    case '/borrarproducto':
        echo('ROUTE /borrarproducto');
        break;
    case '/editarproducto':
        echo('ROUTE /editarproducto');
        break;
    case '/':
    case ROOTPATH.'//':
        echo('ROUTE AL CONTROLADOR');
        break;
    default:
        echo("<br>");
        echo('RUTA ' . $path . ' NO EXISTENTE');
        break;
}

echo('<br>');
echo ('El valor del path es: ' . $path);
