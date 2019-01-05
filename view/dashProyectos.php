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

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row" style = "padding: 20px">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Proyectos</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Nuevo proyecto</button>
                                </div>
                            </div>
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
