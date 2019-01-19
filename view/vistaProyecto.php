<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php include_once('cssVistaProyecto.php');?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
	

		<title>Web Manager</title>

		<style>
			.width-100 {
			    width: 100% !important;
			}
			label {
				justify-content: left !important;
				width: 100% !important;
			}
			.page-container {
			    margin-top: 76px;
			    position: inherit;
			}
			@media (max-width: 991px)
				.page-container {
				    top: inherit;
				    margin-top: 88px;
				}
		</style>
	</head>
	<body class="animsition">
		<div class="page-wrapper">
			<?php include "menu.php"?>
			<div class="page-container">
				<?php include "header.php"?>  
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-xs-12 mtb-5p">
							<div class="col-12 col-sm-12 col-md-12 col-xs-12 mb-5p">
								<div class="col-12 col-sm-12 col-md-12 col-xs-12 no-padding">
									<div class="row">
										<div class="col-12 col-sm-12 col-md-12 col-xs-12">
											<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
												<div class="card text-white bg-primary" style="margin: 10px 0;border-color: #0E7272;">
													<div class="card-body background-white">
														<div class="form-inline"> <!-- Pasar desde aqui -->
															<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
																<div class="row">
																	<div class="col-12 col-sm-12 col-md-12 col-xs-12">
																		<label class="text-inline-block" for="nombre_Proyecto";padding-right: 10px;">Nombre:</label>
																		<input type="text"  class="form-control width-100" id="nombre_Proyecto" name="nombre_Proyecto" aria-label="Recipient's username" aria-describedby="button-addon2">
																		<small id="nombre_small" class="form-text text-muted" style="display: none;color: red !important;">Campo requerido *</small>
  
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
																		<div class="row" style="margin-left: 0; margin-right: 0;">
																			<div class="col-12 col-sm-6 col-md-6 col-xs-12">
																				<label class="text-inline-block" for="inicio_Proyecto" style="padding-right:0px;">Fecha inicio: </label>
																				<input type="date" class="form-control width-100" id="inicio_Proyecto" name="inicio_Proyecto">
																				<small id="inicio_small" class="form-text text-muted" style="display: none;color: red !important;"></small>
																			</div>
																			<div class="col-12 col-sm-6 col-md-6 col-xs-12">
																				<label class="text-inline-block"  for="fin_Proyecto">Fecha final:</label>
																				<input id="fin_Proyecto" type="date" class="form-control width-100" name="fin_Proyecto">
																				<small id="fin_small" class="form-text text-muted" style="display: none;color: red !important;"></small>
																			</div>
																		</div>
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-12 col-sm-12 col-md-12 col-xs-12">
																		<label class="text-inline-block" for="desc_Proyecto" style="display: : absolute;padding-right: 10px;">Descripción:</label>
																		<div class="md-form amber-textarea active-amber-textarea-2">
																			<textarea  id="desc_Proyecto"  name="desc_Proyecto" type="text" id="form16" cols="60" class="form-control width-100" rows="2"></textarea>
																			<small id="desc_small" class="form-text text-muted" style="display: none;color: red !important;">Campo requerido *</small>
																		</div>
																	</div>
																</div>
																<br>
																<div class="row">
																	<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
																		<div class="row" style="margin-left: 0; margin-right: 0;">
																			<div class="col-12 col-sm-6 col-md-6 col-xs-12">
																				<label for="estado_Proyecto" class="text-inline-block" style="padding-right: 10px;">    Estado</label> 

																				   <select  name="estado_Proyecto"	id="estado_Proyecto" class="custom-select mr-sm-2 width-100" id="">
																					<option value="activo">Activo</option>
																					<option value="inactivo">Inactivo</option>
																					
																				</select>
																			</div>
																			<div class="col-12 col-sm-6 col-md-6 col-xs-12">
																				<label  class="text-inline-block" for="id_Proyect_Manager" style="padding-right: 10px;"> Manager 
																			   </label>
																				<select  name="id_Proyect_Manager"	id="id_Proyect_Manager" class="custom-select mr-sm-2 width-100" disabled="disabled">
																					<option value="1">Yaudi</option>
																				</select>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row" style="margin-top: 10px;">
																	<div class="col-12 col-sm-12 col-md-12 col-xs-12 text-right">
																		<button  onclick="insertarProyecto();" type="submit" id="#modalForm" class="btn btn-outline-success">Guardar cambios</button>
																	</div>
																</div>
															</div>
														</div>
													</div><!--Hasa aqui --->
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

