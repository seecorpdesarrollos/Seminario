<?php

class EnlacesPaginas
{

    public function enlacesPaginasModel($get)
    {

        if ($get == "errorPass" or $get == "login" or $get == "okRegistro") {

            $module = "views/modules/login/login.php";
        } else if ($get == 'session') {
            $module = "views/modules/login/session.php";

        } else if ($get == 'errorIngreso') {
            $module = "views/modules/login/errorIngreso.php";

        } elseif ($get == 'principal') {
            $module = "admin/principal.php";
        } else {

            $module = "views/modules/index.php";

        }

        return $module;

    }

}
