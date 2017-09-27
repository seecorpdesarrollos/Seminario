<?php
require 'admin/enciclopedia/config/conexion.php';
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {
    $name = ucwords($_SESSION['nameUser']);
    $emailUser = $_SESSION['emailUser'];

    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $rtheme = $conexion->prepare("SELECT * FROM themes them JOIN users us ON them.emailUser=us.emailUser WHERE idTheme = ?");
        $rtheme->execute(array($id));
        $res = $rtheme->fetch();

    }
}
?>

  <?php $calculo = ($res['points'] == 0) ? 0 : round(($res['points'] / $res['votes']), 1);?>

  <div class="row id">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header  text-center">
                  <h4 class="card-title">Título:</h4>
                  <span class="text-danger"><?php echo ucwords($res['title']); ?></span>

              </div>
              <div class="card-block">
                <h4 class="card-title">Descripción:</h4>
                <p class="card-text"> <?php echo $res['description']; ?></p>

              </div>
              <div class="card-footer text-muted text-center">
                <span class="text-danger">Propietario:</span>
                <?php echo ucwords($res['nameUser']) ?><br>
                <span class="text-danger">Fecha:</span>
                <?php echo date('d-m-Y H:i', strtotime($res['dataTheme'])); ?>
              </div>
          </div>
          <a href="temas" class="btn btn-outline-primary btn-block top">
       <i class="fa fa-fast-backward" aria-hidden="true"></i>
    </a>

      </div>
      <div class="col-md-4">
         <div class="card">
          <div class="card-block">
            <h3 class="card-title">Valoracion:</h3>
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
echo '</span></div><strong><p class="yavoto"><span id="ya">' . '</span> </p></strong>';
?>
                    </span>
          <?php if ($res['emailUser'] == $emailUser): ?>
   <a href="index.php?action=modificar&idtema=<?php echo $res['idTheme'] ?>" class="btn btn-outline-primary top">
      <i class="fa fa-pencil-square-o fa-2x"></i>
    </a>
 <a  href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#eliminar">
  <i class="fa fa-trash fa-2x"></i>
</a>
      <?php else: ?>
         <div class="alert alert-danger" role="alert">
             <strong>Lo sentimos!</strong> Usted no es el propietario.
         </div>
        <?php endif?>
                </div>
            </p>

          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar la publicación?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancelar</button>
        <a href="index.php?action=eliminar&idtemaE=<?php echo $res['idTheme'] ?>" class="btn btn-outline-danger">
          Aceptar
    </a>
      </div>
    </div>
  </div>
</div>