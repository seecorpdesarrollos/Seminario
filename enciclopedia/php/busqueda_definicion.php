<?php
require '../config/conexion.php';

$sinresultado = '';
if (isset($_GET['txtName'])) {

    $name = "%" . $_GET["txtName"] . "%";
    $stmt = $conexion->prepare("SELECT them.idTheme,them.title,them.description,
us.nameUser,them.datatheme,them.points,them.votes,them.emailUser


FROM

themes them JOIN users us
on them.emailUser=us.emailUser
WHERE them.description LIKE '%$name%' OR them.title LIKE '%$name%' OR us.nameUser LIKE '%$name%' ");
    $stmt->execute(array($name));
    $result = $stmt->execute(array($name));
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    if ($result == false) {
        $sinresultado .= '<strong>No se encontraron registros de busqueda</strong>';
    }
}

require '../views/definiciones/busqueda_definicion.view.php';
