<?php
namespace Controllers;

require_once ('../services/UsuarioService.php');
use Services\UsuarioService;
use Lib\Pages;
use Utils\Utils;
use Models\Usuario;

class UsuarioController{
    
    private UsuarioService $service;
    private Pages $pages;

    function __construct(){
        $this->service = new UsuarioService();
        $this->pages = new Pages();
    }

    public function login():void{
        /*Funcion para logear un usuario */
        $this->pages->render('usuario/login');

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = new Usuario();
            $datos = $this->service->comprobarUsuario($_POST['usuario']);

            if($datos != []){
                $usuario = $_POST['usuario'];
                $usuario_password = $usuario['clave'];

                $password_bbdd = $datos[1];
                $rol_bbdd = $datos[2];   

                if(password_verify($usuario_password,$password_bbdd)){
                    // session_start();

                    $_SESSION['usuario'] = $_POST['usuario'];
                    $_SESSION['rol'] = $rol_bbdd;

                    header("Location: http://localhost/proyecto/views/layout/registrados.php");
                }else{
                    echo "Vuelve a introducir el usuario y la password<br>";
                }
            }
        }
    }

    public function registro(){
        /*Funcion para registrar un usuario */
        $this->pages->render('usuario/registro');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fecha = $_POST['fecha'];
            $usuario = new Usuario();
            $usuario->enviarEmail();
            $this->service->registroUsuario($nombre, $usuario, $email, $password, $fecha);
        }
           
    }

    public function modificar(){
        /*Funcion para modificar los datos de un usuario */
        $this->pages->render('usuario/modificar');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $this->service->modificarUsuario($nombre, $email, $usuario);
        }
    }

    public function logout(){
        @session_start();
        session_destroy();
        header("Location: index.php");
    }

    


    

}