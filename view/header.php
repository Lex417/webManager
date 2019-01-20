<!-- HEADER DESKTOP-->
 <header class="header-desktop">

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                   <!--  NOTIFICACIONES ICONO -->
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications" onclick="mostrarNotificaciones();"></i>
                                        <span class="quantity" id="numNotificaciones"></span>
                                        <div class="notifi-dropdown js-dropdown"   id="modalAllNotificaciones">
                                           <!--
                                           DESDE JAVASCRIPT SE AGREGAN LAS NOTIFICACIONES AQUÍ.
                                            -->
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image"> <!--IMAGEN DE USUARIO-->
                                            <img src="images/user.ico" alt="User" />
                                        </div>
                                        <div class="content"> <!--NOMBRE DEL USUARIO-->
                                            <a id ="id-usuario" class="js-acc-btn" href="#">116290648</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/user.ico" alt="User" /> <!--IMAGEN DEL USUARIO EN COLAPSE-->
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name"> <!--NOMBRE DEL USUARIO EN COLAPSE-->
                                                        <a href="#">User</a>
                                                    </h5>
                                                    <span class="email">user@example.com</span> <!--EMAIL DEL USUARIO EN COLAPSE-->
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="verProyectosActivos.php"><i class="zmdi zmdi-account"></i>Ver Perfil</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Cerrar Sesión</a>
                                          
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</header>
            
            <!-- END HEADER DESKTOP-->
