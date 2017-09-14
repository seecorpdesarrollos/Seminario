
<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
#EL INDEX: En él mostraremos la salida de las vistas al usuario y también a traves de él enviaremos las distintas acciones que el usuario envíe al controlador.

#require() establece que el código del archivo invocado es requerido, es decir, obligatorio para el funcionamiento del programa. Por ello, si el archivo especificado en la función require() no se encuentra saltará un error “PHP Fatal error” y el programa PHP se detendrá.

#La versión require_once() funcionan de la misma forma que sus respectivo, salvo que, al utilizar la versión _once, se impide la carga de un mismo archivo más de una vez.

#Si requerimos el mismo código más de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases.
// Controllers
require_once "controllers/enlacesController.php";
require_once "controllers/login/loginController.php";
require_once "controllers/chat/chatController.php";
require_once "controllers/almacen/almacenController.php";
require_once "controllers/config/configController.php";

// Models
require_once "models/enlacesModel.php";
require_once "models/login/loginModel.php";
require_once "models/chat/chatModel.php";
require_once "models/almacen/almacenModel.php";
require_once "models/config/configModel.php";

$mvc = new MvcController();
$mvc->plantilla();
