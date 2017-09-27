<?php
if (!isset($_SESSION['emailUser'])) {header('location:login');} else { $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];}?>
<?php include 'admin/header/head.php';?>
                    <?php
require_once 'models/conexion.php';

if (isset($_POST['subirImagen'])) {
    $file_name = $_FILES['imagen']['name'];
    $carpeta = $_SERVER['DOCUMENT_ROOT'] . "/Seminario/archivosSubidos/$email/";
    $i = 'favicon.ico';
    move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $i);
}
if (isset($_POST['cambiarNombre'])) {
    $nameUser = trim($_POST['nombreUser']);
    if (empty($nameUser)) {
        header('location:nombreVacio');
    }
    $sql = Conexion::conectar()->prepare('UPDATE users SET nameUser=:nameUser WHERE emailUser = :emailUser');
    $sql->execute(array(':nameUser' => $nameUser, ':emailUser' => $email));
}

?>
 <script src="admin/assets/js/timer.js"></script>
<body>
    <div class="page home-page">
        <!-- Main Navbar-->
        <?php include 'admin/header/cabezera.php';?>
        <!-- fin cabezera -->
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php include 'admin/header/navegacion.php';?>
            <!-- Fin navegacion -->
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">
                            Página
                            <small>
                                <i class="text-danger">
                                   Cambio de contraseña
                                </i>
                            </small>
                        </h2>
                        <h2 class="version float-lg-right">
                            Memorium
                            <small>
                                <i class="text-danger">
                                    versión 1.0
                                </i>
                            </small>
                        </h2>
                    </div>
                </header>
                <!-- Dashboard Counts Section-->

                <section class="dashboard-counts no-padding-bottom">
                    <div class="container-fluid">
                        <div class="row bg-white has-shadow">
                        <div class="col-md-12">
                          <?php if (isset($_GET['action'])): ?>
                            <?php if ($_GET['action'] == 'nombreVacio'): ?>
                              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>Lo sentimos!</strong> El campo nombre no pueder esta vacio.
                            </div>
                            <?php endif?>
                          <?php endif?>
                        </div>
                            <div class="col-md-6">
                             <div class="card text-center">
                              <div class="card-header">
                                   Cambio del Nombre de usuario
                              </div>
                                  <div class="card-block">
                                <form method="post">
                                  <div class="form-group">
                                    <label for="formGroupExampleInput">Nombre usuario</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="nombreUser" required="" >
                                  </div>

                                  <input type="submit" class="btn btn-primary btn-block" name="cambiarNombre" value="Cambiar nombre">
                               </form>
                               <p class="card-text text">El nombre tendria que ser representativo para que otros usuarios lo puedan identificar .</p>
                               <small>(recomendación nombre y apellido)</small>
                               </div>
                                <div class="card-footer text-muted">
                                    Puede cambiarlo cuantas veces quiera
                                  </div>
                               </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="card text-center">
                                  <div class="card-header">
                                    Foto de perfil
                                  </div>
                                  <div class="card-block">
                                    <h4 class="card-title">Seleccione una foto para su perfil</h4>
                                    <p class="card-text">Si no se visualiza la foto que subió,
                                    precione Ctrl + F5 para borrar sus cookies .</p>
                                     <form method="post" enctype="multipart/form-data" >
                                       <input type="file" name="imagen" class="btn btn-outline-danger su">
                                      <input type="submit" class="btn btn-danger subir" name="subirImagen" value="Cambiar foto">
                                      </form>
                                  </div>
                                  <small>(Extencion de la foto .jpg , .png)</small>
                                  <div class="card-footer text-muted">
                                    Puede cambiarla cuantas veces quiera
                                  </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Header Section    -->

                <!-- Page Footer-->
                <footer class="main-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    Copyright
                                    <i class="fa fa-copyright">
                                    </i>
                                    Memorium
                                    <?php echo date('Y') ?>
                                    <small>
                                        Todo los derechos reservados.
                                    </small>
                                </p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>
                                    Desarrollado
                                    <a href="https://diegopennisi.es" target="_blank" class="external">
                                        Diego Pennisi.
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <?php include 'admin/header/modal/modalSesion.php';?>
    <?php include 'admin/header/modal/desconectado.php';?>
