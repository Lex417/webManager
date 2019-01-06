
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include_once('cssVistaProyecto.php');?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
	

		<title>Web Manager</title>
	</head>
	<body>
		<div class="page-wrapper">
			<?php include "menu.php"?>
			<div class="page-container">
				<?php include "header.php"?> 
				<br>
				<br>
				<br>
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-xs-12 mtb-5p">
							<div class="card text-white bg-primary">
								<div class="card-body background-white">
									<div class="col-12 col-sm-12 col-md-12 col-xs-12 mb-5p">
										<div class="col-12 col-sm-12 col-md-12 col-xs-12 no-padding">
											<div class="row"
											<div class="col-9 col-sm-9 col-md-9 col-xs-12">
												<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
													<div class="card text-white bg-primary mb-5p">
														<div class="card-header text-center">
															Crear Proyecto
														</div>
														<div class="card-body background-white">
															<form  id="vistaFormulario" method="post"  class="form-inline">
																<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;">
																			<label  for="id_Proyecto"  class="text-inline-block" style="display: inline-block;padding-right: 10px;"> Id proyecto:</label>
																			<input type="text" class="form-control width-100" id="id_Proyecto" name="id_Proyecto" aria-label="Recipient's username" aria-describedby="button-addon2">
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;">
																			<label class="text-inline-block" for="nombre_Proyecto" style="display: inline-block;padding-right: 10px;">Nombre:</label>
																			<input type="text"  class="form-control width-100" id="nombre_Proyecto" name="nombre_Proyecto" aria-label="Recipient's username" aria-describedby="button-addon2">
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;padding: 0;">
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label class="text-inline-block" for="inicio_Proyecto" style="display: inline-block;padding-right: 10px;">Fecha inicio: </label>
																				<input  type="text" class="form-control" id="inicio_Proyecto" name="inicio_Proyecto" style="max-width: 50%;">
																			</div>
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label class="text-inline-block"  for="fin_Proyecto"style="display: inline-block;padding-right: 10px;">Fecha final:</label>
																				<input id="fin_Proyecto" type="text" class="form-control" name="fin_Proyecto"  style="max-width: 50%;">
																			</div>
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-15 col-xs-26" style="display: flex;">
																			<label class="text-inline-block" for="desc_Proyecto" style="display: inline-block;padding-right: 10px;">Descripción:</label>
																			<div class="md-form amber-textarea active-amber-textarea-2">
																				<textarea  id="desc_Proyecto"  name="desc_Proyecto" type="text" id="form16" cols="60" class="form-control width-100" rows="2"></textarea>
																			</div>
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;padding: 0;">
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label for="estado_Proyecto" class="text-inline-block" style="display: inline-block;padding-right: 10px;">    Estado</label> 
	
																				   <select  name="estado_Proyecto"	id="estado_Proyecto" class="custom-select mr-sm-2" id="">
																					<option value="activo">Activo</option>
																					<option value="inactivo">Inactivo</option>
																					
																				</select>
																			</div>
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label  class="text-inline-block" for="id_Proyect_Manager" style="display: inline-block;padding-right: 10px;"> Manager 
																			   </label>
																				<select  name="id_Proyect_Manager"	id="id_Proyect_Manager" class="custom-select mr-sm-2" id="">
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-12 col-sm-12 col-md-12 col-xs-12 text-right">
																			<button  onclick="insertarProyecto();" type="submit" id="#modalForm" class="btn btn-outline-success">Guardar cambios</button>

																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
							           </div>
							       </div>
					          </div>
					      </div>
					   </div>
					</div>
				</div>
				<?php include_once('jsVistaProyecto.php');?>
				<script src="js/main.js"></script>
				<script src="js/proyectosJs.js" ></script>


	</body>  
</html>

<!--
	Estilo de tabla
<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
											<div class="card text-white bg-primary mb-5p">
											<div class="card-header text-center">
												Recursos Afines
											</div>
											<div class="card-body background-white">
												<div class="table-responsive">
													<table class="table">
														<thead class="thead-light">
															<tr>
																<th scope="col">Nombre</th>
																<th scope="col">Departamento</th>
																<th scope="col">Tiempo Dedicado</th>
																<th scope="col">Manager</th>
																<th scope="col">Acciones</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th>###</th>
																<td>###</td>
																<td>###</td>
																<td>###</td>
																<td>
																	<a href="">Ver</a> | <a href="">Editar</a>
																</td>
															</tr>
															<tr>
																<th>###</th>
																<td>###</td>
																<td>###</td>
																<td>###</td>
																<td>
																	<a href="">Ver</a> | <a href="">Editar</a>
																</td>
															</tr>
															<tr>
																<th>###</th>
																<td>###</td>
																<td>###</td>
																<td>###</td>
																<td>
																	<a href="">Ver</a> | <a href="">Editar</a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

-->