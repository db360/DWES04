<!DOCTYPE html>
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
    <div class="container  {if $errorguardar != '' ||  $success != ''}transparent{/if}">
        {if $errores}
            <ul>
                {foreach $errores as $error}
                    <li class="error">{$error}</li>
                {/foreach}
            </ul>
        {/if}
        {if $errorguardar}
            <div class="resultado">
                <h1 class="succes-title">{$errorguardar}</h1> .
                <a href="{$rooturl}/nuevoproducto">
                    <form method="post">
                        <button type="submit" class="btn btn-nuevo succes-btn">Volver</button>
                    </form>
                </a>
            </div>
        {/if}
        {if $success}
            <div class="resultado">
                <h1 class="succes-title">{$success}</h1> .
                <a href="{$rooturl}">
                    <button class="btn btn-nuevo succes-btn">Inicio</button>
                </a>
            </div>
        {/if}


        <form action="#" method="POST" {if $errorguardar != '' ||  $success != ''}class="hidden" {/if}>
            <h2 class="formsTitle">Editar Producto </h2>

            <div class="campo-borrar">
                <h4 for="desc">Codigo:</h4>
                <p>{$cod}</p>
            </div>
            <div class="campo-borrar">
                <h4 for="desc">Descripción:</h4>
                <p>{$desc}</p>
            </div>
            <div class="campo-borrar">
                <h4 for="precio">Precio:</h4>
                <p>{$precio} €</p>
            </div>
            <div class="campo-borrar">
                <h4 for="stock">Stock:</h4>
                <p>{$stock} unidades</p>
            </div>

            <form method="post">
                <label><input type="checkbox" id="confirmar" value="confirmar" name="confirmar">Sí, deseo borrar el producto</label><br>
                <div class="campo-borrar mt-4">
                    <a href="{$rooturl}/">
                        <button type="button" class="btn btn-nuevo" name="volver">Volver</button>
                    </a>
                    <a href="{$rooturl}/borrarproducto">
                        <button type="submit" class="btn btn-nuevo btn-borrar" name="borrar" value="borrar">Borrar</button>
                    </a>
            </form>
    </div>
    </form>
    </div>
</body>

</html>