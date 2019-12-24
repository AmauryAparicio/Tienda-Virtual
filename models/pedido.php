<?php

class Pedido{
    private $id;
    private $usuario_id;
    private $estado;
    private $ciudad;
    private $direccion;
    private $costo;
    private $status;
    private $fecha;
    private $hora;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //------------------------------------------------------------------------------------------------

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getUsuario_id(){
		return $this->usuario_id;
	}

	public function setUsuario_id($usuario_id){
		$this->usuario_id = $usuario_id;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $this->db->real_escape_string($estado);
	}

	public function getCiudad(){
		return $this->ciudad;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $this->db->real_escape_string($ciudad);
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	public function getCosto(){
		return $this->costo;
	}

	public function setCosto($costo){
		$this->costo = $costo;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getHora(){
		return $this->hora;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

    //------------------------------------------------------------------------------------------------

	public function getCategoria_id(){
		return $this->categoria_id;
	}

	public function setCategoria_id($categoria_id){
		$this->categoria_id = $categoria_id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $this->db->real_escape_string($precio);
	}

	public function getStock(){
		return $this->stock;
	}

	public function setStock($stock){
		$this->stock = $this->db->real_escape_string($stock);
	}

	public function getOferta(){
		return $this->oferta;
	}

	public function setOferta($oferta){
		$this->oferta = $oferta;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
    }
    
    public function getAll(){
        $sql = "SELECT * FROM pedidos ORDER BY id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
	}

	public function getOne(){
        $sql = "SELECT * FROM pedidos WHERE id = {$this->getId()};";
        $productos = $this->db->query($sql);
        return $productos->fetch_object();
	}

    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL, '{$this->getUsuario_id()}', '{$this->getEstado()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getCosto()}, 'confirmed', CURDATE(), CURTIME();";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
	}
}