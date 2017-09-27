    <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-dedent">
            </i>
        </button>
        <a class="navbar-brand  memorium" href="recover">
            <img src="views/bootstrap/image/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt=""/>
            ¿Te olvidaste la contraseña?
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-white">
                            ¿Tenés cuenta? Inicia Sesión
                        </span>
                    </a>
                    <!-- login -->
                    <?php if (!isset($_SESSION['emailUser'])): ?>
                        <?php require 'login.Modal.php';?>
                    <?php else: ?>
                    <!-- Sesion iniciada -->
                        <?php require 'sesionModal.php';?>
                    <?php endif?>
                </li>
            </ul>
        </div>
    </nav>
<body class="body">

    <!-- Fin del navbar y del MiniFormulario -->
    <div class="row">
        <div class="col-md-6 offset-md-3">
         <?php if (isset($_GET['action'])): ?>
                <?php if ($_GET['action'] == 'okRegistro'): ?>
                <center>
                    <div class="alert alert-success" role="alert">
                        <strong>
                            Felicidades!
                        </strong>
                        Uds se ha sido registrado con exito.
                        <strong><br>
                            Por favor verifique su correo, que le hemos enviado un código de activacion!
                        </strong>
                         <meta http-equiv="refresh" content="2; url=validarIngreso">
                    </div>
                </center>
                <?php endif?>
                 <?php if ($_GET['action'] == 'errorPass'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <center>
                        <strong>
                            Lo sentimos!
                        </strong>
                        Las contraseñas ingresadas o el código no coinciden.
                    </center>
                </div>
                <?php endif?>
                 <?php if ($_GET['action'] == 'errorCamposVacio'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <center>
                        <strong>
                            Lo sentimos!
                        </strong>
                        No pueden quedar ningun campo vacio.
                    </center>
                </div>
                <?php endif?>
                 <?php if ($_GET['action'] == 'errorEmail'): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                    <center>
                        <strong>
                            Lo sentimos!
                        </strong>
                        El email que intento registrar ya se encuentra en nuestra base de datos.
                    </center>
                </div>
                <?php endif?>
                <?php endif?>
            <section class="main">
                <h4>
                    Únete hoy a Memorium.

                </h4>
            </section>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <section class="head">
                <form method="post" id="formulario">
                    <div class="form-group" id="nombreDiv">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" autofocus=""/>
                    </div>
                    <div class="form-group" id="form">
                        <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico" value=""/>
                        <span id="email"></span>
                    </div>
                    <div class="form-group" id="passwordDiv">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña"/>
                    </div>
                    <div class="form-group" id="password2Div">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Repita su Contraseña"/>
                         <span id="pass"></span>
                    </div>
                    <div class="form-group" id="codigoDiv">
                        <input type="text" class="form-control cod" id="codigo" name="codigo" placeholder="Código"/>
                        <?php $ran = rand(1000, 100000);?>
                         <center><span id="rand"><?php echo $ran; ?></span></center>
                         <input type="hidden" name="codigo1" value="<?php echo $ran; ?>">
                    </div>
                    <button type="submit" id="registro" name="registro" class="btn btn-primary btn-block">
                        Registrarse
                    </button>
                </form>
                <small>
                    Al registrarte, aceptas las Condiciones de Servicio y la Política de Privacidad, incluyendo el Uso de Cookies.
                </small>
            </section>
        </div>
    </div>
</div>
<?php $registro = new loginUsuarioCon;
$registro->
    registroUsuarioController();
$registro->
    ingresoUsarioController();
?>
</body>