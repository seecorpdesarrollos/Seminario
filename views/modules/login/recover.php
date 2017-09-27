<nav class="navbar navbar-light bg-white">
    <a class="navbar-brand text-Inicio" href="memorium">
        <span class="inicio">
            <img class="rounded" src="views/bootstrap/image/favicon.ico" width="25"/>
            Inicio
        </span>
    </a>
</nav>
<br/>
<div class="card text-center">
    <div class="card-header text-danger">
        <?php if (isset($_GET['action'])): ?>
        <?php if ($_GET['action'] == 'noEmail'): ?>
        <div class="alert alert-warning fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
           <strong>Error: </strong> Este email no corresponde a un usuario. Por favor verifique su el email ingresado.
        </div>
        <?php endif?>

        <?php endif?>
      Recupera tu contraseña
    </div>
    <div class="card-block">
        <h4 class="card-title">
           <i class="fa fa-message"></i> Ingresa tu correo
        </h4>
        <section class="heads">
            <form method="post" id="form">
                <div class="form-group">
                    <input type="text" class="form-control" id="emailUser" name="emailUser" placeholder="Correo de Usuario" autofocus=""/>
                </div>

<?php $registro = new loginUsuarioCon;
$registro->recoverPassController();
?>
                <?php if (!isset($_SESSION['emailUser'])): ?>
                   <?php include 'btnError.php';?>
                <?php endif?>
            </form>
        </section>
    </div>
    <div class="card-footer text-muted">
        ¿Nuevo en Memorium?
        <a href="login" class="btn btn-outline-primary btn-sm">
            Regístrate ahora
        </a>
    </div>
</div>
