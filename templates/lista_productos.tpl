<html>
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
        {foreach $lista_productos as $producto}
            <tr>
            <td class="id">{$producto->getId()}</td>
            <td class="codigo">{$producto->getCod()}</td>
            <td class="descripcion">{$producto->getDesc()}</td>
            <td class="precio">{$producto->getPrecio()} €</td>
            <td class="stock">{$producto->getStock()}</td>
            <td class="operaciones">
                <div class="btn-container">
                    <a href="{$rootpath}/editarproducto?id={$producto->getId()}"><button class="btn btn-borrar">Borrar!</button></a>
                    <a href="{$rootpath}/borrarproducto?id={$producto->getId()}"><button class="btn btn-editar">Editar</button></a>
                </div>
            </td>
            <tr>
        {/foreach}
		</tbody>
	</table>
</body>
</html>
