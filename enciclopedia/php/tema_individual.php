<?php

require '../views/menu/header.php';

require '../config/conexion.php';

$emailUser = "davidhnmunoz@gmail.com";

?>
<hr>
<body onload="mueveReloj()">





<div class="row">

<div class="container">



<!-- Nueva nav -->
<nav class="navbar navbar-toggleable-md ">



  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
      <a class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Agregar definición" href="../agregar/" > <i class="fa fa-plus"></i></a>
    <a class="btn btn-outline-primary" href="../principal/">Home</a>
    <a class="btn btn-outline-primary" href="../buscar/">Buscar en la aplicación</a>
     <a class="btn btn-outline-primary" href="../busquedaweb/">Buscar en Wikipedia</a>
     <a class="btn btn-primary active text-white">Tema</a>
      </li>

    </ul>


    <form class="form-inline" name="form_reloj">
      <input class="form-control w-25 p-2 text-white bg-inverse text-center" type="text" name="reloj" readonly="readonly" data-toggle="tooltip" data-placement="bottom" title="Hora">
<button type="button" class="btn btn-primary w-75 p-2   active" data-toggle="tooltip" data-placement="bottom" title="Fecha" >  <span id="diaSemana" class="diaSemana">&nbsp;</span>
                          <span id="dia" class="dia">&nbsp;</span>
                          <span> de </span>
                          <span id="mes" class="mes">&nbsp;</span>
                          <span> del </span>
                          <span id="year" class="year">&nbsp; </span></button>
    </form>
  </div>
</nav>


<?php
$id = (int) $_GET['id'];

$rtheme = $conexion->prepare("SELECT * FROM themes them JOIN users us ON them.emailUser=us.emailUser WHERE idTheme = ?");

$rtheme->execute(array($id));

while ($theme = $rtheme->fetchObject()) {

    $calculo = ($theme->points == 0) ? 0 : round(($theme->points / $theme->votes), 1);

    ?>





<!-- empieza tabla -->




 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">


  <tr>
                                                        <th colspan="2">
                                                            <h2>
                                                                <center>
<?php echo $theme->title; ?>
                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>

         <th class="align-top">Descripción:</th>
           <td><?php echo $theme->description; ?>


           </td>
      </tr>


    <tr>



<th class="align-top"> Valoracion:</th>

<td>



<span class="ratingAverage" data-average="<?php echo $calculo; ?>"></span>
<span class="article" data-id="<?php echo $id; ?>"></span>

<div data-toggle="tooltip" data-placement="bottom" title="Puntuar" class="barra">
  <span class="bg"></span>
  <span class="stars">
<?php for ($i = 1; $i <= 5; $i++): ?>


<span class="star" data-vote="<?php echo $i; ?>">


  <span class="starAbsolute"></span>

</span>
<?php
endfor;
    echo '</span></div><p class="votos"><span>' . $theme->votes . '</span>  voto/s /Ranking: ' . $calculo . '  </p>';
    echo '</span></div><strong><p class="yavoto text-danger"><span>' . '</span>     </p></strong>';
    echo '</span></div><strong><p class="gracias text-success"><span>' . '</span>     </p></strong>';

    ?>

<tr>

<span class="sucess"></span>
<span class="fail"></span>


</td>

</tr>
<th class="align-top">Acción:</th>
  <td>


      <a data-toggle="tooltip" data-placement="bottom" title="Modificar" href="../modificar/?idtema=<?php echo $theme->idTheme ?>" >

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>

       <a data-toggle="tooltip" data-placement="bottom" title="Eliminar"  href="../eliminar/?idtema=<?php echo $theme->idTheme ?>">

      <i class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></a>


  </td>
</tr>
<th class="align-top">Propietario:</th>
  <td >
  <?php echo $theme->nameUser ?>


  </td>


</tr>
<tr>

<th> Creado:</th>
<td>
  <?php echo $theme->datatheme;

} ?>
</td>


</tr>



  </thead>







</table>










<?php require '../views/menu/footer.php';?>
</div>
</div>
</body>
</html>

  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>


