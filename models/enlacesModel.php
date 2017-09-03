<?php

class EnlacesPaginas
{

    public function enlacesPaginasModel($get)
    {

        if ($get == "errorPass" or $get == "login" or $get == "okRegistro" or $get == 'errorCamposVacio') {

            $module = "views/modules/login/login.php";
        } else if ($get == 'session') {
            $module = "views/modules/login/session.php";

        } else if ($get == 'errorIngreso') {
            $module = "views/modules/login/errorIngreso.php";

        } elseif ($get == 'principal') {
            $module = "admin/principal.php";

        } elseif ($get == 'almaceSubir') {
            $module = "admin/almacenaje/almaceSubir.php";

        } elseif ($get == 'chat') {
            $module = "admin/chat/chat.php";

        } elseif ($get == 'almaceList') {
            $module = "admin/almacenaje/almaceList.php";

        } elseif ($get == 'recorList') {
            $module = "admin/recordatorio/recorList.php";

        } elseif ($get == 'recorSubir') {
            $module = "admin/recordatorio/recorSubir.php";

        } elseif ($get == 'temas') {
            $module = "admin/enciclopedia/temas.php";

        } elseif ($get == 'buscar') {
            $module = "admin/enciclopedia/buscar.php";

        } elseif ($get == 'eliminarArchivo') {
            $module = "admin/almacenaje/php/eliminarArchivo.php";

        } elseif ($get == 'descargarArchivo') {
            $module = "admin/almacenaje/php/descargarArchivo.php";

        } elseif ($get == 'wiki') {
            $module = "admin/enciclopedia/wiki.php";

        } else {

            $module = "views/modules/index.php";

        }

        return $module;

    }

}
