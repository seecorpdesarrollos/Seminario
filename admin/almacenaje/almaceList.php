
<?php
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    // require 'models/conexion.php';
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
                                Página  <small><i class="text-danger">Almacenaje Listado</i></small>
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
                                    <table class="table table-bordered " id="tabla">
                                        <thead class="bg-primary text-white">
                                         <th class="text-lg-center">Nombre del Archivo</th>
                                         <th class="text-lg-center">Archivo</th>
                                         <th class="text-lg-center">Acciones</th>
                                        </thead>
                                        <?php $result = almacenController::getAlmacenController();?>
                                            <tbody>
                                            <?php foreach ($result as $key): ?>
                                               <tr>
                                                   <td align="center"><?php echo $key['nameStorage'] ?></td>
                                                   <td align="center"><?php echo $key['storagePath'] ?></td>
                                                   <td align="center">
                                                   <a href="index.php?action=descargarArchivo&idStorage=<?php echo $key['idStorage'] ?>&storagePath=<?php echo $key['storagePath'] ?>"><i class="fa fa-download btn btn-success"  data-toggle="tooltip" data-placement="top" title="Descargar el Archivo"></i> </a>
                                                   <a href="index.php?action=eliminarArchivo&idStorage=<?php echo $key['idStorage'] ?>&storagePath=<?php echo $key['storagePath'] ?> &nameStorage=<?php echo $key['nameStorage'] ?>"><i class="fa fa-trash btn btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Eliminar el Archivo"></i></a></td>
                                               </tr>
                                            <?php endforeach?>

                                            </tbody>
                                    </table>
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