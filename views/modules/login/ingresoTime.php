<nav class="navbar navbar-inverse bg-inverse text-white">
    <a class="navbar-brand text-Inicio" href="memorium">
        <span class="inicio text-white">
            <img class="rounded" src="views/bootstrap/image/favicon.ico" width="25"/>
            Inicio
        </span>
    </a>
</nav>
<br/>
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <?php if (isset($_GET['action'])): ?>
            <?php if ($_GET['action'] == 'ingresoTime'): ?>
            <div class="alert alert-warning fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
                Usted ha estado inactivo por mas de una hora, por seguridad vuelva a ingresar.
            </div>
            <?php endif?>
            <?php endif?>
        </div>
        <div class="card-block">
            <h4 class="card-title text-primary text-lg-center">
                Inicia sesión en Mermorium.
            </h4>
            <section class="heads">
                <form method="post" id="form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="emailUser" name="emailUser" placeholder="Correo de Usuario" autofocus=""/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="passwordUser" name="passwordUser" placeholder="Contraseña " value=""/>
                    </div>
    <?php $registro = new loginUsuarioCon;
$registro->ingresoUsarioErrorController();
?>
                    <?php if (!isset($_SESSION['emailUser'])): ?>
                       <?php include 'btnError.php';?>
                    <?php endif?>
                </form>
            </section>
        </div>

    </div>
</div>