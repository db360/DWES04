<?php
/* Smarty version 4.3.0, created on 2023-03-21 21:36:51
  from 'C:\xampp\htdocs\DWES04\templates\borrar_producto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641a1563cb6356_76268008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf591c150d5109e9f46f2a38df8271fab26a983f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04\\templates\\borrar_producto.tpl',
      1 => 1679431011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641a1563cb6356_76268008 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link rel="stylesheet" href="src/styles/lista_productos.css">
    <link rel="stylesheet" href="src/styles/nuevo_producto.css">
    <link rel="stylesheet" href="src/styles/borrar_producto.css">
</head>

<body>
    <div class="container  <?php if ($_smarty_tpl->tpl_vars['errorguardar']->value != '' || $_smarty_tpl->tpl_vars['success']->value != '') {?>transparent<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['errores']->value) {?>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errores']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                    <li class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['errorguardar']->value) {?>
            <div class="resultado">
                <h1 class="succes-title"><?php echo $_smarty_tpl->tpl_vars['errorguardar']->value;?>
</h1> .
                <a href="<?php echo $_smarty_tpl->tpl_vars['rooturl']->value;?>
/nuevoproducto">
                    <form method="post">
                        <button type="submit" class="btn btn-nuevo succes-btn">Volver</button>
                    </form>
                </a>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
            <div class="resultado">
                <h1 class="succes-title"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</h1> .
                <a href="<?php echo $_smarty_tpl->tpl_vars['rooturl']->value;?>
">
                    <button class="btn btn-nuevo succes-btn">Inicio</button>
                </a>
            </div>
        <?php }?>


        <form action="#" method="POST" <?php if ($_smarty_tpl->tpl_vars['errorguardar']->value != '' || $_smarty_tpl->tpl_vars['success']->value != '') {?>class="hidden" <?php }?>>
            <h2 class="formsTitle">Editar Producto </h2>

            <div class="campo-borrar">
                <h4 for="desc">Codigo:</h4>
                <p><?php echo $_smarty_tpl->tpl_vars['cod']->value;?>
</p>
            </div>
            <div class="campo-borrar">
                <h4 for="desc">Descripción:</h4>
                <p><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</p>
            </div>
            <div class="campo-borrar">
                <h4 for="precio">Precio:</h4>
                <p><?php echo $_smarty_tpl->tpl_vars['precio']->value;?>
 €</p>
            </div>
            <div class="campo-borrar">
                <h4 for="stock">Stock:</h4>
                <p><?php echo $_smarty_tpl->tpl_vars['stock']->value;?>
 unidades</p>
            </div>

            <form method="post">
                <label><input type="checkbox" id="confirmar" value="confirmar" name="confirmar">Sí, deseo borrar el producto</label><br>
                <div class="campo-borrar mt-4">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rooturl']->value;?>
/">
                        <button type="button" class="btn btn-nuevo" name="volver">Volver</button>
                    </a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rooturl']->value;?>
/borrarproducto">
                        <button type="submit" class="btn btn-nuevo btn-borrar" name="borrar" value="borrar">Borrar</button>
                    </a>
            </form>
    </div>
    </form>
    </div>
</body>

</html><?php }
}
