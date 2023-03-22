<?php
/* Smarty version 4.3.0, created on 2023-03-22 12:25:14
  from 'C:\xampp\htdocs\DWES04\templates\editar_producto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641ae59a070690_34419348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32c495e3c68f5064c98709ce209b41f790c34fc4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04\\templates\\editar_producto.tpl',
      1 => 1679480157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641ae59a070690_34419348 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
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


        <form action="#" method="POST" <?php if ($_smarty_tpl->tpl_vars['errorguardar']->value != '' || $_smarty_tpl->tpl_vars['success']->value != '') {?>class="hidden"<?php }?>>
        <h2 class="formsTitle">Editar Producto:</h2>
            <div class="campo campoNombre">
                <label for="cod">Código:</label>
                <input class="cod" type="text" id="cod" placeholder="Codigo..." name="cod" value="<?php echo $_smarty_tpl->tpl_vars['cod']->value;?>
">
            </div>

            <div class="campo">
                <label for="desc">Descripción:</label>
                <input placeholder="Descripción..." type="text" id="desc" id="desc" name="desc" value="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
">
            </div>

            <div class="campo">
                <label for="precio">Precio:</label>
                <input placeholder="Precio..." type="text" id="precio" name="precio"value="<?php echo $_smarty_tpl->tpl_vars['precio']->value;?>
">
            </div>

            <div class="campo">
                <label for="stock">Stock:</label>
                <input placeholder="Stock..." type="text" id="stock" name="stock" value="<?php echo $_smarty_tpl->tpl_vars['stock']->value;?>
">
            </div>

            <button type="submit" value="submit" class="btn btn-nuevo w20" name="submit">Guardar</button>
            <div>
            </div>
        </form>
    </div>
</body>

</html><?php }
}
