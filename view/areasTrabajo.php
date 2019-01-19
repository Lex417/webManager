<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>
<script type="text/javascript">
    $(document).ready(function () {
        desplegar_metodos2();
        reset_valor_global(); 
    });
</script>

<body class="animsition">
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
                    <div class="row" style ="padding: 20px">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Áreas de Trabajo</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 0px 170px 10px;">
                        <div class="col-md-13">
                            <button type="button" class="btn btn-success btn-md" onclick="desplegar_dep_desarrollo();">Desarrollo</button>
                            <button type="button" class="btn btn-success btn-md" onclick="desplegar_dep_soporte();">Soporte Técnico</button>
                            <button type="button" class="btn btn-success btn-md" onclick="desplegar_dep_qa();">Quality Assurance</button>
                            <button type="button" class="btn btn-success btn-md" onclick="desplegar_dep_liderazgo();">Team Leadership</button>
                        </div>
                    </div>
                    <div class="row" style="padding: 0px 80px 0px;">
                        <div class="col-md-4">
                            <input type="text" id="input-busqueda1" class="search form-control" style="width: 220px; " placeholder="Buscar colaborador..">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="input-busqueda2" class="search form-control" style="width: 220px; " placeholder="Buscar Manager..">
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="input-busqueda3" class="search form-control" style="width: 210px; " placeholder="Buscar Equipo..">
                        </div>
                        <div class="col-md-1">
                            <div class="form-check-inline form-check">
                                <label class="control-label mb-1">
                                    <select name="select" style="width: 70px;" id="select-resultados-area" onchange="reordenar_filas();" class="form-control">
                                        <option value="0"selected>2</option>
                                        <option value="1">5</option>
                                        <option value="2">10</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 10px 20px 0px;">
                        <div class="col">
                            <table  id= "tabla-areas-trabajo" class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th  width="28%">Colaborador</th>
                                        <th  width="20%">Manager</th>
                                        <th width="10%">Equipo de Trabajo</th>
                                    </tr>
                                </thead>
                                <tbody id="t_body_departamentos"></tbody>
                            </table>
                        </div>
                    </div>
                        <div class="row" style="padding: 40px 35px 10px;">
                            <div id="pagination" class="pagination"></div>
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