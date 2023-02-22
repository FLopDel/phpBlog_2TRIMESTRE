<?php
namespace Repositories;
use Lib\BaseDatos;
use PDOException;

class EntradaRepository{

    private BaseDatos $conexion;

    function __construct(){
        $this->conexion = new BaseDatos();
    }

    public function publicar($usuario_id, $categoria_id, $titulo, $descripcion, $fecha):void{
        /*Funcion para insertar los datos de la entrada en la bbdd */
        $sql = ("INSERT INTO entradas(usuario_id, categoria_id, titulo, descripcion, fecha)values(?, ?, ?, ?, ?)");
        $consult = $this->conexion->prepara($sql);
        $usuario_id = $_POST['usuario_id'];
        $categoria_id = $_POST['categoria_id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        
        $consult -> bindParam(1,$usuario_id);
        $consult -> bindParam(2,$categoria_id);
        $consult -> bindParam(3,$titulo);
        $consult -> bindParam(4,$descripcion);
        $consult -> bindParam(5,$fecha);
                

        try{    
            $consult -> execute();
            echo "La entrada ha sido realizada con exito";
        }
        catch(PDOException $err){
            echo 'Error<br>';
        }
    }

    public function comprobar($entrada){
        /*Funcion para comprobar que la entrada existe en la bbdd */
        $sql = "SELECT titulo FROM entradas WHERE titulo = :titulo";
        $result = $this->conexion->prepara($sql);
        $result -> bindParam(':titulo',$entrada['titulo']);
        
        try{
            $result -> execute();
            $datos = $result->fetchAll();
            if(count($datos) != 0){
                $datos_encontrados = array($datos[0]['titulo']);
                
                return $datos_encontrados;
            }else{
                return [];
            }
        }catch(PDOException $err){
            echo "error";
        }        
    }


    public function borrar($entrada):void{  
        /*Funcion para borrar entrada si el titulo existe */     
        $sql3 = ("DELETE FROM entradas WHERE titulo = :titulo");
        $consul = $this -> conexion -> prepara($sql3);
        $consul -> bindParam(':titulo',$entrada['titulo']);

        try{
            $consul -> execute();
            echo "Entrada borrada";
        }catch(PDOException $err){
            echo "error";
        }
    }

    public function modificarDatos($id, $titulo, $descripcion, $fecha ):void{
        /*Funcion para modificar los datos de la entrada cuando el Id es el mismo que el de la base de datos */
        $sql = ("UPDATE entradas SET titulo = ?, descripcion = ?, fecha = ? WHERE id = ?");
        $consult = $this -> conexion->prepara($sql);

        $consult -> bindParam(1,$titulo);
        $consult -> bindParam(2,$descripcion);
        $consult -> bindParam(3,$fecha);
        $consult -> bindParam(4,$id);

        try{
            $consult -> execute();
            echo "Los datos de la entrada han sido modificados";
        }
        catch(PDOException $err){
            echo 'Error';
        }


    }

    
}