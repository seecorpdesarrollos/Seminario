<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=memorium', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
} catch (Exception $e) {
    echo "ERROR" . $e->getMessage();

}
