
<?php session_start();
$name = ucwords($_SESSION['nameUser']);
$email = $_SESSION['emailUser'];
$dateUser = $_SESSION['dateUser'];
$idEmisor = $_SESSION['id'];

$param = $_GET['id'];
require_once '../../models/conexion.php';
$sql = Conexion::conectar()->prepare("SELECT * FROM messages
    WHERE idEmisor = :idEmisor ORDER BY idMessage DESC LIMIT 40
");
$sql->execute(array(':idEmisor' => $param));
$res = $sql->fetchAll();

?>
<span class="text-info"><h5>Se mostrarán los últimos 40 mensajes</h5></span>
<hr>
<div id="refresh">
<?php foreach ($res as $key): ?>
   <div class="emisor">
       <h2 class="text-center">
       <li class="badge badge-primary"><?php echo $key['message'] ?></li></h2>
       <h6 class="text-right hora"><span class="text-gray-dark">
       <i class="fa fa-clock-o" aria-hidden="true">
                            </i> <?php echo date('d-m-Y / H:i', strtotime($key['dataMessage'])) ?></span></h6>
   </div>

<?php endforeach?>
</div>


