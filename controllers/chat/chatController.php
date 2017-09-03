<?php session_start();

class ChatController
{
    public static function getChatController()
    {
        $email = $_SESSION['emailUser'];
        $response = ChatModel::getChatModel('users', $email);
        return $response;
    }

    public static function insertaMensaggeController($menssage)
    {
        $email = $_SESSION['emailUser'];
        $remitente = 'davidhnmunoz@gmail.com';

        $respuesta = ChatModel::insertarChatModel($email, $menssage, $remitente);
        return $respuesta;
        if ($respuesta == 'success') {
            echo 1;
        } else {
            echo 0;
        }
    }
}
