<!DOCTYPE html>
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
                <h1 class="succes-title">{$errorguardar}</h1>                            .
                <a href="{$rooturl}/nuevoproducto">
                <form method="post">
                  <button type="submit" class="btn btn-nuevo succes-btn">Volver</button>
                </form>
                </a>
            </div>
        {/if}
        {if $success}
            <div class="resultado">
                <h1 class="succes-title">{$success}</h1>                            .
                <a href="{$rooturl}">
                    <button class="btn btn-nuevo succes-btn">Inicio</button>
                </a>
            </div>
        {/if}


        <form action="#" method="POST" {if $errorguardar != '' ||  $success != ''}class="hidden"{/if}>
        <h2 class="formsTitle">Editar Producto:</h2>
            <div class="campo campoNombre">
                <label for="cod">Código:</label>
                <input class="cod" type="text" id="cod" placeholder="Codigo..." name="cod" value="{$cod}">
            </div>

            <div class="campo">
                <label for="desc">Descripción:</label>
                <input placeholder="Descripción..." type="text" id="desc" id="desc" name="desc" value="{$desc}">
            </div>

            <div class="campo">
                <label for="precio">Precio:</label>
                <input placeholder="Precio..." type="number" id="precio" name="precio" step="0.01" value="{$precio}">
            </div>

            <div class="campo">
                <label for="stock">Stock:</label>
                <input placeholder="Stock..." type="number" id="stock" name="stock" value="{$stock}">
            </div>

            <button type="submit" value="submit" class="btn btn-nuevo w20" name="submit">Guardar</button>
            <div>
            </div>
        </form>
    </div>
</body>

</html>