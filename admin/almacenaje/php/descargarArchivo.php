<?php session_start();
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

if (isset($_GET['idStorage'])) {

    $nameFile = $_GET['storagePath'];
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Seminario/archivosSubidos/$emailUser/$nameFile";

    header("Content-disposition:attachment; filename=$nameFile");
    header("Content-type:application/zip");
    move_uploaded_file();
    readfile($carpeta);
}
