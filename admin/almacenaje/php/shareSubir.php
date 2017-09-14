<?php

require_once '../../../models/conexion.php';
session_start();
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

if (isset($_FILES)) {
    $user = Conexion::conectar()->prepare('SELECT count(*)as "total" FROM share WHERE emailUser=:emailUser');
    $user->execute(array(':emailUser' => $emailUser));
    $res = $user->fetchAll();
    foreach ($res as $key) {
    }
    if ($key['total'] == 3) {
        header('location:share?no');
    } else {

        $archivo = $_FILES['file'];
        $temp = $archivo['tmp_name'];
        $nameFile = $archivo['name'];
        $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Seminario/archivosSubidos/share/";

        if (!$temp) {
            die('no se a seccionado nada.');
        }
        if (move_uploaded_file($temp, $carpeta . $nameFile)) {
            $sql = Conexion::conectar()->prepare("INSERT INTO share(sharePath ,emailUser,nameShare )VALUES(:sharePath ,:emailUser,:nameShare)");
            $sql->execute(array(
                ':sharePath' => $carpeta,
                ':emailUser' => $emailUser,
                ':nameShare' => $nameFile,
            ));

        }
    }
}
