<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>

<body class="animsition" onload="obtenerVistaUsuarios()">
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
                    <div class="row" style=align>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header"><h3>Agregar Empleado</h3></div>
                                    <div class="card-body">
                                        <div class="card-title"></div>
                                            <form action="" method="post" id="form-add-usuario" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cedula" class="control-label mb-1">Id de empleado</label>
                                                    <input id="cedula" name="cedula" type="text" class="form-control" aria-required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre" class="control-label mb-1">Nombre de empleado</label>
                                                    <input id="nombre" name="nombre" type="text" class="form-control" aria-required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="apellido" class="control-label mb-1">Apellido de empleado</label>
                                                    <input id="apellido" name="apellido" type="text" class="form-control" aria-required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass" class="control-label mb-1">Password</label>
                                                    <input type="password" id="pass" name="pass" placeholder="Password" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="puesto" class="control-label mb-1">Puesto de usuario</label>
                                                        <select name="select" id="select-puesto" class="form-control">
                                                            <option value="0">Please select</option>
                                                            <option value="1">Programador</option>
                                                            <option value="2">Aseguramiento de calidad</option>
                                                            <option value="3">Servicio al cliente</option>
                                                            <option value="4">Soporte</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo" class="control-label mb-1">Tipo de usuario</label>
                                                    <input readonly="readonly" type="text" id="tipo" name="tipo" placeholder="Empleado" value="Colaborador"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="estado" class="control-label mb-1">Estado de usuario</label>
                                                    <input id="estado" name="estado" type="text" class="form-control" aria-required="true">
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" onclick="insertarUsuario();"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                                </div>
                                            </form>
                                    </div>
                            </div>
                      <div class="row" style = "padding: 20px">
                        <div class="col-md-12">
                          <div class="overview-wrap">
                            <h2 class="title-1">Colaboradores</h2>
                            <!-- Button trigger modal -->
                            <button type="button" class="au-btn au-btn--blue" data-toggle="modal" data-target="#modalAgregar">
                              <i class="zmdi zmdi-plus"></i> Agregar Colaborador
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                <!-- Aqui va el cuerpo de la pantalla -->
                </div>
                <div class=" table-responsive m-b-40">
                    <table class="table table-data2">
                       <thead>
                          <th>Cedula</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Puesto</th>
                          <th>Tipo</th>
                          <th>Estado</th>
                        </thead>
                      <tbody id="t_body">
                      </tbody>
                    </div>
                </div>
                <!-- MODAL -->
                <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                       <div class="modal-header">
                           <h3 class="modal-title" id="exampleModalLongTitle">Agregar Colaborador</h3>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                       </div>

                       <div class="modal-body">
                            <div class="card">         
                                <div class="card-body">
                                <form action="" method="post" id="form-add-usuario" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cedula" class="control-label mb-1">ID de Trabajador</label>
                                        <input id="cedula" name="cedula" type="text" class="form-control" aria-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="nombre" class="control-label mb-1">Nombre</label>
                                        <input id="nombre" name="nombre" type="text" class="form-control" aria-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="apellido" class="control-label mb-1">Apellido</label>
                                        <input id="apellido" name="apellido" type="text" class="form-control" aria-required="true">
                                    </div>

                                    <div class="form-group">
                                    <label for="pass" class="control-label mb-1">Password</label>
                                        <input type="password" id="pass" name="pass" placeholder="Password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="puesto" class="control-label mb-1">Puesto de usuario</label>
                                        <select name="select" id="select-puesto" class="form-control">
                                            <option value="0">Seleccione una opcion</option>
                                            <option value="1">Desarrollador</option>
                                            <option value="2">Quality Assurance</option>
                                            <option value="3">Soporte Técnico</option>
                                            <option value="4">Lider de Proyecto</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tipo" class="control-label mb-1">Tipo de usuario</label>
                                        <input readonly="readonly" type="text" id="tipo" name="tipo" placeholder="Empleado" value="Colaborador"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="estado" class="control-label mb-1">Estado de usuario</label>
                                        <input id="estado" name="estado" type="text" class="form-control" aria-required="true">
                                    </div>           
                                    </div>
                                </div>
                            </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <button type="submit" class="btn btn-primary" onclick="insertarUsuario();"><i class="fa fa-dot-circle-o"></i> Agregar</button>
                       </div>
                     </form>
                    </div>
                  </div>
                </div>
            </div><!-- END MAIN CONTENT-->
          </div><!-- END PAGE CONTAINER-->
        </div><!-- END PAGE WRAPPER-->

    <?php include_once('../dependencies.php'); ?>

</body>

</html>
