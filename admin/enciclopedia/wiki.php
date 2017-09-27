
<?php
if (!isset($_SESSION['emailUser'])) {
    header('location:login');
} else {

    $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

?>

   <?php include 'admin/header/head.php';?>
    <script src="admin/assets/js/timer.js"></script>
    <body>
        <div class="page home-page">
            <!-- Main Navbar-->
        <?php include 'admin/header/cabezera.php';?>
        <!-- fin cabezera -->
            <div class="page-content d-flex align-items-stretch">

                <!-- Side Navbar -->
                <?php include 'admin/header/navegacion.php';?>
                 <!-- Fin navegacion -->
                <div class="content-inner">
                    <!-- Page Header-->
                    <header class="page-header">
                        <div class="container-fluid">
                            <h2 class="no-margin-bottom">
                                Página  <small><i class="text-danger">Wiki</i></small>
                            </h2>
                            <h2 class="version float-lg-right">
                                Memorium  <small><i class="text-danger">versión 1.0</i></small>
                            </h2>
                        </div>
                    </header>
                    <!-- Dashboard Counts Section-->
                    <section class="dashboard-counts no-padding-bottom">
                        <div class="container-fluid" >
                            <div class="row bg-white has-shadow">
                                <div class="col-sm-12 ">
               <ol class="breadcrumb">
                <li class="breadcrumb-item active center">Realice su búsqueda</li>
               </ol>
<br>
<div class="input-group margin-bottom-sm">
  <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
  <input class="form-control " id="searchTerm"  name="search" type="text" placeholder="Buscar.......">
  <button id='search' type="button" class ="btn btn-outline-primary busqueda"><span>
  <i class="fa fa-search" aria-hidden="true"></i>
</span> Buscar
</button>
</div>

<br>
<br>

  <div id="outputs"></div>
  <div id="output"></div>
</div>


<script type="text/javascript">
  $(function() {
    // enter
    $("#searchTerm").keypress(function(e) {
        if (e.keyCode === 13) {
            var searchTerm = $("#searchTerm").val();
              searchTerms = searchTerm.toUpperCase();
            var url = "https://es.wikipedia.org/w/api.php?action=opensearch&search=" + searchTerm + "&format=json&callback=?";
             $("#outputs").html("<span class='titulo'>El resultado de la búsqueda:" + " " + searchTerms +"</span>");
            $.ajax({
                url: url,
                type: 'GET',
                contentType: "application/json; charset=utf-8",
                async: false,
                dataType: "json",
                success: function(data, status, jqXHR) {
                    console.log(data);
                    $("#output").html();
                    for (var i = 0; i < data[1].length; i++) {
                    $("#output").prepend("<div><div class=''><a target='_blank'  href=" + data[3][i] + "><span class='titulo'>" + data[1][i] + "</span>" + "<p class='parrafo'>" + data[2][i] + "</p></a></div></div>");
                }
                }
            })
        }
    });
    // click ajax call
    $(".busqueda").on("click", function() {
        var searchTerm = $("#searchTerm").val();
              searchTerms = searchTerm.toUpperCase();
        var url = "https://es.wikipedia.org/w/api.php?action=opensearch&search=" + searchTerm + "&format=json&callback=?";
        $("#outputs").html("<span class='titulo'>El resultado de la búsqueda:" + " " + searchTerms +"</span>");
        $.ajax({
            url: url,
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            async: false,
            dataType: "json",
            // plop data
            success: function(data, status, jqXHR) {
                console.log(data);
                $("#output").html();
                for (var i = 0; i < data[1].length; i++) {
                    $("#output").prepend("<div><div class=''><a target='_blank'  href=" + data[3][i] + "><span class='titulo'>" + data[1][i] + "</span>" + "<p class='parrafo'>" + data[2][i] + "</p></a></div></div>");
                }
            }
        }).done(function() {
            console.log("success");
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    });
});




</script>
                            </div>
                        </div>
                    </section>
                    <!-- Dashboard Header Section    -->


                    <!-- Page Footer-->
                    <footer class="main-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                       Copyright <i class="fa fa-copyright"></i> Memorium  <?php echo date('Y') ?> <small>Todo los derechos reservados.</small>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p>
                                        Desarrollado
                                        <a href="https://diegopennisi.es" target="_blank" class="external">
                                            Diego Pennisi.
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
<?php include 'admin/header/modal/modalSesion.php';?>
<?php include 'admin/header/modal/desconectado.php';?>