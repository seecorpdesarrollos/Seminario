
	
<?php require "views/modules/header/menu.php" ?>


<div class="row">
	<div class="col-md-12">
		<div class="container">
			<section>
			 <hr>
				<?php
					$mvc = new MvcController();
					$mvc->enlacesPaginasController();
				?>	
			</section>
		</div>
	</div>
</div>
	<footer>
		<?php include 'views/modules/header/footer.php' ?>
	</footer>

