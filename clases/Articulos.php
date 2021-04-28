<?php
namespace Clases;
require '../vendor/autoload.php';
use Clases\Conexion;
use PDO;
use PDOException;


class Articulos extends Conexion{
    private $id;
    private $pvp;
    private $nombre;
    private $stock;

    public function __construct(){
        parent::__construct();
    }
    //----------------CRUD--------------------
    public function create(){
        $c="insert into articulos(nombre,pvp,stock) values(:n,:p,:s)";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':p'=>$this->pvp,
                ':s'=>$this->stock
            ]);
        }catch(PDOException $ex){
            die("Error al insertar el articulo. Mensaje:".$ex->getMessage());
        }
    }
    public function read(){
        $c="select * from articulos where id=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':i'=>$this->id
            ]);
        }catch(PDOException $ex){
            die("Error al buscar el articulo. Mensaje:".$ex->getMessage());
        }
        $fila=$stmt->fetch(PDO::FETCH_OBJ);
        return $fila;
    }
    public function update(){
        $c="update articulos set nombre=:n ,pvp=:p ,stock:s where id=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':i'=>$this->id,
                ':n'=>$this->nombre,
                ':p'=>$this->pvp,
                ':s'=>$this->stock,
            ]);
        }catch(PDOException $ex){
            die("Error al actualizar el articulo. Mensaje:".$ex->getMessage());
        }
    }
    public function delete(){
        $c="delete from articulos where id=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':i'=>$this->id
            ]);
        }catch(PDOException $ex){
            die("Error al borrar el Articulo. Mensaje:".$ex->getMessage());
        }
    }
    //----------Metodos auxiliares---------------
    public function devolverTodos(){
        $c="select * from articulos order by id";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al devolver todos los articulos. Mensaje:".$ex->getMessage());
        }
        return $stmt;
    }
    public function existeArticulo($art){
        $c="select * from articulos where nombre=:n";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':n'=>$art
            ]);
        }catch(PDOException $ex){
            die("Error al comprobar la existencia del articulo. Mensaje:".$ex->getMessage());
        }
        $fila=$stmt->fetch(PDO::FETCH_OBJ);
        return ($fila==null)? false:true;
    }
    //-----------GETTERS & SETTERS---------------
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of pvp
     */ 
    public function getPvp()
    {
        return $this->pvp;
    }
    /**
     * Set the value of pvp
     *
     * @return  self
     */ 
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

        return $this;
    }
    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }
    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
}//FINCLASS

