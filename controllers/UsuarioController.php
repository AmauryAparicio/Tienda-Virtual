<?php

//modelo
require_once 'models/usuario.php';

//controlador de usuarios
class UsuarioController{
    public function index(){
        echo "Controlador Usuario, Accion Index.";
    }
    //envio a la vista del registro de usuarios
    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    //funcion de guardado de registro
    public function save(){
        if (isset($_POST)) {
            //comprobacion de llenado de formulario
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                //si todo esta correcto, se guardan los datos
                $save = $usuario->save();
                if ($save){
                    $_SESSION['register'] = "complete";
                } else{
                    //si algo falla no se guardan los datos
                    $_SESSION['register'] = "failed";
                }
            } else{
                $_SESSION['register'] = "failed";
            }
        } else{
            $_SESSION['register'] = "failed";
        }
        //redireccion a la pagina de registro
        header("Location:".base_url.'usuario/registro');
    }

    //funcion de login de usuario
    public function login(){
        if(isset($_POST)){
            //identificar al usuario

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();

            //crear una sesion
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                } else{
                    $_SESSION['error_login'] = 'Identificación fallida!!';
                }
            }
        }
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            session_destroy();
        }
        header("Location:".base_url);
    }
}