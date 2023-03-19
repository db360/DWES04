<?php
require_once(__DIR__.'/../conf.php');
function connect()
{
    try {

        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWD,);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET CHARACTER SET utf8");

        return $pdo;

    } catch (PDOException $e) {

        die('ERROR: ' . $e->getMessage());

    } finally {
        $pdo = null;
    }

}