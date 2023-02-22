<?php
namespace Services;
require_once ('../repositories/UsuarioRepository.php');

use Repositories\UsuarioRepository;

class UsuarioService{

    public UsuarioRepository $repository;

    function __construct(){
        $this->repository = new UsuarioRepository();
    }

    public function registroUsuario($nombre, $usuario, $email, $password, $fecha):void{
        /*Funcion para registrar un usuario */
        $this->repository->registro($nombre, $usuario, $email, $password, $fecha);
    }

    public function comprobarUsuario($usuario){
        /*Funcion para comprobar los datos del usuario */
        return $this->repository->comprobar($usuario);
    } 
    
    public function modificarUsuario($nombre, $email, $usuario):void{
        /*Funcion para modificar los datos de los usuarios */
        $this->repository->modificar($nombre, $email, $usuario);
    }

    public function logout(){
        /*Funcion para cerrar sesion*/
        $this->repository->logout();
    }

   
}