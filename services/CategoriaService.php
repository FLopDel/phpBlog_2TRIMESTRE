<?php
namespace Services;
use Repositories\CategoriaRepository;

class CategoriaService{

    public CategoriaRepository $repository;

    function __construct(){
        $this->repository = new CategoriaRepository();
    }

    public function insertarCategoria($nombre):void{
        /*Funcion para insertar el nombre de la categoria */
        $this->repository->añadir($nombre);
    }
}