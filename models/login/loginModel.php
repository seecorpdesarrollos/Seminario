<?php

require 'models/conexion.php';
class loginUsuario
{
    public static function registroUsuarioModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla(nameUser,emailUser,passwordUser)VALUES(:nombre,:email,:pass)");

        $sql->bindParam(':nombre', $datosModel['nombre']);
        $sql->bindParam(':email', $datosModel['correo']);
        $sql->bindParam(':pass', $datosModel['password']);

        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();

    }

    public function ingresarUsuarioModel($datosModel, $tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE emailUser = :emailUser AND passwordUser = :passwordUser");
        $sql->bindParam(':emailUser', $datosModel['emailUser']);
        $sql->bindParam(':passwordUser', $datosModel['passwordUser']);

        if ($sql->execute()) {
            return $sql->fetch();
        }

        $sql->close();

    }
}
