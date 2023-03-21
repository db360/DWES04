<!DOCTYPE html>
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
            {foreach $lista_productos as $producto}
                <tr>
                    <td class="id">{$producto->getId()}</td>
                    <td class="codigo">{$producto->getCod()}</td>
                    <td class="descripcion">{$producto->getDesc()}</td>
                    <td class="precio">{$producto->getPrecio()} €</td>
                    <td class="stock">{$producto->getStock()}</td>
                    <td class="operaciones">

                        <div class="btn-container btn-operaciones">
                            <form method="POST" action="{$rootpath}editarproducto?id={$producto->getId()}">
                                <a href="#">
                                    <button class="btn btn-editar" type="submit">Editar</button>
                                </a>
                            </form>
                            <form method="POST" action="{$rootpath}borrarproducto?id={$producto->getId()}">
                                <a href="#">
                                    <button class="btn btn-borrar" type="submit">Borrar!</button>
                                </a>
                            </form>
                        </div>
                    </td>
                <tr>
                {/foreach}
        </tbody>
    </table>
    <form class="nuevoProducto" action="{$rootpath}nuevoproducto" method="POST">
        <div class="btn-form">
            <button class="btn-nuevo w20" type="submit" name="submit">Nuevo Producto</button>
        </div>
    </form>
</body>

</html>