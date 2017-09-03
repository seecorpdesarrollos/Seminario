<?php

require_once '../controllers/login/loginController.php';

require_once '../models/login/loginModel.php';

require_once '../models/conexion.php';

class Ajax
{

    public $validarCorreo;
    public $menssage;
    public $remitente;

    public function validarCorreoAjax()
    {
        $datos = $this->validarCorreo;

        $respuesta = loginUsuarioCon::validarCorreoController($datos);
        echo $respuesta;
    }
    public function menssageAjax()
    {
        $menssage = $this->menssage;
        $remitente = $this->remitente;

        $respuesta = ChatController::insertaMensaggeController($menssage, $remitente);
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
    $b->remitente = $_POST['remitenteAjax'];
    $b->menssageAjax();
}
