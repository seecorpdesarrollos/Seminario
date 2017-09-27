<?php
if (!isset($_SESSION['emailUser'])) {header('location:login');} else { $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];}?>
<?php include 'admin/header/head.php';?>
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
                                    Almacenaje Subir
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
                        <div class="bg-white has-shadow">
                            <form method="post" action="admin/almacenaje/php/almacenSubir.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                Nombre del archivo
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="nameStorage" aria-describedby="emailHelp" placeholder="Nombre del Archivo" required=""/>
                                            <small id="emailHelp" class="form-text text-muted">
                                                El nombre del archivo es importante para su posterior localización.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                             <label for="exampleInputFile">
                                                Elegir archivo
                                            </label>
                                        <input type="file" name="storage" class="btn btn-outline-primary cursor file"/>
                                            <small id="fileHelp" class="form-text text-muted">
                                                Recuerde que solo podrá subir achivos comprimidos rar o zip. Por Favor comprima sus archivos antes de subirlo a la nube.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                             <div class="row">
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="subirArchivo" class="btn btn-outline-primary btn-block">
                                       <i class="fa fa-files-o fa-spin">
                                       </i>
                                       Subir Archivo
                                   </button>
                               </div>
                            </div>
                            </form>
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
