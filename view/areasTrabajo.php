<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>

<body class="animsition" onload="obtenerColaboradorManager()">
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
                    <!-- Aqui va el cuerpo de la pantalla -->
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" href="#area_1">Áreas de Trabajo</a></h4>
                                </div>
                                <div id="area_1" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        <li style="list-style-type: none;">
                                            <button type="button"  data-toggle="collapse" href="#collapse_uno" style="width: 310px;" class="btn btn-primary btn-lg">Quality Assurance</button>
                                                <div id="collapse_uno" class="panel-collapse collapse">
                                                    <table id="tabla_collapse_uno"  style="width:32%" class="table table-borderless table-striped table-earning">
                                                        <thead>
                                                            <tr style="width: 500px;">
                                                                <th >Nombre</th>
                                                                <th >Manager</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="area_trabajo_uno"></tbody>
                                                    </table>
                                                </div>
                                        </li>
                                        <li style="list-style-type: none;">
                                            <button type="button" data-toggle="collapse" href="#collapse_dos" style="width: 310px;" class="btn btn-success btn-lg">Desarrollo</button>
                                            <div id="collapse_dos" class="panel-collapse collapse">
                                                    <table id="tabla_collapse_dos"  style="width:32%" class="table table-borderless table-striped table-earning">
                                                        <thead>
                                                            <tr style="width: 500px;">
                                                                <th >Nombre</th>
                                                                <th >Manager</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody id="area_trabajo_dos"></tbody>
                                                </table>
                                            </div>
                                        </li>
                                        <li style="list-style-type: none;">
                                            <button type="button"  data-toggle="collapse" href="#collapse_tres" style="width: 310px;" class="btn btn-warning btn-lg">Soporte</button>
                                                <div id="collapse_tres" class="panel-collapse collapse">
                                                        <table id="tabla_collapse_tres" style="width:32%" class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr style="width: 500px;">
                                                                    <th >Nombre</th>
                                                                    <th >Manager</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="area_trabajo_tres"></tbody>
                                                        </table>
                                                </div>
                                        </li>
                                        <li style="list-style-type: none;">
                                            <button type="button"  data-toggle="collapse" href="#collapse_cuatro" style="width: 310px;" class="btn btn-danger btn-lg">Liderazgo</button>
                                                <div id="collapse_cuatro" class="panel-collapse collapse">
                                                        <table id="tabla_collapse_cuatro" style="width:32%" class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr style="width: 50px;">
                                                                    <th >Nombre</th>
                                                                    <th >Manager</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="area_trabajo_cuatro"></tbody>
                                                        </table>
                                                </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <!-- Aqui va el cuerpo de la pantalla -->
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
