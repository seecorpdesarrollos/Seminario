
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] != 'principal'
        and $_GET['action'] != 'almaceSubir'
        and $_GET['action'] != 'almaceList'
        and $_GET['action'] != 'chat'
        and $_GET['action'] != 'recorList'
        and $_GET['action'] != 'recorSubir'
        and $_GET['action'] != 'temas'
        and $_GET['action'] != 'buscar'
        and $_GET['action'] != 'wiki'
    ) {

        require "views/modules/header/menu.php";
    }
}

?>

				<?php
$mvc = new MvcController();
$mvc->enlacesPaginasController();
?>


		<?php include 'views/modules/header/footer.php';?>


