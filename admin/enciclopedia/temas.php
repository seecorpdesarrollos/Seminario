<?php

if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];
    require 'php/temas.php';
}

if (isset($_POST['agregar'])) {

    $email = $_SESSION['emailUser'];

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

    if ($titulo == '') {
        echo 'ingresar titulo';
    } elseif ($descripcion == '') {
        echo 'Ingresar Descripcion';
    } else {
        // /*Insert A Tabla usuario*/

        $sql = $conexion->prepare('INSERT INTO themes (title, description,emailUser,dataTheme )
         VALUES (:titulo,:descripcion,:emailUser,:fecha)');

        if ($sql->execute(array(
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':emailUser' => $email,
            ':fecha' => $fecha,
        ))) {
            header('location:exitoagregar');

        } else {

            header('location:exitoagregar?mallllll');
        }

    }
}

?>
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
                                    Enciclopedia Temas
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
                <section class="dashboard-counts no-padding-bottom" ">
                    <div class="container-fluid">
                        <div class="bg-white has-shadow">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (isset($_GET['action'])): ?>
                                        <?php if ($_GET['action'] == 'exitoagregar'): ?>
                                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                &times;
                                            </span>
                                        </button>
                                        <strong>
                                            Exitos!
                                        </strong>
                                        El tema fue creado
                                        <i class="text-primary fa fa-thumbs-o-up" aria-hidden="true">
                                        </i>
                                        <meta http-equiv="refresh" content="2;url=temas">
                                    </div>
                                        <?php endif?>
                                        <?php if ($_GET['action'] == 'exitoDelete'): ?>
                                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                &times;
                                            </span>
                                        </button>
                                        <strong>
                                            Exitos!
                                        </strong>
                                        El tema fue borrado de la base de datos
                                        <i class="text-primary fa fa-thumbs-o-up" aria-hidden="true">
                                        </i>
                                        <meta http-equiv="refresh" content="2;url=temas">
                                    </div>
                                        <?php endif?>
                                    <?php endif?>

                                </div>

                             <div class="col-lg-7">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                       <center>
                                           <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#agregar">
                                              <i class="fa fa-plus"></i> Agregar temas nuevos
                                            </button>
                                       </center>
                                    </li>
                                </ul>
                            </div>
                            </div>
            <div class="row">
                <div class="col-md-12">
                     <div class="card text-center">
                        <div class="card-header bg-primary text-white">
                    <?php foreach ($rcantidad as $cantidad): ?>
                            <h4 class="card-title ">
                               Cantidad de temas creados:
                        <?php echo $cantidad->cantidad; ?>
                    <?php endforeach;?>
                            </h4>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="tabla">
                      <?php include 'admin/enciclopedia/php/consultaPaginacion.php';?>
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



<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="agregar" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="text-success fa fa-plus">
                    </i>
                    Agregar Nueva definición
                </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formulario">
                    <div class="form-group" id="form">
                        <label class="form-control-label" for="titulo">
                            Titulo:
                        </label>
                        <input class="form-control" placeholder="titulo" id="titulo" required="" name="titulo" type="text">

                        </input>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="descripcion">
                            Descripción:
                        </label>

                       <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="descripcion" required=""></textarea>

                        </input>
                    </div>
                    <div class="form-group">
                     <input readonly="" type="hidden"  name="fecha" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" >
                    </div>
                        <div class="modal-footer">
                           <button class="btn btn-outline-danger" type="button" data-dismiss="modal" aria-label="Close" >
                                Cerrar
                            </button>
                            <button class="btn btn-outline-primary" id="button" name="agregar" type="submit">
                                Agregar definición
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>



<script type="text/javascript">

            $(function(){
    $("#button").on("click", function(){

$( "#formulario" ).validate({
  rules: {
    titulo: {
      required: true
    },
    descripcion: {
      required: true
  }


  },
   messages:
    {
        titulo: {required: '<p class="text-danger">El titulo es requerido</p>'},
        descripcion:{required: '<p class="text-danger">La descripcion es requerida</p>'}
    }


        });


    });
});


</script>

