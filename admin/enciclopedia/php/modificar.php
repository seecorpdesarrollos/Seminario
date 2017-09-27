<?php
require 'admin/enciclopedia/config/conexion.php';
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}
if (isset($_GET['idtema'])) {
    $idtema = $_GET['idtema'];
    $rtheme = $conexion->prepare("SELECT * FROM themes them JOIN users us ON them.emailUser=us.emailUser WHERE idTheme = :idtema");
    $rtheme->execute(array(':idtema' => $idtema));
    $result = $rtheme->fetchAll();
    foreach ($result as $key) {
        # code...
    }
}

if (isset($_POST['modificar'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = $conexion->prepare("UPDATE themes SET title=:title, description=:description WHERE idTheme=:idTheme");
    $sql->execute(array(
        ':title' => $title,
        ':description' => $description,
        ':idTheme' => $idtema,
    ));
    header('location:temas');
}
?>

   <?php $calculo = ($key['points'] == 0) ? 0 : round(($key['points'] / $key['votes']), 1);?>

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
                                Página  <small><i class="text-danger">Tema individual </i></small>
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
                                <div class="row id">
      <div class="col-md-8">
        <form method="post">
          <div class="card">
              <div class="card-header  text-center">
                <?php foreach ($result as $res): ?>

                  <h4 class="card-title">Título:</h4>
                  <!-- <span class="text-danger"></span> -->
                  <input type="text" class="form-control" name="title" value="<?php echo ucwords($res['title']); ?>">
              </div>
              <div class="card-block">
                <h4 class="card-title">Descripción:</h4>
                <textarea class="form-control text-left" rows="7" name="description">

                <?php echo $res['description']; ?>
                </textarea>

              </div>
              <div class="card-footer text-muted text-center">
                <span class="text-danger">Propietario:</span>
                <?php echo ucwords($res['nameUser']) ?><br>
                <span class="text-danger">Fecha:</span>
                <?php echo date('d-m-Y H:i', strtotime($res['dataTheme'])); ?>
              </div>
          </div>
          <button type="submit" name="modificar" class="btn btn-outline-primary btn-block top">
         <i class="fa fa-fast-backward" aria-hidden="true"></i> Editar
         </button>
    </form>

      </div>
      <div class="col-md-4">
         <div class="card">
          <div class="card-block">
            <h3 class="card-title">Valoracion:</h3>
            <form>

            <p class="card-text">
                 <span class="ratingAverage" data-average=" <?php echo $calculo; ?> ">
                </span>
                <span class="article" data-id=" <?php echo $id; ?> ">
                </span>
                  <div  class="barra">
                    <span class="bg">
                    </span>
                    <span class="stars">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="star" data-vote=" <?php echo $i; ?> ">
                            <span class="starAbsolute">
                            </span>
                        </span>
                        <?php endfor;
echo ' </span></div><p class="votos"><span> </span>Cantidad de votos:' . ' ' . $res['votes'] . '<br>  Ranking: ' . $calculo . ' </p>';
?>
                    </span>

 <a  href="temas" class="btn btn-outline-danger">
  <i class="fa fa-sign-out fa-2x"></i> Salir sin modificar
</a>
                </div>
                <?php endforeach?>
            </p>

          </div>
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
