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
                $pedido->setCosto($costo);

                $save = $pedido->save();

                //Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else{
                    $_SESSION['pedido'] = "failed";
                }
                header("Location:".base_url.'pedido/confirmado');
            } else{
                $_SESSION['pedido'] = "failed";
            }
        } else {
            // Redirigir al index
            header("Location:".base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
            unset($_SESSION['carrito']);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function misPedidos(){
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();
        //Sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }
}