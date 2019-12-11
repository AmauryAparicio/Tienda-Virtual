<?php
// Se crea la clase usuario en los modelos
class Usuario{
    //variables privadas para usarse dentro de la funcion
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    //constructor de conexion a la base de datos
    public function __construct(){
        $this->db = Database::connect();
    }
    
    /*
     ------------Getters y Setters ------------
    */

    function getId() {
        return $this->id;
    }

    function getNombre() {
        //real escape string para evitar ingreso de datos no deseados
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        //encriptacion de las contraseñas junto con real escape string
        return $this->password;
    }

    /*
    -----------------El real escape string se aplica solo a los campos que entra información por medio de el formulario de registro.-----------------
    */

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password){
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    function setRol($rol){
        $this->rol = $rol;
    }
    
    function setImagen($imagen){
        $this->imagen = $imagen;
    }

    //funcion dedicada a hacer el ingreso de datos por parte del registro a la base de datos
    public function save(){
        /*Se aplican los get para el ingreso de datos dentro de la query*/
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL)";
        $save = $this->db->query($sql);


        //Comprobacion del save
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
