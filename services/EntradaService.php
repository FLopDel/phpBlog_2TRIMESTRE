<?php
namespace Services;
require_once('../repositories/EntradaRepository.php');
use Repositories\EntradaRepository;

class EntradaService{
    private BaseDatos $conexion;

    public EntradaRepository $repository;

    function __construct(){
        $this->repository = new EntradaRepository();
    }

    public function publicarEntrada($usuario_id, $categoria_id, $titulo, $descripcion, $fecha):void{
        /*Funcion para publicar los datos de las entradas */
        $this->repository->publicar($usuario_id, $categoria_id, $titulo, $descripcion, $fecha);
    }

    public function comprobarEntrada($entrada){
        /*Funcion para comprobar los datos de las entradas */
        return $this->repository->comprobar($entrada);
    }

    public function borrarEntrada($entrada){
        /*Funcion para borrar las entradas */
        return $this->repository->borrar($entrada);
    }

    public function modificarDatos($id, $titulo, $descripcion, $fecha):void{
        /*Funcion para modificar los datos de las entradas */
        $this->repository->modificarDatos($id, $titulo, $descripcion, $fecha);
    }

    

   
}