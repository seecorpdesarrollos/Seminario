<?php

// require 'models/conexion.php';
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

if (isset($_GET['idStorage'])) {
    $idStorage = $_GET['idStorage'];
    $storagePath = $_GET['storagePath'];
    $nameStorage = $_GET['nameStorage'];

    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Seminario/archivosSubidos/$emailUser/" . $storagePath;

    unlink($carpeta);

    $sql = Conexion::conectar()->prepare("DELETE FROM storage WHERE idStorage = :idStorage");
    $sql->execute(array(':idStorage' => $idStorage));

    header('location:almaceList');
}
