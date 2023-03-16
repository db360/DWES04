<?php

define('ROOTPATH', __DIR__);
define('TEMPLATE_DIR', __DIR__ . '\templates');
define('TEMPLATE_C_DIR', __DIR__ . '\templates_c');
define('CACHE', __DIR__ . '\cache');

/* DB CONSTANSTS */
define ('DB_DSN','mysql:host=localhost;dbname=pedidos');
define ('DB_USER','root');
define ('DB_PASSWD','');

echo ("<br>");
echo("ROOTPATH " .ROOTPATH);
echo ("<br>");
echo("TEMPLATE_DIR " .TEMPLATE_DIR);
echo ("<br>");
echo("TEMPLATE_C_DIR " .TEMPLATE_C_DIR);
echo ("<br>");
echo(CACHE);
echo ("<br>");