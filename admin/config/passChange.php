
<?php
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {

    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

?>

   <?php include 'admin/header/head.php';?>
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
                                Página  <small><i class="text-danger">Cambio de contraseña</i></small>
                            </h2>
                            <h2 class="version float-lg-right">
                                Memorium  <small><i class="text-danger">versión 1.0</i></small>
                            </h2>
                        </div>
                    </header>
                    <!-- Dashboard Counts Section-->
                    <section class="dashboard-counts no-padding-bottom">
                        <div class="container-fluid">
                            <div class="row bg-white has-shadow">
                                   <div class="col-lg-12 ">
                                        <?php if (isset($_GET['action'])): ?>
                                            <?php if ($_GET['action'] == 'errorPassChange'): ?>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  <strong>Envio fallido !</strong>Se produjo algun error.Por favor revise los campos
                                                </div>
                                            <?php endif?>
                                            <?php if ($_GET['action'] == 'exitopassChange'): ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  <strong>Cambio exitoso !</strong>Se ha producido el cambio de su contraseña . En la proxima entrada al sistema ingrese con la nueva contraseña.
                                                </div>
                                            <?php endif?>
                                        <?php endif?>
                                        <div class="alert alert-info" role="alert">
                                           <strong>¿Quiere cambiar su contraseña?</strong><br>
                                           <span>
                                               En esta sección podrá cambiar su contraseña.
                                           </span>
                                       </div>
                                   </div>
                               <div class="col-lg-5 m-auto">
                               <hr>
                                    <form method="post" id="formulario">
                                     <div class="form-group">
                                       <label for="formGroupExampleInput2">Nueva Contraseña </label>
                                       <input type="password" class="form-control" name="password" id="password" >
                                     </div>
                                     <div class="form-group">
                                       <label for="formGroupExampleInput2">Repita su Contraseña </label>
                                       <input type="password" class="form-control" name="password2" id="password2" placeholder="">
                                     </div>
                                       <span id="pass"></span>
                                     <input type="submit" name="change" id="change" class="btn btn-outline-danger btn-block" value="Aceptar cambios">
                                   </form>
                               </div>
                            </div>
                        </div>
<?php
$change = new configController();
$change->changeController();
?>
                    </section>
                    <!-- Dashboard Header Section    -->


                    <!-- Page Footer-->
                    <footer class="main-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                       Copyright <i class="fa fa-copyright"></i> Memorium  <?php echo date('Y') ?> <small>Todo los derechos reservados.</small>
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