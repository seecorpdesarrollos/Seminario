 <nav class="side-navbar">
                    <!-- Sidebar Header-->
                    <div class="sidebar-header d-flex align-items-center">
                        <div class="avatar">
                            <img src="views/bootstrap/image/favicon.ico" alt="..." class="img-fluid rounded-circle"/>
                        </div>
                        <div class="title">
                            <h1 class="h4">
                                <?php echo $name; ?>
                            </h1>
                            <p>
                              <small class="text-success">Miembro desde <?php echo date("m-Y", strtotime($dateUser)); ?></small>
                            </p>
                            <small><i class="fa fa-sun-o"></i> Conectado</small>
                        </div>
                    </div>
                    <!-- Sidebar Navidation Menus-->
                    <span class="heading  text-info">
                        Menú Principal
                    </span>
                    <ul class="list-unstyled">
                        <li>
                            <a href="principal">
                                <i class="icon-home  text-danger">
                                </i>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="#dashvariants" aria-expanded="false" data-toggle="collapse">
                                <i class="fa fa-hdd-o text-danger" aria-hidden="true"></i>
                                Almacenaje
                            </a>
                            <ul id="dashvariants" class="collapse list-unstyled">
                                <li>
                                    <a href="almaceSubir">
                                       <i class="fa fa-cloud text-danger"></i> Subir
                                    </a>
                                </li>
                                <li>
                                    <a href="almaceList">
                                       <i class="fa fa-list-alt text-danger"></i> Listado
                                    </a>
                                </li>

                            </ul>
                        </li>
                         <li>
                            <a href="#wiki" aria-expanded="false" data-toggle="collapse">
                                <i class="fa fa-book text-danger" aria-hidden="true"></i>
                                Enciclopedia
                            </a>
                            <ul id="wiki" class="collapse list-unstyled">
                                <li>
                                    <a href="temas">
                                       <i class="fa fa-list-alt text-danger"></i> Temas
                                    </a>
                                </li>
                                <li>
                                    <a href="buscar">
                                       <i class="fa fa-search text-danger"></i> Buscar
                                    </a>
                                </li>
                                 <li>
                                    <a href="wiki">
                                       <i class="fa fa-wikipedia-w text-danger"></i> Wikipedia
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="chat">
                                <i class="fa fa-comments-o text-danger">
                                </i>
                                Chat
                            </a>
                        </li>
                        <li>
                            <a href="#recordatorio" aria-expanded="false" data-toggle="collapse">
                                <i class="fa fa-lightbulb-o text-danger" aria-hidden="true"></i>
                               Recordatorio
                            </a>
                            <ul id="recordatorio" class="collapse list-unstyled">
                                <li>
                                    <a href="recorSubir">
                                       <i class="fa fa-cloud text-danger"></i> Subir
                                    </a>
                                </li>
                                <li>
                                    <a href="recorList">
                                       <i class="fa fa-list-alt text-danger"></i> Listado
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <span class="heading text-info">
                       Menú Extras
                    </span>
                    <ul class="list-unstyled">
                         <li>
                            <a href="#config" aria-expanded="false" data-toggle="collapse">
                                <i class="fa fa-cogs text-danger" aria-hidden="true"></i>
                            Configurar
                            </a>
                            <ul id="config" class="collapse list-unstyled">
                                <li>
                                    <a href="#">
                                       <i class="fa fa-key text-danger"></i>Contraseña
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                       <i class="fa fa-user text-danger"></i> Perfil
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </nav>