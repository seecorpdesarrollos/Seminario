<?php
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

if (isset($_GET['idShare'])) {

    $nameFile = $_GET['nameShare'];
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Seminario/archivosSubidos/share/$nameFile";
    header("Content-type: application/octet-stream");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=\"$nameFile\"\n");
    readfile($carpeta);

    // header("Content-disposition:attachment; filename=$nameFile");
    // header("Content-type:application/zip");
    // move_uploaded_file();
    // readfile($carpeta);
}
