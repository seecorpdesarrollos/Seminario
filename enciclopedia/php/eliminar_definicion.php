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

if (isset($_GET['idtema'])) {
    $idtema = $_GET["idtema"];

    $sql = $conexion->prepare("SELECT
them.idTheme,them.title




 FROM
themes them

 WHERE them.idTheme=:idtema ");

    $sql->execute(array(':idtema' => $idtema));
    $res = $sql->fetchAll(PDO::FETCH_OBJ);

}

if (isset($_POST['eliminar'])) {
    $id_tema = $_POST["id_tema"];

    /*UPDATE tabla Definiciones*/
    $sql1 = $conexion->prepare("DELETE  FROM themes WHERE idTheme = :id_tema");

    $resultado = $sql1->execute(array(':id_tema' => $id_tema));

    header('location:../principal/?exitoeliminar');

}

require '../views/definiciones/eliminardefinicion.view.php';
