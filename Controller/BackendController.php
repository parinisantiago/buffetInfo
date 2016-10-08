<?php
require_once 'Controller/Controller.php';
/*
 * Esta clase encapsula el comportamiento comun de los 2 tipos de usuario que 
 * pueden llegar al backend Admin y Gestion
 */
class BackendController extends Controller{
    public $model;
    public $rolModel;
    public $productoModel;
    public $categoriaModel;

    public function __construct(){
            parent::__contruct();
            $this->model = new MainUserModel();
            $this->rolModel = new RolModel();
            $this->productoModel = new ProductosModel();
            $this->categoriaModel = new CategoriaModel();
    }
    
    public function index(){
        $this->dispatcher->render("Backend/IndexTemplate.twig");
    }
    
    /* ---Venta---*/
    public function vender(){
        /*muestra productos a vender
    /*****************ver el template que el boton tiene caca*/
        $this->paginaCorrecta($this->productoModel->totalProductos());
        $this->dispatcher->producto = $this->productoModel->getAllProducto($this->conf->getConfiguracion()->cantPagina,$_GET['offset']);
        $this->dispatcher->pag = $_GET['pag'];
        var_dump($_GET['pag']);
        $this->dispatcher->render("Backend/VenderTemplate.twig"); 
    }
    public function venta(){
        /***** actualizar ganancias***************************/
        var_dump($_POST);
        die();
        $this->dispatcher->producto =$this ->productoModel->insertarProducto($_POST);
        $this->paginaCorrecta($this->productoModel->totalProductos());
        $this->dispatcher->producto = $this->productoModel->getAllProducto($this->conf->getConfiguracion()->cantPagina,$_GET['offset']);
        $this->dispatcher->pag = $_GET['pag'];
        
        $this->dispatcher->render("Backend/VenderTemplate.twig"); 
        var_dump($var);
        die();
    }

    public function ventaListar(){
        /*botones de pasar pagina=caca*/
        /******muestra todos los productos vendidos***********************/
    }
    public function ventaModificar(){
        /*****************************/
    }
    public function ventaEliminar(){
        /*****************************/
    }
    /* ---Compra ---*/ 

    public function compraListar(){
        /*botones de pasar pagina=caca*/
        /******muestra todos los productos comprados***********************/
    }
     public function compraModificar(){
        /*****************************/
    }
    public function compraEliminar(){
        /*****************************/
    }
    /* ---Productos---*/
    
    public function productosListar(){
        $this->paginaCorrecta($this->productoModel->totalProductos());
        $this->dispatcher->producto = $this->productoModel->getAllProducto($this->conf->getConfiguracion()->cantPagina,$_GET['offset']);
        $this->dispatcher->pag = $_GET['pag'];
        $this->dispatcher->render("Backend/ProductosListarTemplate.twig");
    }
    public function productosAM(){
        if (isset($_POST["idProducto"])){
            $this->dispatcher->producto =$this ->productoModel->searchIdProducto($_POST["idProducto"]);
        }
        $this->dispatcher->categoria =$this ->categoriaModel->getAllCategorias();
        $this->dispatcher->render("Backend/ProductosAMTemplate.twig");
    }
    public function productosAMPost(){
        /*ver botones de venta, solo son del admin*/
        validarProductos($_POST);
        if ($_POST["idProducto"] != ""){
           $this->dispatcher->producto =$this ->productoModel->actualizarProducto($_POST); 
        }else{
            $this->dispatcher->producto =$this ->productoModel->insertarProducto($_POST);
        }
        $this->productosListar();
    }
    public function productosE(){
     $this->dispatcher->producto =$this ->productoModel->deleteProducto($_POST["idProducto"]);
     $this->productosListar();
    }



    /*validar productos en el serverrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
     * public function validarProductos($var){
         if (! isset($var['nombre'])) throw new Exception('Falta escribir el telefono');
        else{
            validarNumeros($_POST['telefono']);
        }
    }*/

    /*--- paginacion ---*/

    public function paginaCorrecta($total){

        if (! isset($_GET['pag'])) throw new Exception('No hay una página que mostrar');

        elseif ($total->total < $_GET['pag'] *  $this->conf->getConfiguracion()->cantPagina + $this->conf->getConfiguracion()->cantPagina){  $_GET['pag'] = 0; $_GET['offset'] = 0;}
        else $_GET['offset'] = $this->conf->getConfiguracion()->cantPagina * $_GET['pag'];
        if ($_GET['offset'] < 0) $_GET['offset'] = 0;
        $_GET['offset'] .= "";

    }

}
