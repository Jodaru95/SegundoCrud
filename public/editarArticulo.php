<?php
    session_start();
    if(!isset($_GET['id'])){
        header("Location:inicio.php");
        die();
    }
    require '../vendor/autoload.php';
    use Clases\Articulos;
    $id=$_GET['id'];
    $esteArticulo=new Articulos();
    $esteArticulo->setId($id);
    $articulo=$esteArticulo->read();

    if(isset($_POST['editar'])){
        //Me quedé aqui!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $n=trim($_POST['nombre']);
        $p=trim($_POST['pvp']);
        $s=trim($_POST['stock']);
        //comprobamos que los campos no esten vacíos
        if(strlen($n)==0){
            $_SESSION['mensaje']="Rellene el campo!!!";
            header("Location:{$_SERVER['PHP_SELF']}?id=$id");
            die();
        }
        if(strlen($p)==0){
            $_SESSION['mensaje']="Rellene el campo!!!";
            header("Location:{$_SERVER['PHP_SELF']}?id=$id");
            die();
        }
        if(strlen($s)==0){
            $_SESSION['mensaje']="Rellene el campo!!!";
            header("Location:{$_SERVER['PHP_SELF']}?id=$id");
            die();
        }
        //Confirmamos que se ha cambiado algo en el formulario
        if($articulo->nombre==ucwords($n) ){
            $_SESSION['mensaje']="No cambiaste el articulo.";
            $esteArticulo=null;
            header("Location:inicio.php");
            die();
        }
        
        //Comprobamos si el nombre del articulo existe ya en la base de datos
        if(!$articulo->existeArticulo(ucwords($n))){
            $articulo->setNombre(ucwords($n));
            $articulo->setPvp(ucword($p));
            $articulo->setStock(ucwords($s));
            $articulo->update();
            $_SESSION['mensaje']="El articulo se actualizó correctamente";
            header("Location:inicio.php");
        }else{
            $_SESSION['mensaje']="El articulo ya existe";
            $articulo=null;
            header("Location:{$_SERVER['PHP_SELF']}?id=$id");
            die();
        }
    }else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Editar Articulo</title>
</head>
<body style="background-color:#0F6AD4;">
    <?php
        require 'resource/navbar.php';
    ?>
    <h3 class="text-center mt-3">Editar Articulo</h3>
    <div class="container">
        <?php
            require 'resource/mensajes.php';
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']."?id=$id"; ?>" name="nt" method="POST">
            <div class="row mt-2">
                <label for="nombre"><b>Nombre del articulo:</b></label><br/>
                <input type="text" name="nombre" value="<?php echo $articulo->nombre;?>" required class="form-control mt-2 w-25" />
                <label for="pvp" class="mt-2"><b>PVP:</b></label>
                <input type="text" name="pvp" value="<?php echo $articulo->pvp;?>" required class="form-control mt-2 w-25"/>
                <label for="stock" class="mt-2"><b>Stock:</b></label>
                <input type="text" name="stock" value="<?php echo $articulo->stock;?>" required class="form-control mt-2 w-25"/>
            </div>
            <div class="mt-2">
                <input type="submit" name="editar" value="Actualizar" class="btn btn-success mr-2" />
                <a href="inicio.php" class="btn btn-primary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    }//FINELSE
?>