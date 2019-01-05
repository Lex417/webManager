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
                                <div class="card-header">Formulario 1</div>
                                    <div class="card-body">
                                        <div class="card-title"><h2>Agregar Empleado</h2></div>
                                            <form action="" method="post" id="form-add-usuario" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cedula" class="control-label mb-1">Cedula de empleado</label>
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
                                                            <option value="2">Administracion</option>
                                                            <option value="3">Servicio al cliente</option>
                                                            <option value="4">Soporte</option>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipo" class="control-label mb-1">Tipo de usuario</label>
                                                    <input readonly="readonly" type="text" id="tipo" name="tipo" placeholder="Empleado" value="Empleado"  class="form-control">
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
                        </div>
                    </div>

                    <!-- Modal enano -->
                    <div class="modal fade" id="smallmodal"  role="dialog" aria-labelledby="smallmodalLabel">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Usuario ingresado correctmente</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- Modal enano -->
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
