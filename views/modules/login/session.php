<?php session_start();
require_once 'models/conexion.php';
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];
}

session_destroy();

$sql = Conexion::conectar()->prepare("UPDATE users SET estado = 0 WHERE emailUser = :emailUser ");
$sql->execute(array('emailUser' => $email));

header('location:login');
