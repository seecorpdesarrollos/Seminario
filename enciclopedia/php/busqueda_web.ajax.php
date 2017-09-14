<?php

require '../views/menu/header.php';

require '../views/menu/footer.php';

?>


<hr>





<div class="container">
<div class="row">


<body onload="mueveReloj()">
<div class="row" >
<div class="container">
<nav class="navbar navbar-toggleable-md ">



  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
      <a data-toggle="tooltip" data-placement="bottom" title="Agregar definición" class="btn btn-outline-success" href="../agregar/" > <i class="fa fa-plus"></i></a>
    <a class="btn btn-outline-primary " href="../principal/">Home</a>
    <a class="btn btn-outline-primary " href="../buscar/">Buscar en la aplicación</a>
     <a class="btn btn-primary active" href="../busquedaweb/">Buscar en Wikipedia</a>
      </li>

    </ul>

    <form class="form-inline" name="form_reloj">
      <input data-toggle="tooltip" data-placement="bottom" title="Hora" class="form-control w-25 p-2 text-white bg-inverse text-center" type="text" name="reloj" readonly="readonly">
<button data-toggle="tooltip" data-placement="bottom" title="Fecha" type="button" class="btn btn-primary w-75 p-2   active">  <span id="diaSemana" class="diaSemana">&nbsp;</span>
                          <span id="dia" class="dia">&nbsp;</span>
                          <span> de </span>
                          <span id="mes" class="mes">&nbsp;</span>
                          <span> del </span>
                          <span id="year" class="year">&nbsp; </span></button>
    </form>
  </div>
</nav>



<div class="col-sm-6 ">

<br>
<div class="input-group">
  <button type="button" class="btn  btn-secondary active " >
  <strong>Buscar:</strong>


  </button>


<input id="searchTerm" class="form-control mr-sm-1" name="search"  type="text" placeholder="buscar ...">


 <!--  <input id="searchTerm"  name="search" placeholder="Buscar.."> -->
  <button id='search' type="button" class ="btn btn-outline-success"><span>
  <i class="fa fa-search" aria-hidden="true"></i>
</span>Buscar


  </button>
  </div>
<br>
<br>

  <div id="output"></div>


</div>


<script type="text/javascript">
  $(function() {
    // enter
    $("#searchTerm").keypress(function(e) {
        if (e.keyCode === 13) {
            var searchTerm = $("#searchTerm").val();
            var url = "https://es.wikipedia.org/w/api.php?action=opensearch&search=" + searchTerm + "&format=json&callback=?";
            $.ajax({
                url: url,
                type: 'GET',
                contentType: "application/json; charset=utf-8",
                async: false,
                dataType: "json",
                success: function(data, status, jqXHR) {
                    //console.log(data);
                    $("#output").html();
                    for (var i = 0; i < data[1].length; i++) {
                        $("#output").prepend("<div><div class='text-info'><a target='_blank' href=" + data[3][i] + "><h2 text-primary>" + data[1][i] + "</h2>" + "<p>" + data[2][i] + "</p></a></div></div>");
                    }
                }
            })
        }
    });
    // click ajax call
    $("#search").on("click", function() {
        var searchTerm = $("#searchTerm").val();
        var url = "https://es.wikipedia.org/w/api.php?action=opensearch&search=" + searchTerm + "&format=json&callback=?";
        $.ajax({
            url: url,
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            async: false,
            dataType: "json",
            // plop data
            success: function(data, status, jqXHR) {
                //console.log(data);
                $("#output").html();
                for (var i = 0; i < data[1].length; i++) {
                    $("#output").prepend("<div><div class='text-info'><a target='_blank'  href=" + data[3][i] + "><h2 text-primary>" + data[1][i] + "</h2>" + "<p>" + data[2][i] + "</p></a></div></div>");
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

<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php require '../php/agregar_definicion.php';?>