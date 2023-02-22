<?php

namespace Controllers;
require_once ('../services/CategoriaService.php');
require_once ('../repositories/CategoriaRepository.php');
require_once ('../models/Categoria.php');
use Services\CategoriaService;
use models\Entrada;
use models\Categoria;
use Lib\Pages;

class CategoriaController{
    private CategoriaService $service;
    private Categoria $patient;
    private Pages $pages;

    function __construct(){
        $this->service = new CategoriaService();
        $this->patient = new Categoria();
        $this->pages = new Pages();
    }

    public function mostrarTodos(){
        /*Muestra las categorias */
        $nombreCategoria = $this->patient->getNombreCategoria();
        $this->pages->render('categoria/mostrar_todos',['nombreCategoria'=>$nombreCategoria]);
    }

    public function añadir(){
        /*Inserta las categorias*/
        $this->pages->render('categoria/añadirCategoria');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nombre = $_POST['nombre'];

            $this->service->insertarCategoria($nombre);
            
        }
    }    
}