<?php
require '../config/conexion.php';

if (isset($_GET['idtema'])) {
    $id = $_GET["idtema"];

/*Colocar varaible super global con el mail del usuario logeado*/

    $usermaillogin = 'davidhnmunoz@gmail.com';
/**/

    $consultaremail = $conexion->prepare('SELECT us.emailUser

FROM
users us JOIN themes them ON us.emailUser=them.emailUser

WHERE them.idTheme=:id');
    $consultaremail->bindValue(':id', $id);
    $consultaremail->execute();
    $usermail = $consultaremail->fetch(PDO::FETCH_COLUMN);

// var_dump($usermail);
    // var_dump($usermaillogin);

    if ($usermaillogin != $usermail) {

        header('location:../errorpermisos/');
    }

}

//Saco los datos del tema
if (isset($_GET['idtema'])) {
    $idtema = $_GET["idtema"];

    $sql = $conexion->prepare("SELECT them.idTheme,them.title,them.description,us.nameUser,us.emailUser


FROM

themes them JOIN users us
on them.emailUser=us.emailUser

where idTheme=$idtema");

    $sql->execute(array(':idtema' => $idtema));
    $res = $sql->fetchAll(PDO::FETCH_OBJ);

}

if (isset($_POST['modificar'])) {
    $id_tema     = $_POST["id_tema"];
    $titulo      = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $emailUser   = 'davidhnmunoz@gmail.com';
    if ($titulo == '') {
        echo 'ingresar titulo';
    } elseif ($descripcion == '') {
        echo 'Ingresar Descripcion';
    } else {

        /*UPDATE tabla Definiciones*/
        $sql1 = "UPDATE themes SET idTheme=:id_tema, title=:titulo , description=:descripcion ,emailUser=:emailUser WHERE idTheme=:id_tema";

        $resultado = $conexion->prepare($sql1);
        $resultado->execute(array(
            ":id_tema"     => $id_tema,
            ":titulo"      => $titulo,
            ":descripcion" => $descripcion,
            ":emailUser"   => $emailUser));

        header('location:../principal/?exitomodificar');
    }
}
include '../views/definiciones/modificar_definicion.view.php';
