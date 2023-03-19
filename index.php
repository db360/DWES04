<?php
namespace classes;

require_once('vendor/autoload.php');
require_once('conf.php');
require_once('src/Peticion.php');
require_once('src/conn.php');

require_once('src//model/Producto.php');

use classes\Producto;
use peticion\Peticion;

$producto = new Producto('AA42', 'Polla Gorda', 135.5, 5);
var_dump($producto);
var_dump(Producto::rescatar($pdo, 5));
echo "<pre>";
// var_dump($producto->guardar($pdo));
// var_dump($producto->rescatar($pdo, 9));
// var_dump($producto->listar($pdo, 6, 0));
var_dump(Producto::contar($pdo));
echo "</pre>";

// $pdo = connect();
// var_dump($pdo);

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
