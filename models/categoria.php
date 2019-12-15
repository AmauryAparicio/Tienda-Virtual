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
		$this->nombre = $this->db->real_escape_string($nombre);
    }
    
    public function getAll(){
        $sql = "SELECT * FROM categorias ORDER BY id;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    public function getOne(){
        $sql = "SELECT * FROM categorias WHERE id={$this->getId()};";
        $categoria = $this->db->query($sql);
        return $categoria->fetch_object();
    }
    public function save(){
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    public function getMenu(){
        $sql = "SELECT * fROM categorias ORDER BY id LIMIT 6;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
}