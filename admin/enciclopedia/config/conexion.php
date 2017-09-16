<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=memorium', 'root', '');
} catch (Exception $e) {
    echo "ERROR" . $e->getMessage();

}
