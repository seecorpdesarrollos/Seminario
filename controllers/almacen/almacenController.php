<?php
ob_start();

class almacenController
{

    public function getAlmacenController()
    {
        $email = $_SESSION['emailUser'];

        $response = almacenModel::getAlmacenModel('storage', $email);
        return $response;
    }

    public function getShareController()
    {

        $response = almacenModel::getShareModel('share');
        return $response;
    }

}
