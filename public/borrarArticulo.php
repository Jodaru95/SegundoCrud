<?php
    session_start();
    if(!isset($_POST['codigo'])){
        header("Location:inicio.php");
        die();
    }
    require '../vendor/autoload.php';
    use Clases\Articulos;

    $esteArticulo=new Articulos();
    $esteArticulo->setId($_POST['codigo']);
    $esteArticulo->delete();
    $esteArticulo=null;
    $_SESSION['mensaje']="Articulo borrado correctamente";
    header("Location:inicio.php");