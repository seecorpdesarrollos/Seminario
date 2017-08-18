<?php

class EnlacesPaginas
{

    public function enlacesPaginasModel($get)
    {

        if ($get == "index" or $get == "" or $get == "") {

            $module = "views/modules/" . $get . ".php";

            if ($get == "index") {

                $module = "views/modules/index.php";

            }
        } else {

            $module = "views/modules/login/login.php";

        }

        return $module;

    }

}
