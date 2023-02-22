<?php
namespace models;
use Lib\BaseDatos;

class Entrada extends BaseDatos{
    private String $id;
    private String $usuario_id;
    private String $categoria_id;
    private String $titulo;
    private String $descripcion;
    private String $fecha;

    public function __construct(){
        parent::__construct();
    }

    public function getId(): String {
        return $this->id;
    }

    public function setId(String $id){
        $this->id = $id;
    }

    public function getUsuario_id(): String {
        return $this->usuario_id;
    }

    public function setUsuario_id(String $usuario_id){
        $this->usuario_id = $usuario_id;
    }

    public function getCategoria_id(): String {
        return $this->categoria_id;
    }

    public function setCategoria_id(String $categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function getTitulo(): String {
        return $this->titulo;
    }

    public function setTitulo(String $titulo){
        $this->titulo = $titulo;
    }

    public function getDescripcion(): String {
        return $this->descripcion;
    }

    public function setDescripcion(String $descripcion){
        $this->descripcion = $descripcion;
    }

    public function getFecha(): String {
        return $this->fecha;
    }

    public function setFecha(String $fecha){
        $this->fecha = $fecha;
    }

    public function getAll(): ?array{
        /*Selecciona todos los datos de las entradas */
        $this->consulta("SELECT * FROM entradas");
        return $this->extraer_todos();
    }

    public function getTituloyDescripcion(): ?array{
        /*Obtiene el titulo y la descripcion de todas las entradas*/
        $this->consulta("SELECT titulo,descripcion FROM entradas");
        return $this->extraer_todos();
    }

}