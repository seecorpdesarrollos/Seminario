
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
        and $_GET['action'] != 'passChange'
        and $_GET['action'] != 'errorPassChange'
        and $_GET['action'] != 'exitopassChange'
        and $_GET['action'] != 'perfil'
        and $_GET['action'] != 'nombreVacio'
        and $_GET['action'] != 'share'
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


