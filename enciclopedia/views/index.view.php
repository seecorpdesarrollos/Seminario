|
<?php require 'menu/header.php';?>
<hr/>
<div class="row">
    <div class="container">
        <body onload="mueveReloj()">
            <!-- Nueva nav -->
            <nav class="navbar navbar-toggleable-md ">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Agregar definición" href="../agregar/">
                                <i class="fa fa-plus">
                                </i>
                            </a>
                            <a class="btn btn-primary active" href="../principal/">
                                Home
                            </a>
                            <a class="btn btn-outline-primary" href="../buscar/">
                                Buscar en la aplicación
                            </a>
                            <a class="btn btn-outline-primary" href="../busquedaweb/">
                                Buscar en Wikipedia
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline" name="form_reloj">
                        <input class="form-control w-25 p-2 text-white bg-inverse text-center" type="text" name="reloj" readonly="readonly" data-toggle="tooltip" data-placement="bottom" title="Hora"/>
                        <button type="button" class="btn btn-primary w-75 p-2   active" data-toggle="tooltip" data-placement="bottom" title="Fecha">
                            <span id="diaSemana" class="diaSemana">
                                &nbsp;
                            </span>
                            <span id="dia" class="dia">
                                &nbsp;
                            </span>
                            <span>
                                de
                            </span>
                            <span id="mes" class="mes">
                                &nbsp;
                            </span>
                            <span>
                                del
                            </span>
                            <span id="year" class="year">
                                &nbsp;
                            </span>
                        </button>
                    </form>
                </div>
            </nav>
            <!-- fin nueva nav -->
            <br/>
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title">
                        Bienvenidos a Wiki
                    </h4>
                    <p class="card-text">
                        En este sitio puede compartir y buscar contenido.
                    </p>
                </div>
                <div class="card-block">
                    <?php foreach ($rcantidad as $cantidad): ?>
                    <p class="card-text">
                        <strong>
                            Cantidad de temas creados:
                        </strong>
                        <?php echo $cantidad->
                        cantidad
                        ?>
                    </p>
                    <?php endforeach;?>
                    <div class="col-md-6 offset-3">
                        <?php if (isset($_GET['exitoagregar'])) { echo ' <br/>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                            </button>
                            <strong>
                                Exitos!
                            </strong>
                            El tema fue creado
                            <i class="text-primary fa fa-thumbs-o-up" aria-hidden="true">
                            </i>
                        </div>
                        ';
                        echo '
                        <meta http-equiv="refresh" content="4;url=../principal/"/>
                        ';
                        }?>
                    </div>
                    <div class="col-md-6 offset-3">
                        <?php if (isset($_GET['exitomodificar'])) { echo ' <br/>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                            </button>
                            <strong>
                                Exitos!
                            </strong>
                            El tema fue modificado
                            <i class="text-primary fa fa-thumbs-o-up" aria-hidden="true">
                            </i>
                        </div>
                        ';
                        echo '
                        <meta http-equiv="refresh" content="4;url=../principal/"/>
                        ';
                        }?>
                    </div>
                    <div class="col-md-6 offset-3">
                        <?php if (isset($_GET['exitoeliminar'])) { echo '  <br/>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    &times;
                                </span>
                            </button>
                            <strong>
                                Exitos!
                            </strong>
                            El tema fue eliminado
                            <i class="text-primary fa fa-thumbs-o-up" aria-hidden="true">
                            </i>
                        </div>
                        ';
                        echo '
                        <meta http-equiv="refresh" content="4;url=../principal/"/>
                        ';
                        }?>
                    </div>
                </div>
            </div>
            <br/>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="loader" class="text-center">
                            <img src="../assets/img/loader.gif"/>
                        </div>
                        <div class="outer_div">
                        </div>
                    </div>
                </div>
            </div>
            <?php require '../php/agregar_definicion.php';?>
            <script>
                $(document).ready(function(){
                  load(1);
                });
            
                function load(page){
                  var parametros = {"action":"ajax","page":page};
                  $("#loader").fadeIn('slow');
                  $.ajax({
                    url:'../paginacion/',
                    data: parametros,
                     beforeSend: function(objeto){
                    $("#loader").html("<img src='../assets/img/loader.gif'>");
                    },
                    success:function(data){
                      $(".outer_div").html(data).fadeIn('slow');
                      $("#loader").html("");
                    }
                  })
                }
                </script>
            <script>
              $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
            </script>
        </div>
    </div>
</body>
