<?php

class EnlacesPaginas
{

    public function enlacesPaginasModel($get)
    {

        if ($get == "" or $get == "login" or $get == "") {

            $module = "views/modules/login/" . $get . ".php";

        } else {

            $module = "views/modules/login/login.php";

        }

        return $module;

    }

}
