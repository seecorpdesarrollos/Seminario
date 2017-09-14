    <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-dedent">
            </i>
        </button>
        <a class="navbar-brand  memorium" href="memorium">
            <img src="views/bootstrap/image/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt=""/>
            Memorium
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-white">
                            ¿Tenés cuenta? Inicia Sesión
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="row">
                            <div class=" col-md-12">
                                <div class="form">
                                    <form method="post">
                                        <div class="form-group ingreso">
                                            <p class="text-gray-dark">
                                                ¿Tenés Cuenta?
                                            </p>
                                            <hr class="hrLogin"/>
                                            <div class="input-group ">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o fa-fw">
                                                    </i>
                                                </span>
                                                <input class="form-control" type="text" placeholder="Correo del Usuario"  autofocus="" name="emailUser" required="" />
                                                <span id="message"></span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-key fa-fw" aria-hidden="true">
                                                    </i>
                                                </span>
                                                <input class="form-control" name="passwordUser" type="password" placeholder="Contraseña" required="" />
                                            </div>
                                        <?php if (!isset($_SESSION['nameUser'])): ?>
                                            <?php include 'btn.php'?>
                                        <?php endif?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <strong>
                            Ya puede iniciar sesión!
                        </strong>
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
                        Las contraseñas ingresadas no coinciden.
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