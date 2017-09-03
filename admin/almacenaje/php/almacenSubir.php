<?php

require '../../../models/conexion.php';
session_start();
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

if (isset($_POST['subirArchivo'])) {
    $nameStorage = $_POST['nameStorage'];
    // archivos..
    $file_name = $_FILES['storage']['name'];
    $tipo = strtolower(end(explode('.', $_FILES['storage']['name'])));
    // var_dump($tipo);
    $tamano = $_FILES['storage']['size'];
    // var_dump($tamano);

    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Seminario/archivosSubidos/$emailUser/";
    if ($tamano <= 200000000) {
        if ($tipo == 'zip' or $tipo == 'rar') {
            if (move_uploaded_file($_FILES['storage']['tmp_name'], $carpeta . $file_name)) {

                $sql = Conexion::conectar()->prepare("INSERT INTO storage(storagePath ,emailUser,nameStorage )VALUES(:storagePath ,:emailUser,:nameStorage)");
                $sql->execute(array(
                    ':storagePath' => $file_name,
                    ':emailUser' => $emailUser,
                    ':nameStorage' => $nameStorage,
                ));
                header('location:../../../almaceList');
            }

        } else {
            header('location:modal/errorArchivo.php');
        }
    } else {

        header('location:modal/errorTamano.php');

    }

}
