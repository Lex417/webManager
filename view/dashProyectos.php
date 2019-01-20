<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>

<body class="animsition" onload="obtenerVistaPreviaProyecto()">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include "menu.php"?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include "header.php"?>

            <!-- ESTE MODAL ES PARA MOSTRAR LOS DETALLES DE UNA NOTIFICACION EN ESPECIFICO Y ACEPTARLA O RECHAZARLA.-->
                <!-- modal medium -->
				<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Detalles Notificación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                                <p>
                                    Colaborador:&nbsp;&nbsp;&nbsp;J<strong>ose Ocampo</strong>
                                </p>
                                <p>
                                    Puesto:&nbsp;&nbsp;&nbsp;<strong>Desarrollador F</strong>
                                </p>
                                <p>
                                    Proyecto al cual desea Unirse:&nbsp;&nbsp;&nbsp;<strong>Crear Sistema de Archivos</strong>
                                </p>
                                <p>
                                    Manager:&nbsp;&nbsp;&nbsp;<strong>Pedro Bolaños</strong>
                                </p>
                                <p>
                                    Equipo de trabajo:&nbsp;&nbsp;&nbsp; <strong>Develop Team</strong>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                <button type="button" class="btn btn-primary" onclick="aceptarRequestColaborador();">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal medium -->


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style = "padding: 20px">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Proyectos</h2>
                                    <button onclick="location.href='vistaProyecto.php' ;"class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Nuevo proyecto</button>
                                        
                                </div>
                            </div>
                        </div>
                        <div id="chart-container">
                          <canvas id="mycanvas" width="600px" height="auto"></canvas>
                        </div>
                        <div class="row" id="proyectoC">

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Web-Manager. Todos los derechos reservados. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
<?php include_once('../dependencies.php'); ?>
</body>

</html>
<!-- end document-->
