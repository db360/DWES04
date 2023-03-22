<?php
/* Smarty version 4.3.0, created on 2023-03-22 11:02:42
  from 'C:\xampp\htdocs\DWES04\templates\error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641ad242245fc5_53808460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33c3ed2b7129d442d4ab1e8aedaeb5c46de95434' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04\\templates\\error.tpl',
      1 => 1679479339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641ad242245fc5_53808460 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error!</title>
    <link rel="stylesheet" href="src/styles/lista_productos.css">
</head>

<body>
    <div class="table-container">
    <h1 class="table-title red">Hubo un Error!</h1>
    <h4><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h4>
    </div>
</body>

</html><?php }
}
