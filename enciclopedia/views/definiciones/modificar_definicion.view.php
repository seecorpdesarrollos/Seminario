<?php require '../views/menu/footer.php';?>
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="text-warning fa fa-pencil-square-o fa-lg">
                    </i>
                    Modificación definición
                </h5>

            </div>




            <div class="modal-body">
            <?php foreach ($res as $key): ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formulario">
                <input type="hidden" value="<?php echo $key->idTheme; ?>"  type="text" name="id_tema" class="form-control test-input" placeholder="id">
                    <div class="form-group" id="form">

                        <label class="form-control-label" for="titulo">
                            Titulo:
                        </label>
                <input class="form-control"  name="titulo" placeholder="titulo" required="" type="text" value="<?php echo $key->title ?>">


                        </input>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="descripcion">
                            Descripción:
                        </label>





     <textarea class="form-control" name="descripcion" id="descripcion" required="" rows="5" placeholder="descripcion"> <?php echo $key->description ?> </textarea>

<?php endforeach?>
                    </div>


                        <div class="modal-footer">
        <a href="../principal/" class="btn btn-outline-danger" >
                                Cerrar
                           </a>
                            <button class="btn btn-outline-warning" id="button" name="modificar" type="submit">
                                Modificar definición
                            </button>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

            $(function(){
    $("#button").on("click", function(){


$( "#formulario" ).validate({
  rules: {
    titulo: {
      required: true
    },
    descripcion: {
      required: true}


  },
   messages:
    {
        titulo: {required: 'El titulo es requerido'},
        descripcion:{required: 'La descripción es requerida'}
    }


        });


    });
});


</script>

