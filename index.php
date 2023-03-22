<?php
/**
 * @author David Martínez de la Torre
 * Github: @db360
*/
namespace classes;

use Controladores;

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/conf.php');
require_once(__DIR__ . '/src/Peticion.php');
require_once(__DIR__ . '/src/conn.php');
require_once(__DIR__ . '/src/model/Producto.php');

use peticion\Peticion;


$peticion = new Peticion();
$smarty = new \Smarty();

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
