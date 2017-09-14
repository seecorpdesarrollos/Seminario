<?php
if (!isset($_SESSION['emailUser'])) {header('location:login');} else { $name = ucwords($_SESSION['nameUser']);
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
                            Página
                            <small>
                                <i class="text-danger">
                                    Compartir archivos
                                </i>
                                <h4 class="version text-md-center">
<?php
$user = Conexion::conectar()->prepare('SELECT count(*)as "total" FROM share WHERE emailUser=:emailUser');
$user->execute(array(':emailUser' => $email));
$res = $user->fetch();

$a = $res['total'];
echo 'Total de archivos subidos: ' . ' ' . $a;
?>
                                </h4>
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
                            <div class="col-lg-12">
                                <div class="alert alert-danger" role="alert">
                                    <center><strong>Archivos para compartir</strong></center>
                                   <p>
                                       Podrá compartir solamente 2 archivos por usuario y la extenciones soportadas es .zip o .rar y solamente no puede superar los 10 Megas por archivos . Y cada usuario puede compartir solamente 3 archivos.
                                   </p>
                                </div>
                            </div>
                            <?php if ($a == 3): ?>
                            <div class="col-lg-12">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item active">Usted ha llegado al limite de archivos compartidos.</li>
                                </ol>
                            </div>
                            <?php else: ?>
                            <div class="col-lg-12">
                                <form action="admin/almacenaje/php/shareSubir.php" class="dropzone needesclick dz-clickable" id="dropzone">
                                     <div class="dz-message needsclick">
                                         Arrastre aquí susu archivos o haga click para seleccionarlo.
                                     </div>
                                  <div class="fallback">
                                    <input name="file" type="file" multiple id="archivos" />
                                  </div>
                                </form>

                                <script>
                                    Dropzone.options.dropzone = {
                                        maxFilesize:10,
                                        acceptedFiles:".zip,.rar",
                                        dictDefaultMessage: "Arrastra los archivos aqui para subirlos",
                                        dictFallbackMessage: "Su navegador no soporta arrastrar y soltar para subir archivos.",
                                        dictFallbackText: "Por favor utilize el formuario de reserva de abajo como en los viejos timepos.",
                                        dictFileTooBig: "El archivo es demaciado grande ({{filesize}}Megas). El tamaño máximo es de : {{maxFilesize}}Megas.",
                                        dictInvalidFileType: "No se puede subir este tipo de archivos. Solamente .zip, .rar",
                                        dictResponseError: "Server responded with {{statusCode}} code.",
                                        dictCancelUpload: "Cancel subida",
                                        dictCancelUploadConfirmation: "¿Seguro que desea cancelar esta subida?",
                                        dictRemoveFile: "Eliminar archivo",
                                        dictRemoveFileConfirmation: null,
                                        dictMaxFilesExceeded: "Se ha excedido el numero de archivos permitidos.",
                                        init: function() {
                                            this.on("complete", function(file)
                                             { setTimeout("location.reload()", 3000);;});
                                          }
                                    };
                                </script>
                            </div>
                            <?php endif?>

                            <div class="col-md-3 m-auto">
                                <button type="button" class="btn btn-primary subirArchivo" data-toggle="modal" data-target="#exampleModal-modal-lg">
                                  Ver archivos compartidos
                                </button>
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <br><br>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Descarga de archivos compartidos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 300px ;overflow: auto;">
<table class="table table-bordered " id="tabla">
    <thead class="bg-primary text-white">
     <th class="text-lg-center">Nombre del Archivo</th>
     <th class="text-lg-center">Usuario compartidor</th>
     <th class="text-lg-center">Acciones</th>
    </thead>
    <?php $result = almacenController::getShareController();?>
        <tbody>
        <?php foreach ($result as $key): ?>
           <tr>
               <td align="center"><?php echo $key['nameShare'] ?></td>
               <td align="center"><?php echo $key['emailUser'] ?></td>
               <td align="center">
               <a href="index.php?action=descargarArchivo&idShare=<?php echo $key['idShare'] ?>&nameShare=<?php echo $key['nameShare'] ?>"><i class="fa fa-download btn btn-success"  data-toggle="tooltip" data-placement="top" title="Descargar el Archivo"></i> </a>
               <a href="index.php?action=eliminarArchivo&idShare=<?php echo $key['idShare'] ?>&sharePath=<?php echo $key['sharePath'] ?> &nameShare=<?php echo $key['nameShare'] ?>"><i class="fa fa-trash btn btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Eliminar el Archivo"></i></a></td>
           </tr>
        <?php endforeach?>

        </tbody>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar panel</button>

      </div>
    </div>
  </div>
</div>