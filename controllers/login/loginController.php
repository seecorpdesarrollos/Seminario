<?php

class loginUsuarioCon
{
    public function registroUsuarioController()
    {
        if (isset($_POST['registro'])) {
            $datosController = array(
                'nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'],
                'password' => $_POST['password'],
                'password2' => $_POST['password2'],
            );

            if ($_POST['password'] != $_POST['password2']) {
                header('location:errorPass');
            } else {

                $respuesta = loginUsuario::registroUsuarioModel($datosController, 'user');

                if ($respuesta == 'success') {
                    header('location:okRegistro');
                }
            }
        }
    }

    public function ingresoUsarioController()
    {
        if (isset($_POST['ingresar'])) {
            $datosController = array(
                'emailUser' => $_POST['emailUser'],
                'passwordUser' => $_POST['passwordUser'],
            );

            $respuesta = loginUsuario::ingresarUsuarioModel($datosController, 'user');
            // var_dump($respuesta);
            if (!$respuesta) {
                header('location:errorIngreso');

            } else {

                session_start();
                $_SESSION['nameUser'] = $respuesta['nameUser'];
                $_SESSION['emailUser'] = $respuesta['emailUser'];

                header('location:principal');
            }

        }
    }
}
