<?php

require_once 'models/conexion.php';
class almacenModel
{

    public function getAlmacenModel($tabla, $email)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE emailUser =:emailUser");
        $sql->execute(array(':emailUser' => $email));
        return $sql->fetchAll();
        $sql->close();

    }
    public function getShareModel($tabla)
    {

        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $sql->execute();
        return $sql->fetchAll();
        $sql->close();

    }

}
