<?php

require '../config/conexion.php';

$_SESION['emailUser'] = "davidhnmunoz@gmail.com";
$email                = "davidhnmunoz@gmail.com";

$cantidad = $conexion->prepare("SELECT  count(them.idTheme) as 'cantidad' FROM themes them");

$rcantidad = $cantidad->execute();

$rcantidad = $cantidad->fetchAll(PDO::FETCH_OBJ);

$temas = $conexion->prepare("
SELECT them.idTheme  as 'them_id',them.title,them.description,us.nameUser




 FROM
 themes them
  JOIN users us  ON them.emailUser= us.emailUser
WHERE them.idTheme=them.idTheme GROUP BY them.idTheme

  ");

$rtemas = $temas->execute();
$rtemas = $temas->fetchAll(PDO::FETCH_OBJ);

require '../views/index.view.php';
