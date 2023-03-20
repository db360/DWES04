<?php
/* Smarty version 4.3.0, created on 2023-03-20 17:01:32
  from 'C:\xampp\htdocs\DWES04\templates\lista_productos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6418835c5a4540_54185135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb5c28310155a322e017e81d4fd37e19eef44f61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04\\templates\\lista_productos.tpl',
      1 => 1679327512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6418835c5a4540_54185135 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
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
                <div class="btn-container">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/editarproducto?id=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getId();?>
"><button class="btn btn-borrar">Borrar!</button></a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['rootpath']->value;?>
/borrarproducto?id=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getId();?>
"><button class="btn btn-editar">Editar</button></a>
                </div>
            </td>
            <tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</tbody>
	</table>
</body>
</html>
<?php }
}
