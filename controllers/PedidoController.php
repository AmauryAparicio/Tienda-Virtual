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

    public function detalle(){
        Utils::isIdentity();
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //Sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        }else {
            header('Location: '.base_url.'pedido/mispedidos');
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado(){
        Utils::isAdmin();

        if(isset($_POST['pedido_id']) && isset($_POST['status'])){
            //Recogemos datos del formulario
            $id = $_POST['pedido_id'];
            $status = $_POST['status'];
            // Actualizamos el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setStatus($status);
            $pedido->updateOne();
            header("Location: ".base_url.'pedido/detalle&id='.$id);
        }else{
            header("Location: ".base_url);
        }
    }
}