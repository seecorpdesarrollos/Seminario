<?php

// require 'models/conexion.php';
class loginUsuario
{
    public static function registroUsuarioModel($datosModel, $tabla)
    {
        // require 'models/conexion.php';
        $cons = Conexion::conectar()->prepare("SELECT emailUser FROM $tabla WHERE emailUser=:emailUser");
        $email = $datosModel['correo'];
        $cons->execute(array(':emailUser' => $email));
        $res = $cons->fetch();

        if ($res == true) {
            return 'erroP';
        }

        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla(nameUser,emailUser,passwordUser)VALUES(:nombre,:email,:pass)");

        $sql->bindParam(':nombre', $datosModel['nombre']);
        $sql->bindParam(':email', $datosModel['correo']);
        $sql->bindParam(':pass', $datosModel['password']);

        if ($sql->execute()) {
            return 'success';
        } else {
            return 'errorP';
        }

        // $sql->close();

    }

    public function ingresarUsuarioModel($datosModel, $tabla)
    {
        // require 'models/conexion.php';

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE emailUser = :emailUser AND passwordUser = :passwordUser");
        $sql->bindParam(':emailUser', $datosModel['emailUser']);
        $sql->bindParam(':passwordUser', $datosModel['passwordUser']);

        if ($sql->execute()) {
            $update = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 1 WHERE emailUser =  :emailUser ");
            $update->bindParam(':emailUser', $datosModel['emailUser']);
            $update->execute();
            return $sql->fetch();
            $sql->close();
        }

    }

    public static function validarCorreoModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT emailUser FROM $tabla WHERE emailUser = :emailUser");
        $sql->bindParam(':emailUser', $datosModel);

        $sql->execute();

        return $sql->fetch();

        $sql->close();
    }
}
