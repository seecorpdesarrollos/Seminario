<?php
session_start();

class ChatController
{
    public static function getChatController()
    {
        $email = $_SESSION['emailUser'];
        $response = ChatModel::getChatModel('users', $email);
        return $response;
    }
    public static function getChatControllerActivo()
    {
        $email = $_SESSION['emailUser'];
        $response = ChatModel::getChatModelActivos('users', $email);
        return $response;
    }

    public static function getChatMenssageControllerTu()
    {

        $response = ChatModel::getChatMessageModelTu('users');
        return $response;
    }

    public static function insertaMensaggeController($menssage)
    {
        $emailUser = $_SESSION['emailUser'];

        $respuesta = ChatModel::insertarChatModel($emailUser, $menssage);

        if ($respuesta == 'success') {

            echo 1;
        } else {

            echo 0;
        }
    }
}
