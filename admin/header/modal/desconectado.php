<?php
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {

    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}
require_once 'models/conexion.php';
$sql = Conexion::conectar()->prepare('SELECT estado FROM users WHERE emailUser=:emailUser');
$sql->execute(array(':emailUser' => $email));
$res = $sql->fetch();
foreach ($res as $key) {
}

if (isset($_POST['desconectar'])) {
    $sql = Conexion::conectar()->prepare("UPDATE users SET estado = 0 WHERE emailUser=:emailUser");
    $sql->execute(array(':emailUser' => $email));
    echo '<meta http-equiv="refresh" content="0">';
}

if (isset($_POST['conectar'])) {
    $sql = Conexion::conectar()->prepare("UPDATE users SET estado = 1 WHERE emailUser=:emailUser");
    $sql->execute(array(':emailUser' => $email));
    echo '<meta http-equiv="refresh" content="0">';
}

?>
<?php if ($key == 1): ?>

<div class="modal fade" id="desconectado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning text-lg-center"><i class="fa fa-edit"></i> ¿Desea cambiar su estado a Desconectado de la aplicación?.</p>
        <small><i>Recuerde que los usuarios no podrán visualisarlo en el chat</i></small>

      </div>
      <div class="modal-footer">
      <form method="post">
        <input type="submit" name="desconectar" class="btn btn-outline-primary" value="Aceptar">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
  <div class="modal fade" id="desconectado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning text-lg-center"><i class="fa fa-edit"></i> ¿Desea cambiar su estado a Conectado de la aplicación?.</p>
        <small><i>Recuerde que los usuarios podrán visualisarlo en el chat</i></small>

      </div>
      <div class="modal-footer">
      <form method="post">
        <input type="submit" name="conectar" class="btn btn-outline-primary" value="Aceptar">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php endif?>

