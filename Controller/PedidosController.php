<?php


class PedidosController extends Controller
{

    private $pedidos;
    private $menu;
    private $venta;
    private $producto;

    public function getPermission(){
        Session::init();
        return ((Session::getValue('rol') == '2' ));
    }

    function __construct()
    {
        parent::__contruct();
        $this->pedidos = new PedidosModel();
        $this->menu = new MenuModel();
        $this->venta = new VentaModel();
        $this->producto = new ProductosModel();
    }

    //le pasa el menu del dia a la vista, si no hay lo avisa.
    function hacerPedido()
    {
        $menuHoy = $this->menu->getMenuByDia(99,0,date('Y-m-d'));
        if ($menuHoy)
        {
            $this->dispatcher->idMenu= $menuHoy[0]->idMenu;
            $this->dispatcher->menu = $menuHoy;
            $this->dispatcher->render("Backend/RegistroPedidoTemplate.twig");
        }
        else
        {
            $this->dispatcher->mensajeError = "No hay un menu para el dia de hoy, por lo que no se pueden hacer pedidos";
            $this->dispatcher->render("Backend/IndexTemplate.twig");
        }
    }

    function validarPedido()
    {
        //bueno, vamos con las validaciones YAY :D

        try
        {
            //primero valido que me hayan pasado todas las variables

            $this->validator->varSet($_POST['idMenu'], "sin menu, no hay validacion");
            $this->validator->varSet($_POST['submit'], "algo raro hiciste, keep trying");
            $this->validator->validarNumeros($_POST['numPedidos'], "Error en la cantidad", 2);

            //ahora que se que tengo todo me traigo el menu.

            $idMenu = $_POST['idMenu'];
            $menuHoy = $this->menu->getMenuByDia(99,0,date('Y-m-d'));

            //si el menu de hoy no es como el de id, me estuvieron tocando las variables

            if ($menuHoy[1] -> idMenu != $idMenu ) throw new valException("Algo raro hiciste, keep trying");

            //ahora valido que haya suficientes productos para la cantidad de menus que me pidieron


            $cantidad = $_POST['numPedidos'];


            foreach ($menuHoy as $producto)
            {
                if ($producto->stock <  $cantidad) throw new valException("No hay suficiente cantidad de $producto->nombre para completar $cantidad pedidos");
            }

        }
        catch (valException $e)
        {
            ECHO $e->getMessage();
        }

        //Primero hay que agregar el pedido y recuperar su id.
        //hay que agregar un pedido detalle.

        $pedidoId = $this->pedidos->insertarPedido($_SESSION['idUsuario']);

        //tengo que agregar los productos al detalle y despues descontar la cantidad en productos
        //para que despues en el cancelar solo modificar los productos
        //en el aceptar se hace lo que esta comentado en el foreach

        foreach ($menuHoy as $producto)
        {
            $this->pedidos->insertPedidoDetalle($pedidoId, $producto->idProducto, $cantidad);
            //actualizo el producto
            $this->producto->actualizarCantProductos($producto->idProducto, $producto->stock - $cantidad);

        /*
            $venta['idProducto'] = $producto->idProducto;
            $venta['precioVentaUnitario'] = $producto->precioVentaUnitario;
            $venta['cant'] = $cantidad;


            echo ($this->venta->insertarVentaId($venta));
    */
        }

        $this->dispatcher->pedidos = $this->pedidos->pedidosUsuarios($_SESSION['idUsuario'], $this->conf->getConfiguracion()->cantPagina, "0");

        $this->dispatcher->pag = 0;

        $this->dispatcher->render("Backend/PedidosListarTemplate.twig");

    }

    public function verPedidos()
    {
        $this->paginaCorrecta($this->pedidos->totalPedidos($_SESSION['idUsuario']));
        $this->dispatcher->pedidos = $this->pedidos->pedidosUsuarios($_SESSION['idUsuario'], $this->conf->getConfiguracion()->cantPagina, $_GET['offset']);
        $this->dispatcher->pag = $_GET['pag'];
        $this->dispatcher->render("Backend/PedidosListarTemplate.twig");
    }    

    public function paginaCorrecta($total){
        if (! isset($_GET['pag'])) throw new Exception('Error:No hay una página que mostrar');
        elseif ($total->total <= $_GET['pag'] *  $this->conf->getConfiguracion()->cantPagina){  $_GET['pag'] = 0; $_GET['offset'] = 0;}
        else $_GET['offset'] = $this->conf->getConfiguracion()->cantPagina * $_GET['pag'];
        if ($_GET['offset'] < 0) $_GET['offset'] = 0;
        $_GET['offset'] .= "";
    }

    public function cancelarPedido()
    {
        echo "cancelar pedido";
        die;
    }

}