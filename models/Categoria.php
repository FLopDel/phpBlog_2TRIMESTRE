<?php
namespace models;
require_once ('../../Lib/BaseDatos.php');
use Lib\BaseDatos;


class Categoria extends BaseDatos {
    private String $id;
    private String $nombre;
    private BaseDatos $db;

    public function __construct(){
        parent::__construct();
    }

    public function getId(): String {
        return $this->id;
    }

    public function setId(String $id){
        $this->id = $id;
    }

    public function getNombre(): String {
        return $this->nombre;
    }

    public function setNombre(String $nombre){
        $this->nombre = $nombre;
    }

    public static function fromArray(array $data): Categoria{
        return new Categoria(
            $data['id'],
            $data['nombre'],
        );
    }

    public function getAll(){
        /*Obtiene todos los datos de las categorias */
        $categorias = $this->db->prepara("SELECT * FROM categorias;");
        return $categorias;
        
    }

    public function getNombreCategoria(): ?array{
        /*Obtiene el nombre de la categoria para luego en mostrala */
        $this->consulta("SELECT nombre FROM categorias");
        return $this->extraer_todos();
    }
   
}