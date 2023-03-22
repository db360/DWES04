<?php

require_once(__DIR__ . '/../model/Producto.php');
require_once(__DIR__ . '/../Peticion.php');
require_once(__DIR__ . '/../../vendor/smarty/smarty/libs/Smarty.class.php');
require_once(__DIR__ . '/../../conf.php');

use classes\Producto;
use peticion\Peticion;


$smarty = new Smarty();


class Controladores
{
    /**
     * Controlador por defecto cuando se carga la ruta / o '' y el metodo HTTP es POST o GET;
     *
     * @param Peticion $peticion
     * @param PDO $pdo
     * @param Smarty $smarty
     *
     * @return [string]
     * @
     */
    public static function controladorDefecto(Peticion $peticion, PDO $pdo, Smarty $smarty)
    {

        if ($peticion->getMethod() == 'GET' || $peticion->getMethod() == 'POST') {
            $productos = Producto::listar($pdo, 30, 0);
            // var_dump($productos);
            $smarty->assign('lista_productos', $productos);
            $smarty->assign('rootpath', PATH);
            $smarty->display(TEMPLATE_DIR.'/lista_productos.tpl');
        }
    }

    /**
     * Controlador para el nuevo producto, se carga si el método es HTTP o POST, validamos el formulario al enviar, y si todo es correcto y no hay errores,, guardaremos el producto en la base de datos llamando al metodo guardar
     *
     * @param Peticion $peticion
     * @param PDO $pdo
     * @param Smarty $smarty
     *
     * @return [string]
     */
    public static function nuevoProducto(Peticion $peticion, PDO $pdo, Smarty $smarty)
    {
        if ($peticion->getMethod() == 'HTTP' || $peticion->getMethod() == 'POST') {

            $errores = array();
            $success = '';
            $errorGuardar = '';

            // Comprobar que las variables de POST existen
        if(isset($_POST['cod'], $_POST['desc'], $_POST['precio'], $_POST['stock'])) {
            $codigo = $_POST['cod'];
            $descripcion = $_POST['desc'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            // Validar los datos introducidos
            if(!isset($_POST['cod']) || empty($codigo)) {
                $errores[] = "El código del producto no puede estar vacío";
            }

            if(!isset($_POST['desc']) || empty($descripcion)) {
                $errores[] = "La descripción del producto no puede estar vacía";
            }

            if(!isset($_POST['precio']) || empty($precio)) {
                $errores[] = "El precio del producto no puede estar vacío";
            } elseif(!is_numeric($precio)) {
                $errores[] = "El precio del producto debe ser un número";
            }

            if(!isset($_POST['stock']) || empty($stock)) {
                $errores[] = "El stock del producto no puede estar vacío";
            } elseif(!is_numeric($stock)) {
                $errores[] = "El stock del producto debe ser un número";
            }

            // Si no hay errores, intentamos crear el producto
            if(empty($errores)) {

                $producto = new Producto($codigo, $descripcion, $precio, $stock, );

                    if($producto->guardar($pdo)) {
                        $idProducto = $producto->getId();
                        $success = 'El producto con ID '. $idProducto . ' ha sido correctamente guardado';
                    } else {
                        $errorGuardar = "El Código de producto existe, fallo al guardar el producto.";
                    };
            }
        }

        /* Asignamos las variables a la plantilla de smarty */
            $smarty->assign('success', $success);
            $smarty->assign('errores', $errores);
            $smarty->assign('errorguardar', $errorGuardar);
            $smarty->assign('path', PATH);
            $smarty->assign('rooturl', ROOT_URL);
            $smarty->display(TEMPLATE_DIR.'/nuevo_producto.tpl');

        }
    }
    /**
     * Controlador para editar el producto, si la ruta es /editarproducto y el metodo POST, si la id que rescatamos con el método rescatar de la clase Producto, accedemos a los datos del formulario y lo validaremos y guardaremos usando el método rescatar
     *
     * @param Peticion $p
     * @param PDO $pdo
     * @param Smarty $smarty
     *
     * @return [type]
     */
    public static function editarProducto(Peticion $peticion, PDO $pdo, Smarty $smarty){

       if ($peticion->getMethod() == 'POST'){

            $errores = array();
            $success = '';
            $errorGuardar = '';

            $idProducto = $_GET['id'];
            $prodEditable = Producto::rescatar($pdo, $idProducto);
            $cod = $prodEditable->getCod();
            $desc = $prodEditable->getDesc();
            $precio = $prodEditable->getPrecio();
            $stock = $prodEditable->getStock();

            if(isset($_POST['submit'])) {
                $cod = trim($_POST['cod']);
                $desc = trim($_POST['desc']);
                $precio = $_POST['precio'];
                $stock = $_POST['stock'];

                if(empty($cod)) {
                    $errores[] = 'El código es requerido';
                }
                if(empty($desc)) {
                    $errores[] = 'La descripción es requerida';
                }
                if(empty($precio) || $precio <= 0) {
                    $errores[] = 'El precio debe ser mayor a 0';
                }
                if(empty($stock) || $stock <= 0) {
                    $errores[] = 'El stock debe ser mayor a 0';
                }

                // Si no hay errores, actualizar registro
                if(empty($errores)) {
                    try {
                        $prodEditable->setCod($cod);
                        $prodEditable->setDesc($desc);
                        $prodEditable->setPrecio($precio);
                        $prodEditable->setStock($stock);
                        $prodEditable->guardar($pdo);

                        $success = 'Producto actualizado correctamente';
                    } catch (Exception $e) {
                        $errorGuardar = 'Error al actualizar el producto';
                    }
                }
            }


            $smarty->assign('success', $success);
            $smarty->assign('errores', $errores);
            $smarty->assign('errorguardar', $errorGuardar);
            $smarty->assign('path', PATH);
            $smarty->assign('rooturl', ROOT_URL);

            $smarty->assign('cod', $cod);
            $smarty->assign('desc', $desc);
            $smarty->assign('precio', $precio);
            $smarty->assign('stock', $stock);
            $smarty->display(TEMPLATE_DIR.'/editar_producto.tpl');

       }
    }
    /**
     * Controllador que actua en la ruta /borrarProducto y si el método es POST, rescatará el producto según la id que recibimos en GET, recuperamos sus valores con los métodos get de la clase producto, y si se confirma con el checkbox, borrará de la base de datos.
     * @param Peticion $p
     * @param PDO $pdo
     * @param Smarty $smarty
     *
     * @return [type]
     */
    public static function borrarProducto(Peticion $peticion, PDO $pdo, Smarty $smarty){
       if ($peticion->getMethod() == 'POST'){
            $errores = array();
            $success = '';
            $errorGuardar = '';

            $idProducto = $_GET['id'];
            $prodEditable = Producto::rescatar($pdo, $idProducto);
            $cod = $prodEditable->getCod();
            $desc = $prodEditable->getDesc();
            $precio = $prodEditable->getPrecio();
            $stock = $prodEditable->getStock();

            if(isset($_POST['borrar'])) {
                if(!isset($_POST['confirmar']) ) {
                    $errores = "Debe confirmar el borrado del producto";
                } else {

                 // Si no hay errores, actualizar registro
                if(empty($errores)) {
                    try {
                        $prodEditable->borrar($pdo, $idProducto);
                        $success = 'Producto borrado correctamente';
                    } catch (Exception $e) {
                        $errorGuardar = 'Error al borrar el producto';
                    }
                }
                }
            }
       }

       $smarty->assign('success', $success);
       $smarty->assign('errores', $errores);
       $smarty->assign('errorguardar', $errorGuardar);
       $smarty->assign('path', PATH);
       $smarty->assign('rooturl', ROOT_URL);

       $smarty->assign('cod', $cod);
       $smarty->assign('desc', $desc);
       $smarty->assign('precio', $precio);
       $smarty->assign('stock', $stock);
       $smarty->display(TEMPLATE_DIR.'/borrar_producto.tpl');

    }
}

?>