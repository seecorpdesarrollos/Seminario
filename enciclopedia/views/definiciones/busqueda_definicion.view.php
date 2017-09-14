
<body>
<?php if (!empty($sinresultado)): ?>
  <hr>



            <div class="col-sm-4 offset-3">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    <?php echo $sinresultado ?>
                </div>
            </div>
            <?php endif;?>
        </div>
<hr>
<?php if (empty($sinresultado)): ?>
  <center><h2>Resultado De Búsqueda:</h2></center>
   <?php foreach ($result as $stmt): ?>
<!-- empieza tabla -->
  <div class="row">
 <div class="container">




 <table  class="table table-bordered table-sm table-responsive">
  <thead class="thead-inverse">


  <tr>
                                                        <th colspan="2">
                                                            <h2>
                                                                <center>
                              <a class="text-white" href="../tema/?id=<?php echo $stmt->idTheme ?>">
                             <?php echo $stmt->title ?>
                                            </a>

                                                                </center>
                                                            </h2>
                                                        </th>
                                                    </tr>
      <tr>

         <th>Descripción:</th>
           <td><?php echo $stmt->description; ?>


           </td>
      </tr>


    <tr>
<th>Cuenta Creada Por:</th>
  <td>
  <?php echo $stmt->nameUser ?>
      <a href="../modificar/?id=<?php echo $stmt->idTheme ?>">

  </td>
</tr>
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip('show')
})
</script>

<tr>



</tr>
<th>Acción:</th>
  <td>


      <a data-toggle="tooltip" data-placement="bottom" title="Modificar" href="../modificar/?idtema=<?php echo $stmt->idTheme ?>" >

      <i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>

       <a data-toggle="tooltip" data-placement="bottom" title="Eliminar"  href="../eliminar/?idtema=<?php echo $stmt->idTheme ?>">

      <i class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></a>


  </td>
</tr>

<tr>

<th> Creado:</th>
<td>
<?php echo $stmt->datatheme ?>
</td>

</tr>



  </thead>







</table>



<?php endforeach;?>



<?php require '../php/modificar_definicion.php';?>

<?php endif;?>




</div>
</div>

<?php require '../views/menu/footer.php';?>

