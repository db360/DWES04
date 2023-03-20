<?php

require_once(__DIR__.'/../model/Producto.php');
require_once(__DIR__.'/../Peticion.php');
require_once(__DIR__.'/../../vendor/smarty/smarty/libs/Smarty.class.php');

use classes\Producto;
use peticion\Peticion;


$pdo = connect();
$smarty = new Smarty();

class Controladores {
    public static function controladorDefecto(Peticion $peticion, PDO $pdo, Smarty $smarty){
        if($peticion->getMethod() == 'GET' || $peticion->getMethod() == 'POST' ) {
            $productos = Producto::listar($pdo, 30, 0);
            // var_dump($productos);
            $smarty->assign('lista_productos', $productos);
            $smarty->display('templates/lista_productos.tpl');
        }
    }

    public static function nuevoProducto(Peticion $p, PDO $pdo, Smarty $smarty){

    }
    public static function editarProducto(Peticion $p, PDO $pdo, Smarty $smarty)
    {

    }
    public static function borrarProducto(Peticion $p, PDO $pdo, Smarty $smarty)
    {

    }
}

?>