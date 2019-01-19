
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		
		<!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">-->
		
		
		<link rel="stylesheet" href="chosen.min.css">
		<link rel="stylesheet" href="datepicker/css/datepicker.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<link href="css/font-face.css" rel="stylesheet" media="all">
		<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
		<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
		<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
		<link href="css/template.css" rel="stylesheet" media="all">

		<!-- Bootstrap CSS-->
		<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
	 
		<!-- Vendor CSS-->
		<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
		<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
		<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
		<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
		<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
		<link href="css/theme.css" rel="stylesheet" media="all">

		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

		<title>Web Manager</title>
	</head>
	<body onload="editarDatosProyecto(); obtenerVistaUsuariosPorProyecto(); obtenerNombreManagerActual();">
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
													<div class="card text-white  mb-5p" style= "background-color: #0E7272;">
														<div class="card-header text-center">
															Detalles Proyecto
														</div>
														<div class="card-body background-white">
															<form  id="vistaFormulario" class="form-inline" method="POST">
																<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;">
																			
																			<input type="hidden" class="form-control width-100" disabled id="id_Proyecto" name="id_Proyecto" aria-label="Recipient's username" aria-describedby="button-addon2">
																		</div>

																	</div>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;">
																			<label class="text-inline-block" for="nombre_Proyecto" style="display: inline-block;padding-right: 10px;">Nombre:</label>
																			<input type="text"  class="form-control width-100" disabled id="nombre_Proyecto" name="nombre_Proyecto" aria-label="Recipient's username" aria-describedby="button-addon2">
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" onclick="editarNombreProyecto();" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;padding: 0;">
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label class="text-inline-block" for="inicio_Proyecto" style="display: inline-block;padding-right: 10px;">Fecha inicio: </label>
																				<input  type="date" class="form-control" disabled name="inicio_Proyecto" id="inicio_Proyecto" style="max-width: 50%;">
																			</div>
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label class="text-inline-block"  for="fin_Proyecto"style="display: inline-block;padding-right: 10px;">Fecha Final: </label>
																				<input  type="date" class="form-control" disabled name="fin_Proyecto" id="fin_Proyecto" style="max-width: 50%;">
																			</div>
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" onclick="editarFechasProyecto();" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-15 col-xs-26" style="display: flex;">
																			<label class="text-inline-block" for="desc_Proyecto"  style="display: inline-block;padding-right: 10px;">Descripción:</label>
																			<div class="md-form amber-textarea active-amber-textarea-2">
																				<textarea  id="desc_Proyecto" disabled  name="desc_Proyecto" type="text" id="form16" cols="40" class="md-textarea form-control" rows="2"></textarea>
																			</div>
																		</div>
																		<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" onclick="editarDescripcionProyecto();" class="btn btn-outline-primary width-100 mb-5p">Editar</button>
																		</div>
																	</div>
																	<br>
																	<div class="row">
																		<div class="col-9 col-sm-9 col-md-9 col-xs-12" style="display: flex;padding: 0;">
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label for="estado_Proyecto" class="text-inline-block" style="display: inline-block;padding-right: 10px;">Estado</label> 
																				   <select onclick=editarEstadoProyecto(); class="custom-select mr-sm-2" name="estado_Proyecto" id="estado_Proyecto">

																				   </select>
																			</div>
																			<div class="col-6 col-sm-6 col-md-6 col-xs-6" style="display: flex;">
																				<label  class="text-inline-block" for="id_Proyect_Manager" style="display: inline-block;padding-right: 10px;"> Manager Actual
																			   </label>
																  
																				<select  name="selectNombresManagers"	id="selectNombresManagers" class="custom-select mr-sm-2" id="">
																					<!-- se agregan las opciones desde javascript  -->
																					
																				</select>
																			</div>
																			<div class="col-3 col-sm-3 col-md-3 col-xs-12">
																			<button type="button" onclick=" obtenerNombresManagers();" class="btn btn-outline-primary width-200 mb-5p">Cambiar Manager</button>
																		</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-12 col-sm-12 col-md-12 col-xs-12 text-right">
																			<button type="button" onclick="actualizarDatosProyectoBD();" id="btGuardarCambios" disabled class="au-btn au-btn-icon au-btn--blue">Guardar cambios</button>
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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Colaboradores</h2>
                                    <button onclick="location.href='informacion.php' ;"class="au-btn au-btn-icon au-btn--blue">
									Editar colaboradores</i></button>
                                </div>
                            </div>

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
													<div class="card text-white  mb-5p" style= "background-color: #0E7272;">
														<div class="card-header text-center">
															Colaboradores Agregados
														</div>
														<div class="card-body background-white">
														<div class="table-responsive">
														<table class=" text-center   table table-striped table table-bordered table-hover " >
															<thead class="thead-light">
																<tr>
																	<th scope="col">Cédula</th>
																	<th scope="col">Nombre</th>
																	<th scope="col">Apellido</th>
																	<th scope="col">Puesto</th>
																	<th scope="col" style="width:123px;">Tipo</th>
																	<th scope="col">Estado</th>
																	<th scope="col" style="padding: 0px; width: 16px;">&nbsp;</th>
																</tr>
															</thead>
															<tbody id="">
																<tr>
																	<td colspan="7" style="padding: 0px; border: none;">
																		<div style="height: 298px; overflow: auto;">
																			<table id="">
																				<tbody id="t_body_empleados_proyecto">

																				</tbody>
																			</table>
																		</div>
																	</td>
																</tr>

															</tbody>
														</table>
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
				</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="vendor/jquery-3.2.1.min.js"></script>
		<script src="datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script type="text/javascript" src="datepicker/js/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
		<script src="vendor/bootstrap-4.1/popper.min.js"></script>
		<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
		<script src="chosen.jquery.min.js" type="text/javascript"></script>
		<!-- Vendor JS       -->
		<script src="vendor/slick/slick.min.js"></script>
		<script src="vendor/wow/wow.min.js"></script>
		<script src="vendor/animsition/animsition.min.js"></script>
		<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
		</script>
		<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
		<script src="vendor/counter-up/jquery.counterup.min.js"></script>
		<script src="vendor/circle-progress/circle-progress.min.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
		<script src="vendor/chartjs/Chart.bundle.min.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script>
			(function($) {
				var  $accordion = $('.accordion-js');
				$accordion.find('div').css({ display : 'none', overflow : 'hidden'});
				$accordion.children('dt').click(function() {
					var $this = $(this);
					var $targetContainer =  $this.next('div');
					var $targetDescription =  $targetContainer.find('dd').first();
					$('.accordion-element__term').removeClass('active');
					$this.toggleClass('active');
					if(!$targetDescription.hasClass('active')) {
						$targetContainer.css('display', 'block');
						$targetDescription.css('margin-top', -$targetDescription.height());
						$targetDescription.velocity({ marginTop: 0}, { duration: 350 });
						$targetDescription.addClass('active');
						$(this).children('i').removeClass('fa-folder-plus').addClass('fa-folder-minus');
					} else {
						$targetDescription.velocity({ marginTop: -$targetDescription.height()}, { duration: 350 });
						$targetDescription.removeClass('active');
						$(this).children('i').removeClass('fa-folder-minus').addClass('fa-folder-plus');}
						return false;
					});})( jQuery );
					$('#inlineFormCustomSelect').chosen({
						placeholder_text_single: "Estado del proyecto",
						no_results_text: "¡Ups, sin resultados!"
					}).change(function () {
						alert($(this).val());
					});
					$('#datepicker-1, #datepicker-2, #datepicker-3').datepicker({
						language: 'es',
						format:'dd-mm-yyyy',
						todayBtn: 'linked',
						autoclose: true
					});
		   </script>
		   <?php include_once('../dependencies.php'); ?>
  </body>  
</html>