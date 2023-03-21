<?php
/* Smarty version 4.3.0, created on 2023-03-21 14:37:06
  from 'C:\xampp\htdocs\DWES04\templates\nuevo_producto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6419b302b1e807_63653685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2490af7565bf682ba28a8c05dcf52aaab81461b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04\\templates\\nuevo_producto.tpl',
      1 => 1679405734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6419b302b1e807_63653685 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Producto</title>
    <link rel="stylesheet" href="src/styles/lista_productos.css">
    <link rel="stylesheet" href="src/styles/nuevo_producto.css">
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
                <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
          <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['errorguardar']->value) {?>
            <div class="resultado">
                <h1 class="succes-title"><?php echo $_smarty_tpl->tpl_vars['errorguardar']->value;?>
</h1>                            .
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
</h1>                            .
                <a href="<?php echo $_smarty_tpl->tpl_vars['rooturl']->value;?>
">
                    <button class="btn btn-nuevo succes-btn">Inicio</button>
                </a>
            </div>
        <?php }?>


        <form action="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
" method="POST" <?php if ($_smarty_tpl->tpl_vars['errorguardar']->value != '' || $_smarty_tpl->tpl_vars['success']->value != '') {?>class="hidden"<?php }?>>
        <h2 class="formsTitle">Añadir Nuevo Producto:</h2>
            <div class="campo campoNombre">
                <label for="cod">Código:</label>
                <input class="cod" type="text" id="cod" placeholder="Codigo..." name="cod">
            </div>

            <div class="campo">
                <label for="desc">Descripción:</label>
                <input placeholder="Descripción..." type="text" id="desc" id="desc" name="desc">
            </div>

            <div class="campo">
                <label for="precio">Precio:</label>
                <input placeholder="Precio..." type="number" id="precio" name="precio" step="0.01">
            </div>

            <div class="campo">
                <label for="stock">Stock:</label>
                <input placeholder="Stock..." type="number" id="stock" name="stock">
            </div>

            <button type="submit" value="submit" class="btn btn-nuevo w20" name="submit">Enviar</button>
            <div>
            </div>
        </form>
    </div>
</body>

</html><?php }
}
