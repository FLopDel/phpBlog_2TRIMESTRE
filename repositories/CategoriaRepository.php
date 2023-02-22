<?php
namespace Repositories;
use Lib\BaseDatos;
use PDOException;

class CategoriaRepository{

    private BaseDatos $conexion;

    function __construct(){
        $this->conexion = new BaseDatos();
    }

    public function añadir($nombre):void{
        /*Funcion para insertar el nombre de la categoria en la bbdd */
        $sql = ("INSERT INTO categorias(nombre)values(?)");
        $consult = $this->conexion->prepara($sql);
        $nombre = $_POST['nombre'];
    
        $consult -> bindParam(1,$nombre);

        
        try{    
            $consult -> execute();
            echo "Caegoria creada";
        }
        catch(PDOException $err){
            echo 'Error<br>';
        }
    }


}