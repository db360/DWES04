<?php
require_once(__DIR__.'/../conf.php');
/**
 * @return [object/null]
 */
function connect()
{
    $smarty = new \Smarty();

    try {

        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWD,);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET CHARACTER SET utf8");

        return $pdo;

    } catch (PDOException $e) {

        /* He capturado aquí el error que pueda surgir de la conexión a la basse de datos, si hay un error, se mostrará la plantilla de error, a la que mando el error que nos llega del try/catch y lo mostramos en la pantalla de error. */
        $smarty->assign('error', $e);
        $smarty->display('templates/error.tpl');
        die();
    } finally {
        $pdo = null;
    }

}