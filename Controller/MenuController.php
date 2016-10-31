<?php
require_once 'Controller/Controller.php';

class MenuController extends Controller{
    public $menuModel;

    public function __construct(){
        parent::__contruct();
        $this->menuModel= new MenuModel();
    }
    public function getPermission()
    {
        Session::init();
        $rol = Session::getValue('rol');
        return (($rol == '0') || ($rol == '1'));
    }

    public function menu(){
        /*deberia mostrar los menu para el dia que llegue como parametro
         * si no hay parametros muestra el de hoy
         * tambien numeros de paginas
         * agregar un marco de color sobre la fecha seleccionada en el calendario
         */
        $this->paginaCorrecta($this->menuModel->totalMenu());
        $this->dispatcher->menu = $this->menuModel->getAllMenu($this->conf->getConfiguracion()->cantPagina,$_GET['offset']);
        $this->dispatcher->pag = $_GET['pag'];
        $this->dispatcher->method = "menu";
        $this->dispatcher->render("Backend/calendarioTemplate.twig");
    }
    public function menuAM(){
        echo"POLIMORFISAR FUNESTO";
    }
    public function menuEliminar(){
        echo"DESINTEGRAR";
    }


    public function paginaCorrecta($total){
        if (! isset($_GET['pag'])) throw new Exception('Error:No hay una página que mostrar');
        elseif ($total->total <= $_GET['pag'] *  $this->conf->getConfiguracion()->cantPagina){  $_GET['pag'] = 0; $_GET['offset'] = 0;}
        else $_GET['offset'] = $this->conf->getConfiguracion()->cantPagina * $_GET['pag'];
        if ($_GET['offset'] < 0) $_GET['offset'] = 0;
        $_GET['offset'] .= "";
    }
}