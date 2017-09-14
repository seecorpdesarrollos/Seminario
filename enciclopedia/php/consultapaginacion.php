<?php

require '../config/conexion.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    include 'pagination.php'; //incluir el archivo de paginación
    //las variables de paginación
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 3; //la cantidad de registros que desea mostrar
    $adjacents = 3; //brecha entre páginas después de varios adyacentes
    $offset    = ($page - 1) * $per_page;
    //Cuenta el número total de filas de la tabla*/
    $conrows = $conexion->prepare("SELECT count(*) AS numrows FROM themes");

    $numrows = $conrows->execute();
    $numrows = $conrows->fetch(PDO::FETCH_COLUMN);

    $total_pages = ceil($numrows / $per_page);
    $reload      = 'index.php';

    $row = $conexion->prepare("SELECT them.idTheme as  'tema_id',them.title,them.description,
us.nameUser,them.points

FROM themes them JOIN users us

ON them.emailUser=us.emailUser


 GROUP BY them.idTheme Order BY them.points DESC LIMIT   $offset,$per_page");
    $query = $row->execute();
    $query = $row->fetchall(PDO::FETCH_OBJ);

    if ($numrows >= 1) {
        ?>

        <table class="table table-bordered table-responsive">

              <thead class="bg-faded">


   <tr>
                   <th colspan="6" class="text-center"><h3>Lista de temas Creados</h3></th>
              </tr>
                <tr>
                 <th><center>Tema</center></th>
<th><center>Descripción</center></th>
<th><center>Propietario</center></th>
<th><center>Puntos</center></th>

<th colspan="2" ><center>Acción</center></th>
</thead>


                </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
    <tbody>

                <tr>
                    <td><a class="text-muted" href="../tema/?id=<?php echo $row->tema_id ?>"><?php echo $row->title ?></a></td>
                    <td><?php echo $row->description ?></td>
                    <td class="text-center"><?php echo $row->nameUser ?></td>



<td class="text-center"><?php echo $row->points ?></td>




                    <td><a data-toggle="tooltip" data-placement="bottom" title="Modificar" href="../modificar/?idtema=<?php echo $row->tema_id ?>">

<i class="editar fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>

<td><a data-toggle="tooltip" data-placement="bottom" title="Eliminar" href="../eliminar/?idtema=<?php echo $row->tema_id ?>">

<i class="eliminar fa fa-trash fa-2x" aria-hidden="true"></i></a></td></td></td>


                </tr>
    </tbody>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="col-sm-5 offset-4">
            <?php echo paginate($reload, $page, $total_pages, $adjacents); ?>
        </div>
  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>






            <?php

    } else {
        ?>
                <div>

     <div class="alert alert-warning col-sm-5 offset-3">

              <strong>Atención no hay temas para mostrar: </strong>Por favor cree uno
            </div>
        </div
            <?php
}
}
?>

