<?php

require '../views/menu/header.php';

?>

<hr>
<body onload="mueveReloj()">
<div class="row" >
<div class="container">
<nav class="navbar navbar-toggleable-md ">




  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
      <a  data-toggle="tooltip" data-placement="bottom" title="Agregar definición" class="btn btn-outline-success" href="../agregar/" > <i class="fa fa-plus"></i></a>
    <a class="btn  btn-outline-primary" href="../principal/">Home</a>
    <a class="btn  btn-primary active" href="../buscar/">Buscar en la aplicación</a>
     <a class="btn btn-outline-primary" href="../busquedaweb/">Buscar en Wikipedia</a>
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



</ul>
<br>
<div class="col-sm-8">

<nav class="navbar navbar-light  justify-content-between">

  <form class="form-inline">


  <button type="button" class="btn  btn-secondary active " >

  <strong>Tema, Definición o usuario:</strong>


  </button>
    <input class="form-control mr-sm-2" onkeyup="buscar(this.value)" type="text" placeholder="buscar">

  </form>
</nav>
</div>
</div>
</div>


            <p>
                <span id="txtSearchResult">
                </span>
                <script>
                    function buscar(str)
{
     if (str.length == 0)
     {
          document.getElementById("txtSearchResult").innerHTML = "";
          return;
     }
     else
     {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function()
          {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                         document.getElementById("txtSearchResult").innerHTML = xmlhttp.responseText;                      }
       }
       xmlhttp.open("GET", "../buscartema/?txtName=" + str, true);
       xmlhttp.send();
     }
}
                </script>
            </p>
    <?php require '../php/agregar_definicion.php';?>
 <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>


