<?php
    session_start();
    use Clases\Articulos;
    require '../vendor/autoload.php';
    
    $articulo=new Articulos();
    die("Peta aqui");
    //aqui no llega
    $lista=$articulo->devolverTodos();
    if($lista!=null){
        echo "Conexion realizada";
    }else{
        echo "Ha habio un erró";
    }