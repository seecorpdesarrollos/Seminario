
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] != 'principal') {

        require "views/modules/header/menu.php";
    }
}

?>
<!-- <div class="row">
	<div class="col-md-12">
			<section> -->
				<?php
$mvc = new MvcController();
$mvc->enlacesPaginasController();
?>
	<!-- 		</section>
	</div>
</div> -->

		<?php include 'views/modules/header/footer.php';?>


