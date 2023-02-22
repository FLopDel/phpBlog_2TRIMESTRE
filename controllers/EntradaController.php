<?php

namespace Controllers;

require_once ('../services/EntradaService.php');
require_once ('../models/Entrada.php');

use Services\EntradaService;
use models\Entrada;
use Lib\Pages;

class EntradaController{
    private EntradaService $service;
    private Entrada $patient;
    private Pages $pages;

    function __construct(){
        $this->service = new EntradaService();
        $this->patient = new Entrada();
        $this->pages = new Pages();
    }

    public function mostrarTodos(){
        $entradaConTitulo = $this->patient->getTituloyDescripcion();
        $this->pages->render('entrada/mostrar_todos',['entradaConTitulo'=>$entradaConTitulo]);
    }

    public function publicar(){
        /*Funcion para publicar entradas */
        $this->pages->render('entrada/form/publicarEntrada');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario_id = $_POST['usuario_id'];
            $categoria_id = $_POST['categoria_id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['fecha'];
            $this->service->publicarEntrada($usuario_id, $categoria_id, $titulo, $descripcion, $fecha);
        }
    }

    public function borrar(){
        /*Funcion para borrar la entrada por el titulo */
        $this -> pages -> render('entrada/form/borrar');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $entrada = $_POST['entrada'];
            $comprobarEntradasiExiste = $this -> service -> comprobarEntrada($entrada);
            if($comprobarEntradasiExiste != []){
                $this -> service -> borrarEntrada($entrada);
                echo "Entrada borrada<br><br>";
            }
        }

    }

    public function modificarDatos(){
        /*Funcion para modificar los datos de la entrada, insertando el titulo */
        $this->pages->render('entrada/form/modificar');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['fecha'];
            $this->service->modificarDatos($id, $titulo, $descripcion, $fecha);
        }
    }


    

}