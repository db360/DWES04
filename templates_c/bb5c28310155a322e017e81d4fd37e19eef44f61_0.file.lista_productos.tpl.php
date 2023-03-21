<?php
/* Smarty version 4.3.0, created on 2023-03-21 19:02:24
  from 'C:\xampp\htdocs\DWES04\templates\lista_productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6419f130c88cb0_36636154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb5c28310155a322e017e81d4fd37e19eef44f61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04\\templates\\lista_productos.tpl',
      1 => 1679421738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6419f130c88cb0_36636154 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="src/styles/lista_productos.css">
</head>

<body>
    <h1 class="table-title">Lista de Productos</h1>
    <table class="table-container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista_productos']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
                <tr>
                    <td class="id"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getId();?>
</td>
                    <td class="codigo"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getCod();?>
</td>
                    <td class="descripcion"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getDesc();?>
</td>
                    <td class="precio"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getPrecio();?>
 €</td>
                    <td class="stock"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getStock();?>
</td>
                    <td class="operaciones">

                        <div class="btn-container btn-operaciones">
                            <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
editarproducto?id=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getId();?>
">
                                <a href="#">
                                    <button class="btn btn-editar" type="submit">Editar</button>
                                </a>
                            </form>
                            <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
borrarproducto?id=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getId();?>
">
                                <a href="#">
                                    <button class="btn btn-borrar" type="submit">Borrar!</button>
                                </a>
                            </form>
                        </div>
                    </td>
                <tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <form class="nuevoProducto" action="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
nuevoproducto" method="POST">
        <div class="btn-form">
            <button class="btn-nuevo w20" type="submit" name="submit">Nuevo Producto</button>
        </div>
    </form>
</body>

</html><?php }
}
