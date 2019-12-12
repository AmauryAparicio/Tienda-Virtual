<?php
// Se crea la clase categoria en los modelos
class Categoria{
    //variables privadas para usarse dentro de la funcion
    private $id;
    private $nombre;
    private $db;

    //constructor de conexion a la base de datos
    public function __construct(){
        $this->db = Database::connect();
    }
    function getId(){
		return $this->id;
	}

	function setId($id){
		$this->id = $id;
	}

	function getNombre(){
		return $this->nombre;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
    }
    
    public function getAll(){
        $sql = "SELECT * FROM categorias;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
}