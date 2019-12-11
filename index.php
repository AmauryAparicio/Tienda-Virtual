<?php

session_start();

//conexion al autocargado de controladores
require_once 'autoload.php';
//configuracion de la base de datos
require_once 'config/db.php';
//parametros especiales
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
//maqueta html del header y del sidebar
require_once 'views/layouts/header.php';
require_once 'views/layouts/sidebar.php';


//Error de la web
function show_error(){
	$error = new ErrorController();
	$error->index();
}

// Set de los controladores por medio del metodo GET
if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';
}elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
	$nombre_controlador = controller_default;
} else{
	show_error();
	exit();
}
if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
		$action_default = action_default;
		$controlador->$action_default();
	} else{
		show_error();
	}
}else{
	show_error();
}

//maqueta del footer
require_once 'views/layouts/footer.php';

