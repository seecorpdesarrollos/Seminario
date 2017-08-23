<nav class="navbar navbar-inverse bg-primary ">
  <a href="memorium" class="navbar-brand mb-0 text-white text-lg-center">Memorium <img src="views/bootstrap/image/favicon.ico" alt="foto" width="40"></a>
    <ul class="navbar-nav">
       <li class="nav-item dropdown navbar-toggler-right login">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="text-white">Tenés cuenta? Inicia Sesión</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<div class="form">
				<form method="post">
				  <div class="form-group ingreso">
				   <p class="text-gray-dark">Tenés Cuenta?</p>
				   <hr class="hrLogin">
				   <div class="input-group margin-bottom-sm">
					  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					  <input class="form-control" type="text" placeholder="Correo Usuario" autofocus="" name="emailUser">
					</div>
					<div class="input-group">
					  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					  <input class="form-control" name="passwordUser" type="password" placeholder="Contraseña">
					</div>
				 <center> <input type="submit" name="ingresar" class="btn btn-primary  ingresoBtn " value="Ingresar"></center>
				</form>

			</div>
        </div>
      </li>
     </ul>

  <!-- <a class="text-lg-right login" href="loginUser">tenés cuenta? Ingresa</a> -->
</nav>
<?php if (isset($_GET['action'])): ?>
	<?php if ($_GET['action'] == 'okRegistro'): ?>
		<center><div class="alert alert-success" role="alert">
		  <strong>Felicidades!</strong> Uds se ha sido registrado con exito.
		    <strong>Ya puede iniciar sesión!</strong>
		</div></center>
	<?php endif?>
	<?php if ($_GET['action'] == 'errorPass'): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <center><strong>Lo sentimos!</strong> Las contraseñas ingresadas no coinciden.
		  </center>
		</div>
	<?php endif?>
<?php endif?>
<section class="main">
	<h4>Únete hoy mismo a Mermorium.</h4>
</section>

<section class="head">
	<form method="post" id="formulario">
	  <div class="form-group">
	    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" autofocus="">
	  </div>
	  <div class="form-group">
	    <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico" value="" >
	  </div>
	   <div class="form-group">
	    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
	  </div>
	  <div class="form-group">
	    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repita su Contraseña">
	  </div>
	  <button type="submit" id="registro" name="registro" class="btn btn-primary btn-block">Registrarse</button>
	</form>

	<small>Al registrarte, aceptas las Condiciones de Servicio y la Política de Privacidad, incluyendo el Uso de Cookies.</small>

</section>

<?php
$registro = new loginUsuarioCon;
$registro->registroUsuarioController();
$registro->ingresoUsarioController();
?>
