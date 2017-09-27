<?php

// require 'models/conexion.php';
class loginUsuario
{
    public static function registroUsuarioModel($datosModel, $espacios, $tabla)
    {
        // require 'models/conexion.php';
        $cons = Conexion::conectar()->prepare("SELECT emailUser FROM $tabla WHERE emailUser=:emailUser");
        $email = $espacios;
        $emails = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$emails) {
            return 'erroP';
        }
        $cons->execute(array(':emailUser' => $emails));
        $res = $cons->fetch();

        if ($res == true) {
            return 'erroP';
        }
        $codigo = rand(0, 5000);
        $confirmacion = 1;
        $sql = Conexion::conectar()->prepare("INSERT INTO $tabla(nameUser,emailUser,passwordUser,confirmacion,codigo)VALUES(:nombre,:email,:pass,:confirmacion,:codigo)");

        $sql->bindParam(':nombre', $datosModel['nombre']);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':pass', $datosModel['password']);
        $sql->bindParam(':confirmacion', $confirmacion);
        $sql->bindParam(':codigo', $codigo);

        if ($sql->execute()) {
            $subject = 'Activacion';
            $mensaje = "para ingresar por primera ves copie el codigo de activacion y peguelo en el casillero del codigo: Cod:$codigo";
            $headers = 'From: memorium@outlook.com';
            mail($email, $subject, $mensaje, $headers);
            return 'success';
        } else {
            return 'errorP';
        }

        $sql->close();

    }

    public function ingresarUsuarioModel($datosModel, $espacios, $tabla)
    {
        // require 'models/conexion.php';
        $email = $espacios;
        $sql1 = Conexion::conectar()->prepare("SELECT confirmacion FROM $tabla WHERE emailUser = :emailUser AND passwordUser = :passwordUser");
        $sql1->bindParam(':emailUser', $espacios);
        $sql1->bindParam(':passwordUser', $datosModel['passwordUser']);
        $sql1->execute();
        $res = $sql1->fetch();
        if ($res['confirmacion'] == 1) {
            return $res;
        } else {
            $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE emailUser = :emailUser AND passwordUser = :passwordUser");
            $sql->bindParam(':emailUser', $espacios);
            $sql->bindParam(':passwordUser', $datosModel['passwordUser']);

            if ($sql->execute()) {
                $update = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 1 AND confirmacion = 0 WHERE emailUser =  :emailUser ");
                $update->bindParam(':emailUser', $espacios);
                $update->execute();
                return $sql->fetch();
            }
        }

        $sql->close();

    }

    public static function validarCorreoModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT emailUser FROM $tabla WHERE emailUser = :emailUser");
        $sql->bindParam(':emailUser', $datosModel);

        $sql->execute();

        return $sql->fetch();

        $sql->close();
    }

    public function ingresarUsuarioCodigoModel($datosModel, $espacios, $tabla)
    {
        // require 'models/conexion.php';
        $email = $espacios;

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE emailUser = :emailUser AND passwordUser = :passwordUser AND codigo =:codigo");
        $sql->bindParam(':emailUser', $email);
        $sql->bindParam(':passwordUser', $datosModel['passwordUser']);
        $sql->bindParam(':codigo', $datosModel['codigo']);
        if ($sql->execute()) {
            $update = Conexion::conectar()->prepare("UPDATE $tabla SET estado =1 , confirmacion =0 WHERE emailUser =  :emailUser ");
            $update->bindParam(':emailUser', $email);
            $update->execute();
            return $sql->fetch();
        }

        $sql->close();

    }

    public function recoverPassModel($datosModel, $tabla)
    {
        $consulta = Conexion::conectar()->prepare("SELECT emailUser FROM $tabla WHERE emailUser =:emailUser");
        $consulta->execute(array(':emailUser' => $datosModel));
        $res = $consulta->fetch();
        if (!$res) {
            return 'NoEmail';
        } else {

            $sql = Conexion::conectar()->prepare("UPDATE $tabla SET passwordUser=:passwordUser WHERE emailUser=:emailUser");
            $codigo = rand(10000, 500000);
            $sql->bindParam(':emailUser', $datosModel);
            $sql->bindParam(':passwordUser', $codigo);
            if ($sql->execute()) {
                $cabeceras = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                $subject = 'Recuperar contraseña';
                $mensaje = " Para ingresar utilize este codigo para su contraseña y luego cambielo por una contraseña nueva: Cod:' $codigo ";
                mail($datosModel, $subject, $mensaje, $cabeceras);
                return 'success';
            }
            $sql->close();
        }
    }

}
