<?php
ob_start();

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
            $a = trim($_POST['nombre']);
            $b = trim($_POST['password']);
            $c = trim($_POST['password2']);

            if (empty($a) or empty($b) or empty($c)) {
                // echo "<span class='alert alert-danger'>El nombre es obligatorio.</span>";
                header('location:errorCamposVacio');
            } else {

                if ($_POST['password'] != $_POST['password2']) {
                    header('location:errorPass');

                } else {

                    $respuesta = loginUsuario::registroUsuarioModel($datosController, 'users');

                    if ($respuesta == 'success') {
                        mkdir($_SERVER['DOCUMENT_ROOT'] . '/Seminario/archivosSubidos/' . $_POST['correo']);
                        header('location:okRegistro');
                    }
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

            $respuesta = loginUsuario::ingresarUsuarioModel($datosController, 'users');
            // var_dump($respuesta);
            if (!$respuesta) {
                header('location:errorIngreso');

            } else {

                session_start();

                $_SESSION['nameUser'] = $respuesta['nameUser'];
                $_SESSION['dateUser'] = $respuesta['dateUser'];
                $_SESSION['emailUser'] = $respuesta['emailUser'];

                header('location:principal');
            }

        }
    }

    public function ingresoUsarioErrorController()
    {
        if (isset($_POST['ingresar'])) {
            $datosController = array(
                'emailUser' => $_POST['emailUser'],
                'passwordUser' => $_POST['passwordUser'],
            );

            $respuesta = loginUsuario::ingresarUsuarioModel($datosController, 'users');
            // var_dump($respuesta);
            if (!$respuesta) {
                header('location:errorIngreso');

            } else {

                if (isset($_SESSION)) {
                    session_destroy();
                    session_start();

                    $_SESSION['nameUser'] = $respuesta['nameUser'];
                    $_SESSION['dateUser'] = $respuesta['dateUser'];
                    $_SESSION['emailUser'] = $respuesta['emailUser'];

                    echo '<center><div class="alert alert-success"> Bienvenido <strong>' . ' ' . ucwords($respuesta['nameUser']) . '</strong></div>';
                    echo '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                         </center>';

                    echo "<META HTTP-EQUIV='Refresh' CONTENT='4; URL=principal'>";

                    // header('location:principal');
                }
            }

        }
    }

    public function validarCorreoController($validarCorreo)
    {
        $datosController = $validarCorreo;
        $respuesta = loginUsuario::validarCorreoModel($datosController, 'users');

        if ($respuesta) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
