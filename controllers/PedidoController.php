<?php

require_once 'models/pedido.php';

//controlador de los pedidos
class PedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }
    public function add(){
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $costo = $stats['total'];

            if ($estado && $ciudad && $direccion) {
                //Guardamos los datos en la BD
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setEstado($estado);
                $pedido->setCiudad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCosto();

            }
        } else {
            // Redirigir al index
            header("Location:".base_url);
        }
    }
}