<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>
<script type="text/javascript">
    $(document).ready(function () {
        desplegar_metodos();  
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
                    <div class="form-check-inline form-check">
                        <input type="text" id="input-busqueda" class="search form-control" style="width: 200px;" placeholder="Buscar...">&nbsp;
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="inline-radio1" name="inline-radios" value="id" class="form-check-input">ID
                        </label>
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="inline-radio2" name="inline-radios" value="nombre" class="form-check-input">NOMBRE
                        </label>
                        <label for="inline-radio3" class="form-check-label ">
                            <input type="radio" id="inline-radio3" name="inline-radios" value="puesto" class="form-check-input">PUESTO
                        </label>&nbsp;
                        <label class="control-label mb-1">
                            <select name="select" id="select-resultados" onchange="reordenar_filas();" class="form-control">
                                <option value="0">2</option>
                                <option value="1"selected>5</option>
                                <option value="2">10</option>
                            </select>
                        </label>
                    </div>
                    <script type="text/javascript"> $("#inline-radio1").prop('checked', true); </script>

                            <table width="50" id ="tabla_colaboradores" class="table table-hover">
                                <thead>
                                    <th width="5%">ID</th>
                                    <th width="5%">Nombre</th>
                                    <th width="5%">Apellido</th>
                                    <th width="5%">Puesto</th>
                                    <th width="5%">Estado</th>
                                    <th width="2%"></th>
                                    <th width="2%"></th>
                                    <th width="2%"></th>
                                </thead>
                                <tbody id="t_body"></tbody>
                            </table> 
                </div>
                <div id="pagination" class="pagination"></div>

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
                                <form action="#" method="post" id="form-add-usuario" >
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="cedula" class="control-label mb-1">ID de Trabajador</label>
                                            <input id="cedula" name="cedula" maxlength="25" required="required" pattern="^[0-9]*$" type="text" class="form-control" aria-required="true">
                                        </div>

                                        <div class="form-group">
                                            <label for="nombre" class="control-label mb-1">Nombre</label>
                                            <input id="nombre" name="nombre" maxlength="25"  required="required" pattern="^[A-Za-zÑñáéíóúÁÉÍÓÚ\s]*$" type="text" class="form-control" aria-required="true">
                                        </div>

                                        <div class="form-group">
                                            <label for="apellido" class="control-label mb-1">Apellido</label>
                                            <input id="apellido" name="apellido" maxlength="25" required="required" pattern="^[A-Za-zÑñáéíóúÁÉÍÓÚ\s]*$" type="text" class="form-control" aria-required="true">
                                        </div>

                                        <div class="form-group">
                                        <label for="pass" class="control-label mb-1">Password</label>
                                            <input type="password" id="pass"  required="required" pattern=".{6,}" name="pass" placeholder="Password" class="form-control" aria-required="true">
                                        </div>

                                        <div class="form-group">
                                            <label for="puesto" class="control-label mb-1">Puesto de usuario</label>
                                            <select name="select-puesto" id="select-puesto" class="form-control">
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="puesto" class="control-label mb-1">Equipo de Trabajo</label>
                                            <select name="select-equiposelect-equipo" id="select-equipo" class="form-control">
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tipo" class="control-label mb-1">Tipo de usuario</label>
                                            <select  id="select-tipo" name="select-tipo" class="form-control">
                                                <option value="0">Invitado</option>
                                                <option value="1">Colaborador</option>
                                                <option value="2">Team Manager</option>
                                                <option value="3">Proyect Manager</option>
                                            </select>
                                        </div>          
                                        </div>
                                    </div>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="insertarUsuario();"><i class="fa fa-dot-circle-o"></i> Agregar</button>
                        </div>
                        </fieldset>
                     </form>
                    </div>
                  </div>
                </div>
                <!-- MODAL -->
                <!-- MODAL EDITAR USUARIO -->
                <div class="modal fade" id="modalEditar">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Editar Colaborador</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post" id="form-edit-usuario" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="ed-cedula" class="control-label mb-1">ID de Trabajador</label>
                                                <input readonly="readonly" id="edit-cedula" name="edit-cedula" type="text" class="form-control" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="ed-nombre" class="control-label mb-1">Nombre</label>
                                                <input id="edit-nombre" name="edit-nombre" type="text" class="form-control" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="ed-apellido" class="control-label mb-1">Apellido</label>
                                                <input id="edit-apellido" name="edit-apellido" type="text" class="form-control" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="ed-puesto" class="control-label mb-1">Puesto de Usuario</label>
                                                <select  id="select-edit-puesto" name="select-edit-puesto" class="form-control"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="ed-equipo" class="control-label mb-1">Equipo de Trabajo</label>
                                                <select  id="select-edit-equipo" name="select-edit-equipo" class="form-control"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="ed-tipo" class="control-label mb-1">Tipo de Usuario</label>
                                                <select  id="select-edit-tipo" name="select-edit-tipo" class="form-control"></select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" onclick="modificarUsuario();"><i class="fa fa-dot-circle-o"></i> Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL EDITAR USUARIO -->
                <!-- MODAL ELIMINAR USUARIO -->
                <div class="modal fade" id="modalEliminar">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Eliminar Colaborador</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="alert alert-danger" align="center">
                                <strong>Alerta!</strong> ¿Seguro que desea eliminar al colaborador?
                                ID : <input align="center" readonly="readonly" size="10" align="middle" id="del-input"></input>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" onclick="eliminarUsuario();"><i class="fa fa-dot-circle-o"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL ELIMINAR USUARIO -->
                <!-- MODAL MENSAJE CONFIRMACION AGREGAR USUARIO -->
                <div class="modal fade" id="mensaje-agregar">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Mensaje</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="alert alert-success">
                                <strong>Éxito!</strong> El colaborador se ingreso con éxito
                                </div>
                            </div>

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL MENSAJE CONFIRMACION AGREGAR USUARIO -->
                <!-- MODAL MENSAJE CONFIRMACION ELIMINAR USUARIO -->
                <div class="modal fade" id="mensaje-eliminar">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Mensaje</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="alert alert-success">
                                <strong>Éxito!</strong> El colaborador se eliminó con éxito
                                </div>
                            </div>

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL MENSAJE CONFIRMACION ELIMINAR USUARIO -->
                <!-- MODAL MENSAJE CONFIRMACION EDITAR USUARIO -->
                <div class="modal fade" id="mensaje-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Mensaje</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="alert alert-success">
                                <strong>Éxito!</strong> El colaborador se modificó con éxito
                                </div>
                            </div>

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL MENSAJE CONFIRMACION EDITAR USUARIO -->
            </div><!-- END MAIN CONTENT-->
          </div><!-- END PAGE CONTAINER-->
        </div><!-- END PAGE WRAPPER-->

    <?php include_once('../dependencies.php'); ?>

</body>

</html>
