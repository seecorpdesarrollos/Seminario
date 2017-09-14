<?php if (!isset($_SESSION['emailUser'])) {header('location:login');} else { $name = ucwords($_SESSION['nameUser']);
    $email = $_SESSION['emailUser'];
    $dateUser = $_SESSION['dateUser'];

}

?>
<?php include 'admin/header/head.php';?>
<script>
  $("#chats").animate({
                  scrollTop: 5000
              }, 2000);
     var seconds = 1; // intervalo de actualizar div
     var divid = "chats"; // el div que quieres actualizar!
     var url = "admin/chat/app.php"; // el archivo de proceso php

     function objetoajax(){

         // The XMLHttpRequest object

         var xmlHttp;
         try{
             xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
         }
         catch (e){
             try{
                 xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
             }
             catch (e){
                 try{
                     xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                 }
                 catch (e){
                     alert("Tu explorador no soporta AJAX.");
                     return false;
                 }
             }
         }

         // Timestamp for preventing IE caching the GET request
         var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
         var procesourl = url+"?t="+timestamp;

         // The code...

         xmlHttp.onreadystatechange=function(){
             if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
                 document.getElementById(divid).innerHTML=xmlHttp.responseText;
                 setTimeout('objetoajax()',seconds*1000);
             }
         }
         xmlHttp.open("GET",procesourl,true);
         xmlHttp.send(null);
     }

     window.onload = function(){
         objetoajax(); // Ejecutamos objetoajax

      }

$(document).ready(function() {
  $("#chats").animate({
    scrollTop: 3900
}, 2000);

    $('#mensage').keyup(function(){
         $("#chats").animate({
                  scrollTop: 5000
              }, 2000);
        var m = $('#mensage').val();
        var div = document.getElementById("textDiv");
        if (m.length !=0) {
        div.textContent = "<?php echo $name ?> Esta escribiendo un mensaje..";
        }else{
            div.textContent = "";
        }
        var text = div.textContent;
        // console.log('Esta escribiendo...');

    })
        $('#submit').click(function(){
            var div = document.getElementById("textDiv");
            var mensage = $('#mensage').val();
           $('#chats').load('admin/chat/app.php', {mensage:mensage});
            $('#mensage').val('');
              div.textContent = "";
            $('#mensage').focus();
             return false;
        });



});

      setInterval(function(){
        $("#chatss").load("admin/chat/conectado.php");
    },1000);

</script>
<body>

    <div class="page home-page">
        <!-- Main Navbar-->
        <?php include 'admin/header/cabezera.php';?>
        <!-- fin cabezera -->
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <?php include 'admin/header/navegacion.php';?>
            <!-- Fin navegacion -->
            <div class="content-inner">
                <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">
                            Página
                            <small>
                                <i class="text-danger">
                                    Chat
                                </i>
                            </small>
                        </h2>
                        <h2 class="version float-lg-right">
                            Memorium
                            <small>
                                <i class="text-danger">
                                    versión 1.0
                                </i>
                            </small>
                        </h2>
                    </div>
                </header>

                <!-- Dashboard Counts Section-->
<?php $act = ChatController::getChatControllerActivo();?>
                <section class="dashboard-counts no-padding-bottom" id="sonido">
                    <div class="container-fluid">
                        <div class="row bg-white has-shadow">
                        <div class="col-sm-12">

                            <?php foreach ($act as $key): ?>
                        <?php if ($key['estado'] == 0): ?>
                            <div class="alert alert-danger" role="alert">
                              <strong>Acceso denegado!</strong> <h1>Para entrar en el chat debe estar conecto.</h1>
                            </div>

                           <?php else: ?>
                        </div>
                            <div class="col-sm-4" id="conectado">
                               <div id="chatss">

                               </div>
                            </div>
                            <div class="col-sm-8">
                              <div class="main">
                                 <div class="card-header bg-primary text-white">
                                    <i class="fa fa-commenting-o">
                                    </i>
                                    Comentarios
                                    <div class="btn-group pull-right">
                                        <i class="fa fa-edit">
                                        </i>
                                    </div>
                                </div>
                                 <div id="chats"></div>

                                <div id="textDiv" class="alet alert-info text-md-center"></div>

                                <form >
                                <div class="panel-footer clearfix card-footer text-muted text-lg-center">
                                    <textarea class="form-control" rows="1" id="mensage" name="mensage" ></textarea>
                                    <span class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12" style="margin-top: 10px">
                                            <input type="submit" name="enviarMensage" class="btn btn-outline-danger btn-block" id="submit"  value="Enviar Mensaje">

                                    </span>
                                </div>
                                </form>

                        <?php endif?>
                            <?php endforeach?>
                              </div>
                            </div>
                        </div>
                    </section>
                    <!-- Dashboard Header Section
                    <!-- Page Footer-->
                    <footer class="main-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        Copyright
                                        <i class="fa fa-copyright">
                                        </i>
                                        Memorium
                                        <?php echo date('Y') ?>
                                        <small>
                                            Todo los derechos reservados.
                                        </small>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p>
                                        Desarrollado
                                        <a href="https://diegopennisi.es" target="_blank" class="external">
                                            Diego Pennisi.
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <?php include 'admin/header/modal/modalSesion.php';?>
        <?php include 'admin/header/modal/desconectado.php';?>
        <!-- Page Footer-->

    </div>
</div>
</div>
