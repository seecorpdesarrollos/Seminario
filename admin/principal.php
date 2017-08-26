<?php session_start();
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

?>

   <?php include 'header/head.php';?>
    <body>
        <div class="page home-page">
            <!-- Main Navbar-->
        <?php include 'header/cabezera.php';?>
        <!-- fin cabezera -->
            <div class="page-content d-flex align-items-stretch">

                <!-- Side Navbar -->
                <?php include 'header/navegacion.php';?>
                 <!-- Fin navegacion -->
                <div class="content-inner">
                    <!-- Page Header-->
                    <header class="page-header">
                        <div class="container-fluid">
                            <h2 class="no-margin-bottom">
                                Memorium  <small><i class="text-danger">versión 1.0</i></small>
                            </h2>
                        </div>
                    </header>
                    <!-- Dashboard Counts Section-->
                    <section class="dashboard-counts no-padding-bottom">
                        <div class="container-fluid">
                            <div class="row bg-white has-shadow">
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-violet">
                                            <i class="icon-user"  data-toggle="tooltip" data-placement="top" title="Cantidad de Recordatorios Pendientes">
                                            </i>
                                        </div>
                                        <div class="title" data-toggle="tooltip" data-placement="top" title="Cantidad de Recordatorios Pendientes">
                                            <span>
                                                Nuevos
                                                <br/>
                                                Recor.
                                            </span>
                                            <div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="number" data-toggle="tooltip" data-placement="top" title="Cantidad de Recordatorios Pendientes">
                                            <strong>
                                                25
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-red">
                                            <i class="icon-padnote" data-toggle="tooltip" data-placement="top" title="Cantidad de Archivos Subidos">
                                            </i>
                                        </div>
                                        <div class="title" data-toggle="tooltip" data-placement="top" title="Cantidad de Archivos Subidos">
                                            <span>
                                                Archivos
                                                <br/>
                                                Nube
                                            </span>
                                            <div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="number" data-toggle="tooltip" data-placement="top" title="Cantidad de Archivos Subidos">
                                            <strong>
                                                70
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-green">
                                            <i class="icon-bill">
                                            </i>
                                        </div>
                                        <div class="title">
                                            <span>
                                                New
                                                <br/>
                                                Invoices
                                            </span>
                                            <div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="number">
                                            <strong>
                                                44
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-orange">
                                            <i class="icon-check">
                                            </i>
                                        </div>
                                        <div class="title">
                                            <span>
                                                Open
                                                <br/>
                                                Cases
                                            </span>
                                            <div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="number">
                                            <strong>
                                                35
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Dashboard Header Section    -->











<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>






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
                                    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
