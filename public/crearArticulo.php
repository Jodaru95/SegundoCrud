<?php
    session_start();
    require '../vendor/autoload.php';
    use Clases\Articulos;
    

    if(isset($_POST['crear'])){
        //Procesado de datos
        $nombre=trim($_POST['nombre']);
        $pvp=trim($_POST['pvp']);
        $stock=trim($_POST['stock']);
        //Comprobamos que nombre no este vacío
        if(strlen($nombre)==0){
            $_SESSION['mensaje']="Rellene el campo!!!";
            header("Location:{$_SERVER['PHP_SELF']}");
            die();
        }
        //Comprobamos que pvp no este vacio
        if(strlen($pvp)==0){
            $_SESSION['mensaje']="Rellene el campo!!!";
            header("Location:{$_SERVER['PHP_SELF']}");
            die();
        }
        //Comprobamos que stock no este vacio
        if(strlen($stock)==0){
            $_SESSION['mensaje']="Rellene el campo!!!";
            header("Location:{$_SERVER['PHP_SELF']}");
            die();
        }
        //si pasamos de aqui, los campos no son vacios asi que guardamos los datos
        $esteArticulo=new Articulos();
        if(!$esteArticulo->existeArticulo(ucwords($nombre))){
            //ahora añadimos los datos en el articulo
            $esteArticulo->setNombre($nombre);
            $esteArticulo->setPvp($pvp);
            $esteArticulo->setStock($stock);
            $esteArticulo->create();
            //seteamos $esteArticulo a null
            $esteArticulo=null;
            $_SESSION['mensaje']="Articulo creado correctamente";
            header('Location:inicio.php');
        }else{
            $_SESSION['mensaje']="El Articulo ya existe ";
            $esteArticulo=null;
            header("Location:{$_SERVER['PHP_SELF']}");
            die();
        }
    }else{
        //Pintado de formulario
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Nuevo Articulo</title>
</head>
<body style="background-color:#0F6AD4;">
    <?php
        require 'resource/navbar.php';
    ?>
    <h3 class="text-center mt-3">Crear Articulo</h3>
    <div class="container">
        <?php
            require 'resource/mensajes.php';
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="nt" method="POST">
            <div class="row mt-2">
                <label for="nombre"><b>Nombre del articulo:</b></label><br/>
                <input type="text" name="nombre" placeholder="Escribe..." required class="form-control mt-2 w-25" />
                <label for="pvp" class="mt-2"><b>PVP:</b></label>
                <input type="text" name="pvp" placeholder="Escribe..." required class="form-control mt-2 w-25"/>
                <label for="stock" class="mt-2"><b>Stock:</b></label>
                <input type="text" name="stock" placeholder="Escribe..." required class="form-control mt-2 w-25"/>
            </div>
            <div class="mt-2">
                <input type="submit" name="crear" value="Crear" class="btn btn-success mr-2" />
                <input type="reset" value="Limpiar" class="btn btn-warning" />
                <a href="inicio.php" class="btn btn-primary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    }//FINELSE
?>