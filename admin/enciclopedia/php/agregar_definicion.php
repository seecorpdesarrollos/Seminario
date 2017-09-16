<?php
require '../../enciclopedia/config/conexion.php';
// require_once 'admin/enciclopedia/config/conexion.php';

if (isset($_POST['agregar'])) {

    $email = $_SESSION['emailUser'];

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

    if ($titulo == '') {
        echo 'ingresar titulo';
    } elseif ($descripcion == '') {
        echo 'Ingresar Descripcion';
    } else {

        /*Insert A Tabla usuario*/

        $sql = $conexion->prepare('INSERT INTO themes (emailUser ,title, description,datatheme   )

            VALUES ( :emailUser ,:titulo ,:descripcion,:fecha )');

        $sql->execute(array(

            ':emailUser' => $emailUser,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':fecha' => $fecha,

        ));

        header('location:temas?exitoagregar');
    }
}
