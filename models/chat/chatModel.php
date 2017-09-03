<?php

require 'models/conexion.php';
class ChatModel
{

    public static function getChatModel($tabla, $email)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 AND emailUser != :emailUser");
        $sql->execute(array('emailUser' => $email));
        return $sql->fetchAll();
        $sql->close();
    }
    public static function insertarChatModel($remitente, $message, $email)
    {

        $sql = Conexion::conectar()->prepare("INSERT INTO messages(emiter,message,receiver)
            VALUES(:emiter,:message,:receiver)");
        $sql->bindParam(':emiter', $remitente);
        $sql->bindParam(':message', $message);
        $sql->bindParam(':receiver', $email);

        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();

    }

}
