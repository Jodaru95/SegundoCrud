<?php
    session_start();
    
    require '../vendor/autoload.php';
    use Clases\Articulos;

    $articulos=new Articulos();
    $misArticulos=$articulos->devolverTodos();
    $articulos=null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Inicio</title>
</head>
<body style="background-color: #0F6AD4;">
<?php
    require 'resource/navbar.php';
?>
    <div class="container mt-3">
        <?php
            require 'resource/mensajes.php';
        ?>
        <a href="crearArticulo.php" class="btn btn-success my-3 "><i class="fas fa-plus"></i> Nuevo Articulo</a>
        <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">PvP</th>
            <th scope="col">Stock</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($fila=$misArticulos->fetch(PDO::FETCH_OBJ)){
                echo <<< TXT
                <tr>
                    <th scope="row">{$fila->id}</th>
                    <td>{$fila->nombre}</td>
                    <td>{$fila->pvp}</td>
                    <td>{$fila->stock}</td>
                    <td>
                        <form name='as' method='POST' class='form-inline' action='borrarArticulo.php'>
                            <a href='editarArticulo.php?id={$fila->id}' class='btn btn-warning'>Editar</a>&nbsp
                            <input type="hidden" name="codigo" value="{$fila->id}">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            TXT;
            }
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>