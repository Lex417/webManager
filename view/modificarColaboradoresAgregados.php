<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
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
		<!-- Main CSS-->
		<link href="css/theme.css" rel="stylesheet" media="all">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/chosen.min.css">
		<link rel="stylesheet" href="datepicker/css/datepicker.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
			
		<!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">-->
		
		
		<title>Web Manager</title>
		
		
	</head>
	<body onload="cargarSkills();cargarDepartamentos(); verTodosLosColaboradoresProyecto()">
 		<div class="page-wrapper">
        <!-- HEADER MOBILE-->
	        <?php include "menu.php"?>

	        <!-- PAGE CONTAINER-->
	        <div class="page-container">
	            <!-- HEADER DESKTOP-->
	            <?php include "header.php"?> 
	        <br>
			<br>
			<br>
			<div class="container">
			<!-- Content here -->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-xs-12 mtb-5p">
						<div class="card text-white bg-primary">
							<div class="card-body background-white">
								<div class="col-12 col-sm-12 col-md-12 col-xs-12 mb-5p">
								<div class="col-12 col-sm-12 col-md-12 col-xs-12 no-padding">
								<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
									<div class="table-responsive table--no-card m-b-30">
									<div class="card-header text-center">
										Colaboradores Agregados
									</div>
									<div class="card-body background-white">
										
										<table class="table table-borderless table-striped table-earning" id="tAgregados">
											<thead class="thead-light">
												<tr>
													<th scope="col">Nombre</th>
													<th scope="col">Departamento</th>
													<th scope="col">Habilidad</th>
													<th scope="col">Manager</th>
													<th scope="col">Acciones</th>
												</tr>
											</thead>
											<tbody id="tablaAgregados"></tbody>
										</table>
										
									</div>
									</div>
									</div>
									<div class="row">
										
											<div class="table-responsive table--no-card m-b-30">
												<div class="card-header text-center">
													Busqueda de colaboradores
												</div>
												<div class="card-body background-white" >
													<form class="form-inline">
													
														<div class="row"> 

															<div class="col-14 col-sm-14 col-md-14 col-xs-14" style="padding: 30;">
																<div class="row">

																	<div class="col-12 col-sm-12 col-md-12 col-xs-12" style="display: flex;">
																		<label class="text-inline-block" style="display: inline-block;padding-right: 2px;padding-top: 5px;padding-left: 5px;">Nombre</label>
																		<input type="text" class="form-control width-100"  aria-label="Recipient's username" id="nombreU"aria-describedby="button-addon2">
																		<label class="text-inline-block" style="display: inline-block;padding-right: 2px;padding-top: 5px;padding-left: 5px">Departamento</label>
																		<select class="custom-select mr-sm-2" id="departamentoSelect" >
																	
																		
																		
																	    </select>
																		<label class="text-inline-block" style="display: inline-block;padding-right: 2px;padding-top: 5px;padding-left: 5px">Habilidad </label>
																		<select class="custom-select mr-sm-2" id="habilidadSelect" >
																		
																		
																		
																		</select>
																		<button type="button" class="btn btn-outline-success" onclick="cargarColaboradoresFiltroModificar()">Buscar</button>
																		
																	</div>
																
																</div>
															
															</div>
															
														</div>
															
														</form>
													</div>
													</div>
												
											 <div class="col-12 col-sm-12 col-md-12 col-xs-12" style="padding: 0;">
												<div class="table-responsive table--no-card m-b-30">
												<div class="card-header text-center">
													Recursos Afines
												</div>
												<div class="card-body background-white">
													<div class="table-responsive">
														<table class="table table-borderless table-striped table-earning" id="tPosibles">
															<thead class="thead-light">
																<tr>
																	<th scope="col">Nombre</th>
																	<th scope="col">Departamento</th>
																	<th scope="col">Habilidad</th>
																	<th scope="col">Manager</th>
																	<th scope="col">Acciones</th>
																</tr>
															</thead>
															<tbody id="tablaPosibles">
																
																
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
			</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	
		<script src="https://cdn.jsdelivr.net/velocity/1.1.0/velocity.min.js"></script>
		<script src="https://cdn.jsdelivr.net/velocity/1.1.0/velocity.ui.min.js"></script>
		
		<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
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
						$(this).children('i').removeClass('fa-folder-minus').addClass('fa-folder-plus');
					}
					return false;
				});
			})( jQuery );
			
			// Documentación: https://harvesthq.github.io/chosen/
			$('#inlineFormCustomSelect').chosen({
				placeholder_text_single: "ESTATUS DEL PROYECTO",
				no_results_text: "¡Ups, sin resultados!"
			}).change(function () {
				alert($(this).val());
			});
			
			// Documentación: https://vitalets.github.io/bootstrap-datepicker/
			$('#datepicker-1, #datepicker-2, #datepicker-3').datepicker({
				language: 'es',
				format:'dd-mm-yyyy',
				todayBtn: 'linked',
				autoclose: true
			});
		</script>
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" media="all">
	<script src="https:/cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/proyectosJs.js"></script>

  </body>
</html>