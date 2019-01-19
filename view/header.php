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
                                        <span class="quantity">5</span>
                                        <div class="notifi-dropdown js-dropdown"   id="modalAllNotificaciones">
                                           <!--
                                           DESDE JAVASCRIPT SE AGREGAN LAS NOTIFICACIONES AQUÍ.
                                            -->
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/user.ico" alt="User" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">User</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/user.ico" alt="User" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">User</a>
                                                    </h5>
                                                    <span class="email">user@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="verProyectosActivos.php">
                                                        <i class="zmdi zmdi-account"></i>Ver Perfil</a>
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

                                <!-- modal medium -->
                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                                    zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                                    resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                                    genus Equus, along with other living equids.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal medium -->
            </header>
            <!-- END HEADER DESKTOP-->