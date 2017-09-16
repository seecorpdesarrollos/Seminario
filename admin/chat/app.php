<?php session_start();if (!isset($_SESSION['emailUser'])) {header('location:login');} else { $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];
    $idEmisor = $_SESSION['id'];
}?>
<?php require_once '../../models/conexion.php';
$sql1 = Conexion::conectar()->
    prepare('SELECT * FROM messages ta
JOIN users us ON us.id = ta.idEmisor
ORDER BY  idMessage ');

$sql1->
    execute();
$result = $sql1->
    fetchAll();
if (!empty($_POST['mensage'])) {
    $mensage = $_POST['mensage'];
    $men = strip_tags($mensage);
    $men = htmlspecialchars($men);
    $men = trim($men);
    $sql = Conexion::conectar()->
        prepare("INSERT INTO messages (idEmisor,message) VALUES (:idEmisor,:mensage)");
    $sql->execute(array(
        ':idEmisor' => $idEmisor,
        ':mensage' => $men));
    echo " <audio autoplay> <source src='admin/assets/Beep.mp3' type='audio/mpeg'/> </audio> ";

    $sql1 = Conexion::conectar()->
        prepare('SELECT * FROM messages ta
JOIN users us ON us.id = ta.idEmisor
ORDER BY idMessage ');
    if ($sql1->execute()) {
        echo " <audio autoplay> <source src='admin/assets/Beep.mp3' type='audio/mpeg'/> </audio> ";

        $result = $sql1->fetchAll();
    }
}
?>
<!-- chat -->

<div class="panel card ">
    <div class="panel-body body-panel" id="body">
        <?php foreach ($result as $key): ?>
        <?php if ($key['emailUser'] != $email): ?>
        <ul class="chat">
            <li class="left clearfix">
                <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff&text=El" alt="User Avatar" class="img-circle"/>
                </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="text-info">
                            <?php echo $key['nameUser'] ?>
                        </strong>
                        <small class="pull-right text-muted text-success">
                            <i class="fa fa-clock-o" aria-hidden="true">
                            </i>
                            <?php echo date('d-m | H:i', strtotime($key['dataMessage'])) ?>
                        </small>
                    </div>
                    <p class="text-gray-dark">
                        <?php echo $key['message'] . '.' ?>
                    </p>
                </div>
            </li>
            <?php else: ?>
            <li class="right clearfix">
                <span class="chat-img pull-right">
                    <img src="http://placehold.it/50/FA6F57/fff&text=Yo" alt="User Avatar" class="img-circle"/>
                </span>
                <div class="chat-body clearfix">
                    <div class="header">
                        <small class="text-muted text-success">
                            <i class="fa fa-clock-o" aria-hidden="true">
                            </i>
                            <?php echo date('d-m | H:i', strtotime($key['dataMessage'])) ?>
                        </small>
                        <strong class="pull-right text-danger">
                            <?php echo $key['nameUser'] ?>
                        </strong>
                    </div>

                    <p class="text-gray-dark text-right">
                        <?php echo $key['message'] . '.' ?>
                    </p>
                </div>
            </li>
            <?php endif?>
            <?php endforeach?>
        </ul>
    </div>
</div>
