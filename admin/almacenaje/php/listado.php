<?php

// require 'models/conexion.php';
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

$sql = Conexion::conectar()->prepare("SELECT * FROM storage WHERE emailUser =:emailUser");
$sql->execute(array(':emailUser' => $emailUser));
$result = $sql->fetchAll();
