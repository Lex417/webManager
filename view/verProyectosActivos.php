
<html lang="es">
<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>
<script type="text/javascript">
 $(document).ready(function(){
  obtenerVistaPerfil();
  obtenerInfoUsuario();
  obtenerSkillUsuario();

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
                <div class="section_content section_content--p30">
                    <div class="container-fluid">
                    <!-- Aqui va el cuerpo de la pantalla -->
                      <div class="row" style = "padding: 20px">
                        <div class="col-md-12">
                          <div class="overview-wrap">
                            <h2 class="title-1">Perfil</h2>
                            <!-- Button trigger modal -->
                            <button type="button" class="au-btn au-btn--blue" data-toggle="modal" data-target="#modalEditarUsuario">
                            <i class="far fa-edit"></i> Editar Perfil
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- Aqui va el cuerpo de la pantalla -->
                </div>
                <div class="row" style="padding: 0px 35px 0px;">
                          <div class="card" style="width:1020px">
                            <div class="card-body">
                            <h3 id="titulo-ver-perfil"class="modal-title"></h3>
                            <div class="row"style="padding: 0px 35px 0px;">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cedula-perfil" class="control-label mb-1">Número de Cedula</label>
                                    <input readonly="readonly" id="cedula-perfil" width="30" name="cedula-perfil" type="text" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="pass-perfil" class="control-label mb-1">Contraseña de Usuario</label>
                                  <input readonly="readonly" id="pass-perfil" name="pass-perfil" type="password" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="estado-perfil" class="control-label mb-1">Estado de Usuario</label>
                                  <input readonly="readonly" id="estado-perfil" name="estado-perfil" type="text" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="manager-perfil" class="control-label mb-1">Manager Asignado</label>
                                  <input readonly="readonly" id="manager-perfil" name="manager-perfil" type="text" class="form-control">
                                </div> 
                              </div>
                            </div>
                            </div>
                          </div>
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
                            <tbody id="t_body"></tbody>
                          </table>
                      </div>
                    </div>

                  </div>
                  <button type="button" class="au-btn au-btn--blue" style="margin-left:72%" data-toggle="modal" onclick="obtenerSkill()" data-target="#modalAgregarHabilidades">
                      <i class="far fa-edit"></i> Agregar habilidades
                  </button>
                  <div class="row" style="padding: 10px 20px 0px;">
                    <div class="col">
                      <div class=" table-responsive m-b-40">
                          <table  class="table table-borderless table-striped table-earning" id="tSkillsActuales">
                            <thead>
                              <th>Habilidad</th>
                              <th>Acciones</th>
                            </thead>
                            <tbody id="t_Skill"></tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="modal fade" id="modalVerUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <h3 id="titulo-ver-perfil"class="modal-title"></h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                                <form action="#" method="post" id="form-edit-usuario" novalidate="novalidate">
                                  <div class="form-group">
                                    <label for="cedula-perfil" class="control-label mb-1">Número de Cedula</label>
                                    <input readonly="readonly" id="cedula-perfil" name="cedula-perfil" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="pass-perfil" class="control-label mb-1">Contraseña</label>
                                    <input readonly="readonly" id="pass-perfil" name="pass-perfil" type="password" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="estado-perfil" class="control-label mb-1">Estado de Usuario</label>
                                    <input readonly="readonly" id="estado-perfil" name="estado-perfil" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="manager-perfil" class="control-label mb-1">Manager Asignado</label>
                                    <input readonly="readonly" id="manager-perfil" name="manager-perfil" type="text" class="form-control">
                                  </div>     
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                          </div>

                        </div>
                      </div>
                    </div> -->
                    <!-- MODAL EDITAR USAURIO -->

                    <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <h3 id="titulo-ver-perfil"class="modal-title">Editar Perfil</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                                <form action="#" method="post" id="form-edit-usuario" novalidate="novalidate">
                                  <div class="form-group">
                                    <label for="cedula-editar-perfil" class="control-label mb-1">Número de Cedula</label>
                                    <input  readonly="readonly" id="cedula-editar-perfil" name="cedula-editar-perfil" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <label for="nombre-editar-perfil" class="control-label mb-1">Nombre</label>
                                    <input  id="nombre-editar-perfil" name="nombre-editar-perfil" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <label for="apellido-editar-perfil" class="control-label mb-1">Apellidos</label>
                                    <input  id="apellido-editar-perfil" name="apellido-editar-perfil" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="pass-editar-perfil" class="control-label mb-1">Contraseña</label>
                                    <input  id="pass-editar-perfil" name="pass-editar-perfil" type="password" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="select-editar-perfil" class="control-label mb-1">Estado de Usuario</label>
                                    <select  id="select-editar-perfil" name="select-editar-perfil" class="form-control"></select>
                                  </div>   
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" onclick="modificarPerfil();"><i class="far fa-check-circle"></i> Editar</button>
                          </div>

                        </div>
                      </div>
                    </div>



                    <div class="modal fade" id="modalAgregarHabilidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <h3 id="titulo-ver-perfil"class="modal-title">Agregar habilidades</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                              <div class="row" style="padding: 10px 20px 0px;">
                                <div class="col">
                                  <div class=" table-responsive m-b-40">
                                      <table  class="table table-borderless table-striped table-earning" id="tablaSkillAgregar">
                                        <thead>
                                          <th>Habilidad</th>
                                          <th>Acciones</th>
                                        </thead>
                                        <tbody id="t_Skill_agregar"></tbody>
                                      </table>
                                  </div>
                                </div>
                              </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- MODAL EDITAR USAURIO -->
                    <!-- MODAL MENSAJE CONFIRMACION EDITAR PERFIL -->
                    <div class="modal fade" id="mensaje-editar-perfil">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h3 class="modal-title">Mensaje</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="alert alert-success">
                                <strong>Éxito!</strong> El pefil se modificó con éxito
                                </div>
                            </div>

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- MODAL MENSAJE CONFIRMACION EDITAR PERFIL-->

    <?php include_once('../dependencies.php'); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
   
</body>

</html>