<?php require_once '../../controllers/chat/chatController.php';?>
<?php require_once '../../models/chat/chatModel.php';?>
<?php require_once '../../models/conexion.php';?>
        <script src="admin/assets/resources/jquery-ui/jquery-ui-complete.min.js"></script>
        <script src="admin/assets/resources/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="admin/assets/resources/jspanel/jquery.jspanel.js"></script>
   <?php $activos = ChatController::getChatController();?>


                                <p>
                                    <a class="btn btn-primary btn-block" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-list">
                                        </i>
                                        Usuarios Activos
                                    </a>
                                    <small>
                                        <i class="alert alert-info">Haga click sobre los usuarios conectado para ver sus  últimos 40 mensajes.</i>
                                    </small>
                                </p>
                                <div>
                                    <div class="card card-block">
                                        <?php if ($_SESSION['emailUser']): ?>
                                        <?php foreach ($activos as $key): ?>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-warning justify-content-between text-gray-dark">
                                                <a href="#" id="<?php echo $key['id']; ?>"><?php echo ucwords($key['nameUser']); ?></a>
                                                <span class="badge badge-pill">
                                                    <i class="fa fa-sun-o">
                                                    </i>
                                                </span>
                                            </li>
                                        </ul>

                                <script>
                                 "use strict";
                $('#<?php echo $key['id']; ?>').click(function(){
                    //obtemos la variable
             var var_js = $("<?php echo $key['id']; ?>");
             var_js = var_js.selector;
             var dataString = var_js;

                    $.jsPanel({

                        overflow: { horizontal: 'hidden', vertical: 'scroll' },
                        position: {left: 314, top: 254},
                        title: '<div class="text-white"><?php echo ucwords($key['nameUser']); ?> <img src="archivosSubidos/<?php echo $key["emailUser"] ?>/favicon.ico" width="35" class="img-fluid rounded-circle text-lg-center"></div>',
                        size:  {width: 300, height: 320},
                        callback: [
                            function () {
                                    this.content.load('admin/chat/appPrivate.php?id='+dataString);
                            },
                            function () {
                                this.content.css('background','#FFF');
                            }
                        ]
                    });
//                     $(".jsPanel-content").animate({
//     scrollTop: $('.jsPanel-content')[0].scrollHeight
// });
                });
            </script>
                                        <?php endforeach?>
                                        <?php endif?>
                                    </div>
                                </div>