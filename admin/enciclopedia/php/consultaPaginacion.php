<?php

//Cuenta el número total de filas de la tabla*/
$conrows = $conexion->prepare("SELECT count(*) AS numrows FROM themes");

$numrows = $conrows->execute();
$numrows = $conrows->fetch(PDO::FETCH_COLUMN);

$row = $conexion->prepare("SELECT * FROM themes them
JOIN users us ON them.emailUser=us.emailUser");
$query = $row->execute();
$query = $row->fetchAll(PDO::FETCH_OBJ);

?>
<?php if ($numrows): ?>
        <table class="table table-bordered table-responsive table-sm" id="tablas">
           <thead class="bg-primary text-white">
                <tr>
                <td><center>Tema</center></td>
                <td><center>Descripción</center></td>
                <td><center>Propietario</center></td>
                <td><center>Puntos</center></td>
                <td><center>Calificar</center></td>
             </tr>
        </thead>

            <?php foreach ($query as $row): ?>
                <tr>
                  <?php if ($row->points == 0): ?>
                    <td class="text-danger"><?php echo $row->title ?></a></td>
                    <td class="text-danger"><?php echo $row->description ?></td>
                    <td class="text-center text-danger"><?php echo $row->nameUser ?></td>
                   <td class="text-center text-danger"><?php echo $row->points ?></td>
                   <td class="text-center text-danger"><a href="index.php?action=temaIndividual&id=<?php echo $row->idTheme ?>"><i class="fa fa-star-half-o btn btn-outline-danger" aria-hidden="true"></i></a></td>
                  <?php else: ?>
                    <td><?php echo $row->title ?></a></td>
                    <td><?php echo $row->description ?></td>
                   <td class="text-center"><?php echo $row->nameUser ?></td>
                   <td class="text-center"><?php echo $row->points ?></td>
                   <td class="text-center"><a href="index.php?action=temaIndividual&id=<?php echo $row->idTheme ?>"><i class="fa fa-star-half-o  btn btn-outline-primary" aria-hidden="true"></i></a></td>
                  <?php endif?>
               </tr>
           <?php endforeach;?>
        </table>
<?php else: ?>
        <div>
           <div class="alert alert-warning col-sm-12 offset-0 text-lg-center">
              <strong>Atención no hay temas para mostrar: </strong>Por favor cree uno
            </div>
        </div>

<?php endif?>
