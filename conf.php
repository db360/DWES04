<?php
/* CONSTANTES */

require_once(__DIR__.'/src/Peticion.php');
use peticion\Peticion;

define('ROOTPATH', __DIR__);
define('TEMPLATE_DIR', __DIR__ . '\templates');
define('TEMPLATE_C_DIR', __DIR__ . '\templates_c');
define('CACHE', __DIR__ . '\cache');

$base_url = 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
define('ROOT_URL', $base_url);

$peticion = new Peticion();
define('PATH', $peticion->getPath());
$pathNoRoot = substr(PATH, strlen("/DWES04"));
define('PATH_NO_ROOT', $pathNoRoot);

/* También podríamos eliminar /DWES04 del path con la siguientes formas:
$pathNoRoot = str_replace('/DWES04', '', $path);
$pathNoRoot = preg_replace('/^\/DWES04/', '', $path);
*/
/* DB CONSTANSTS */
define ('DB_DSN','mysql:host=localhost;dbname=pedidos');
define ('DB_USER','root');
define ('DB_PASSWD','');
