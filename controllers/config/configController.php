<?php

class configController
{

    public static function changeController()
    {

        if (isset($_POST['change'])) {
            $datosController = array(
                'password' => $_POST['password'],
                'pasword2' => $_POST['password2'],
            );
            if ($_POST['password'] != $_POST['password2']) {
                header('location:errorPassChange');
            } else {
                $respuesta = configModel::changeModel($datosController, 'users');

                if ($respuesta == 'success') {
                    header('location:exitopassChange');
                }
                if ($respuesta == 'error') {
                    header('location:errorPassChange');
                }
            }

        }
    }
}
