<?php
namespace Repositories;
use Lib\BaseDatos;
use PDOException;
use PDO;
use Models\Usuario;
require_once ('../repositories/UsuarioRepository.php');
class UsuarioRepository{

    private BaseDatos $conexion;

    function __construct(){
        $this->conexion = new BaseDatos();
    }

    public function comprobar($usuario):? array{
        /*Funcion para comprobar que el usuario existe cuando el nombre de usuario esta en la bbdd */
        $sql = "SELECT usuario,password,rol FROM usuarios WHERE usuario = :usuario";
        $result = $this->conexion->prepara($sql);
        $result -> bindParam(':usuario',$usuario['usuar']);
        
        try{
            $result -> execute();
            $datos = $result->fetchAll();
            
            if(count($datos) != 0){
                $datos_encontrados = array($datos[0]['usuario'],$datos[0]['password'],$datos[0]['rol']);
                
                return $datos_encontrados;
            }else{
                return [];
            }
        }catch(PDOException $err){
            echo "error";
        }        
    }


    public function registro($nombre, $usuario, $email, $password, $fecha):void{
        /*Funcion para registrar usuario, insertando en la bbdd los datos de este */
        $sql = ("INSERT INTO usuarios(nombre, usuario, email, password, fecha)values(?, ?, ?, ?, ?)");
        $consult = $this->conexion->prepara($sql);
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fecha = $_POST['fecha'];

        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        $consult -> bindParam(1,$nombre);
        $consult -> bindParam(2,$usuario);
        $consult -> bindParam(3,$email);
        $consult -> bindParam(4,$password_segura);
        $consult -> bindParam(5,$fecha);

        try{    
            $consult -> execute();
            echo "<br>Has sido registrado, se le enviara la informacion por correo";
        }
        catch(PDOException $err){
            echo 'Ese usuario ya ha sido registrado<br>';
        }
    }


    public function modificar($nombre, $email, $usuario):void{
        /*Funcion para modificar el nombre y email cuando el nombre de usuario es el mismo que el que tienes */
        $sql = ("UPDATE usuarios SET nombre = ?, email = ? WHERE usuario = ?");

        $consult = $this->conexion->prepara($sql);

        $consult -> bindParam(1,$nombre);
        $consult -> bindParam(2,$email);
        $consult -> bindParam(3,$usuario);

        try{    
            $consult -> execute();
            echo "Sus datos han sido modificados";
            
        }
        catch(PDOException $err){
            echo 'Error';
        }
    }   

    public function logout(){
        @session_start();
        session_destroy();
        header("Location: index.php");
    }


    

    
}