<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="eliminar"   role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="text-danger  fa fa-trash fa-lg">
                    </i>
                   ¿Desea eliminar La definición?
                </h5>

            </div>



            <div class="modal-body">
            <?php foreach ($res as $key): ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="hidden" value="<?php echo $key->idTheme; ?>"  type="text" name="id_tema" class="form-control test-input" placeholder="id">

                <div class="form-group" id="form">

                        <label class="form-control-label" for="recipient-name">

                            <h2><?php echo $key->title ?></h2>
                        </label>

                </div>

              <?php endforeach;?>



                        <div class="modal-footer">
                            <a href="../principal/" class="btn btn-outline-danger" >
                                No
                           </a>
                            <button class="btn btn-outline-success" id="button" name="eliminar" type="submit">
                                Sí
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../views/menu/footer.php';?>