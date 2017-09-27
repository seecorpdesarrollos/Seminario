<?php
require 'admin/enciclopedia/config/conexion.php';
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}
if (isset($_GET['idtemaE'])) {
    $idtema = $_GET['idtemaE'];

    $rtheme = $conexion->prepare("DELETE  FROM themes  WHERE idTheme = :idtema");
    $rtheme->execute(array(':idtema' => $idtema));

    header('location:exitoDelete');

}
