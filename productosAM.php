<?php

//carga constantes de conexion de bd y el encapsulamiento de las sessions
require_once 'Utils/Const.php';
require_once 'Utils/Session.php';
require_once 'twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register ();


//carga todos los controller para que no haya quilombo, tienen que terminar en Controller.php
foreach ( glob ( "Controller/*Controller.php" ) as $app ) {
    require_once $app;
}
require_once 'Controller/AdminController.php';


//idem anterior
foreach ( glob ( "Model/*Model.php" ) as $mod ) {
    require_once $mod;
}

//carga el controlador principal, osea el controlador para los usuarios anónimos.
$mainController = new MainUserController();
$mainController->init();
?>