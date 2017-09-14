<?php require '../views/menu/footer.php';?>






<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="agregar" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="text-success fa fa-plus">
                    </i>
                    Agregar Nueva definición
                </h5>

                <a class="btn " href="../principal/" > <i class="text-danger  fa fa-times-circle fa-2x " aria-hidden="true"></i></a>

            </div>

            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formulario">
                    <div class="form-group" id="form">
                        <label class="form-control-label" for="titulo">
                            Titulo:
                        </label>
                        <input class="form-control" placeholder="titulo" id="titulo" required="" name="titulo" type="text">

                        </input>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="descripcion">
                            Descripción:
                        </label>

                       <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="5" placeholder="descripcion" required=""></textarea>

                        </input>
                    </div>
                    <div class="form-group">

                     <input readonly="" type="text"  name="fecha" class="form-control" value="<?php echo date("Y-m-d H:i:s"); ?>" >

                    </div>







                        <div class="modal-footer">
                        <a class="btn btn-outline-danger" href="../principal/">Cerrar</a>

                            <button class="btn btn-outline-success" id="button" name="agregar" type="submit">
                                Agregar definición
                            </button>
                        </div>
                    </input>
                </form>
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
        descripcion:{required: 'La descripcion es requerida'}
    }


        });


    });
});


</script>


