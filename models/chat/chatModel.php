<?php

// require_once 'models/conexion.php';
class ChatModel
{

    public static function getChatModel($tabla, $email)
    {
        require_once '../../models/conexion.php';
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 AND emailUser != :emailUser");
        $sql->execute(array('emailUser' => $email));
        return $sql->fetchAll();
        $sql->close();
    }
    public static function getChatModelActivos($tabla, $email)
    {
        require_once 'models/conexion.php';
        $sql = Conexion::conectar()->prepare("SELECT estado FROM $tabla WHERE  emailUser = :emailUser");
        $sql->execute(array('emailUser' => $email));
        return $sql->fetchAll();
        $sql->close();
    }

    public static function getChatMessageModelTu($tabla)
    {
        // require 'models/conexion.php';
        $sql = Conexion::conectar()->prepare("SELECT COUNT(*)
         FROM $tabla WHERE estado = 1
         ");
        $sql->execute();
        return $sql->fetch();

        $sql->close();
    }
    public static function insertarChatModel($emailUser, $message)
    {
        require_once 'models/conexion.php';

        $sql = Conexion::conectar()->prepare("INSERT INTO messages(emailUser,message)
            VALUES(:emailUser,:message)");
        $sql->bindParam(':emailUser', $emailUser);
        $sql->bindParam(':message', $message);

        if ($sql->execute()) {

            return 'success';
        }
        $sql->close();

    }

}
