
<html lang="es">
<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>

<body class="animsition" onload="obtenerVistaPerfil()">
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
                      <div class="row" style = "padding: 20px">
                        <div class="col-md-12">
                          <div class="overview-wrap">
                            <h2 class="title-1">Proyectos Activos</h2>
                            <!-- Button trigger modal -->
                          </div>
                        </div>
                      </div>
                    </div>

                <!-- Aqui va el cuerpo de la pantalla -->
                </div>
                  <div class="row" style="padding: 10px 20px 0px;">
                        <div class="col">
                <div class=" table-responsive m-b-40">
                    <table  class="table table-borderless table-striped table-earning">
                       <thead>
                          <th>Nombre Proyecto</th>
                          <th>Estado</th>
                          <th>Puesto</th>
                        </thead>
                        <tbody id="t_body">
                      </tbody>
                  </table>
                    </div>
                </div>
                <div class="row" style="padding: 40px 35px 10px;"></div>
            </div>
        </div>
    <?php include_once('../dependencies.php'); ?>
    <script src="js/proyectosActivos.js"></script>
</body>

</html>
