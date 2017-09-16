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
<?php if ($numrows <= 1): ?>


        <table class="table table-bordered">
           <thead class="bg-inverse text-white">
                <tr>
                 <th><center>Tema</center></th>
                <th><center>Descripción</center></th>
                <th><center>Propietario</center></th>
                <th><center>Puntos</center></th>
                <th colspan="2" ><center>Acción</center></th>
             </tr>
        </thead>
         <tbody>
                <tr>
            <?php foreach ($query as $row): ?>
                    <td><a class="text-muted" id="a" href="index.php?action=temaIndividual&id=<?php echo $row->idTheme ?>"><?php echo $row->title ?></a></td>
                    <td><?php echo $row->description ?></td>
                    <td class="text-center"><?php echo $row->nameUser ?></td>
                   <td class="text-center"><?php echo $row->point ?></td>
                   <td><a href=""><i class="fa fa-edit btn btn-outline-primary"></i></a> <a href=""><i class="fa fa-trash btn btn-outline-danger"></i></a></td>

           <?php endforeach;?>
         </tr>
    </tbody>
        </table>
<?php else: ?>
        <div>
           <div class="alert alert-warning col-sm-5 offset-3">
              <strong>Atención no hay temas para mostrar: </strong>Por favor cree uno
            </div>
        </div>

<?php endif?>
