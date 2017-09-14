<?php

require_once 'models/conexion.php';

class configModel
{
    public static function changeModel($datosModel, $tabla)
    {
        $email = $_SESSION['emailUser'];
        $sql = Conexion::conectar()->prepare("UPDATE $tabla SET  passwordUser=:passwordUser WHERE emailUser = :email");
        if (empty($datosModel['password'])) {
            return 'error';
        }
        $sql->execute(array(

            ':passwordUser' => $datosModel['password'],
            ':email' => $email,
        ));
        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();
    }
}
