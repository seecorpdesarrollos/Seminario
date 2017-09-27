<?php

class EnlacesPaginas
{

    public function enlacesPaginasModel($get)
    {

        if ($get == "errorPass" or $get == "login" or $get == "okRegistro" or $get == 'errorCamposVacio' or $get == 'errorEmail' or $get == 'errorCaptcha') {

            $module = "views/modules/login/login.php";
        } else if ($get == 'session') {
            $module = "views/modules/login/session.php";

        } else if ($get == 'sessionTime') {
            $module = "views/modules/login/sessionTime.php";

        } else if ($get == 'recover' or $get == 'noEmail') {
            $module = "views/modules/login/recover.php";

        } else if ($get == 'recoverPass') {
            $module = "views/modules/login/recoverPass.php";

        } else if ($get == 'errorIngreso') {
            $module = "views/modules/login/errorIngreso.php";

        } else if ($get == 'ingresoTime') {
            $module = "views/modules/login/ingresoTime.php";

        } else if ($get == 'validarIngreso' or $get == 'validarIngresoError') {
            $module = "views/modules/login/validarIngreso.php";

        } elseif ($get == 'principal') {
            $module = "admin/principal.php";

        } elseif ($get == 'almaceSubir') {
            $module = "admin/almacenaje/almaceSubir.php";

        } elseif ($get == 'chat') {
            $module = "admin/chat/chat.php";

        } elseif ($get == 'totalMensaje') {
            $module = "admin/chat/totalMensaje.php";

        } elseif ($get == 'almaceList') {
            $module = "admin/almacenaje/almaceList.php";

        } elseif ($get == 'share') {
            $module = "admin/almacenaje/share.php";

        }
        // enciclopedia

        elseif ($get == 'exitoagregar' or $get == 'exitoDelete') {
            $module = "admin/enciclopedia/temas.php";

        } elseif ($get == 'temaIndividual') {
            $module = "admin/enciclopedia/php/temaIndividual.php";

        } elseif ($get == 'votar') {
            $module = "admin/enciclopedia/php/votar.php";

        } elseif ($get == 'modificar') {
            $module = "admin/enciclopedia/php/modificar.php";

        } elseif ($get == 'eliminar') {
            $module = "admin/enciclopedia/php/eliminar.php";

        }

        // Fin enciclopedia

        elseif ($get == 'recorList') {
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

        } elseif ($get == 'perfil' or $get == 'nombreVacio') {
            $module = "admin/config/perfil.php";

        } elseif ($get == 'passChange') {
            $module = "admin/config/passChange.php";

        } elseif ($get == 'errorPassChange') {
            $module = "admin/config/passChange.php";

        } elseif ($get == 'exitopassChange') {
            $module = "admin/config/passChange.php";

        } else {

            $module = "views/modules/index.php";

        }

        return $module;

    }

}
