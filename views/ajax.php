<?php

require_once '../controllers/login/loginController.php';
require_once '../controllers/chat/chatController.php';

require_once '../models/login/loginModel.php';
require_once '../models/chat/chatModel.php';

require_once '../models/conexion.php';

class Ajax
{

    public $validarCorreo;
    public $menssage;

    public function validarCorreoAjax()
    {
        $datos = $this->validarCorreo;

        $respuesta = loginUsuarioCon::validarCorreoController($datos);
        echo $respuesta;
    }
    public function menssageAjax()
    {
        $menssage = $this->menssage;

        $respuesta = ChatController::insertaMensaggeController($menssage);
        echo $respuesta;
    }

}

if (isset($_POST['inputvalidarCorreo'])) {
    $a = new Ajax();
    $a->validarCorreo = $_POST['inputvalidarCorreo'];
    $a->validarCorreoAjax();
}
if (isset($_POST['mensageAjax'])) {
    $b = new Ajax();
    $b->menssage = $_POST['mensageAjax'];
    $b->menssageAjax();
}
