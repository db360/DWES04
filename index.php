<?php
namespace classes;

use Controladores;

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/conf.php');
require_once(__DIR__ . '/src/Peticion.php');
require_once(__DIR__ . '/src/conn.php');
require_once(__DIR__ . '/src/model/Producto.php');


use classes\Producto;
use peticion\Peticion;

// echo "<pre>";
// var_dump($producto->guardar($pdo));
// var_dump($producto->rescatar($pdo, 9));
// var_dump($producto->listar($pdo, 6, 0));
// var_dump(Producto::contar($pdo));
// echo "</pre>";

// $pdo = connect();
// var_dump($pdo);

$peticion = new Peticion();
$smarty = new \Smarty();





/* También podríamos eliminar /DWES04 del path con la siguientes formas:
$pathNoRoot = str_replace('/DWES04', '', $path);
$pathNoRoot = preg_replace('/^\/DWES04/', '', $path);
*/
// echo ("<br>");
// echo($pathNoRoot);
// echo ("<br>");

var_dump($pdo);
if ($pdo === null) {
    // Error, no se puede conectar a la base de datos
} else {
    /* ROUTING */
    switch (PATH_NO_ROOT) {
        case '/':
        case ROOTPATH . '//':
            require_once 'src/controllers/Controladores.php';
            $controller = new Controladores();
            $controller->controladorDefecto($peticion, $pdo, $smarty);
            break;
        case '/nuevoproducto':
            require_once 'src/controllers/Controladores.php';
            $controller = new Controladores();
            $controller->nuevoProducto($peticion, $pdo, $smarty);
            break;
        case '/editarproducto':
            require_once 'src/controllers/Controladores.php';
            $controller = new Controladores();
            $controller->editarProducto($peticion, $pdo, $smarty);
            break;
        case '/borrarproducto':
            require_once 'src/controllers/Controladores.php';
            $controller = new Controladores();
            $controller->borrarProducto($peticion, $pdo, $smarty);
            break;

        default:
            echo ("<br>");
            echo ('RUTA ' . PATH . ' NO EXISTENTE');
            break;
    }
    // Continuar con la ejecución normal del programa
}


// echo ('<br>');
// echo ('El valor del path es: ' . $path);
// echo ('<br>');
// echo ('El valor del pathNoRoot es: ' . $pathNoRoot);