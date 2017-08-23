<nav class="navbar navbar-light bg-white">
    <a class="navbar-brand text-Inicio" href="memorium">
        <span class="inicio">
            <img class="rounded" src="views/bootstrap/image/favicon.ico" width="25"/>
            Inicio
        </span>
    </a>
</nav>
<div class="principal">
    <div class="card text-center">
        <div class="card-header">
            <?php if (isset($_GET['action'])): ?>
            <?php if ($_GET['action'] == 'errorIngreso'): ?>
            <div class="alert alert-danger fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
                El correo electrónico y la contraseña que ingresaste no coinciden con nuestros registros. Por favor, revisa e inténtalo de nuevo..
            </div>
            <?php endif?>
            <?php endif?>
        </div>
        <div class="card-block">
            <h4 class="card-title">
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
                    <button type="submit" id="ingresar" name="ingresar" class="btn btn-primary btn-block">
                        Registrarse
                    </button>
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
</div>
</div>
<?php $registro = new loginUsuarioCon;
$registro->
    ingresoUsarioController();
?>
