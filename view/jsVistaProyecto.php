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
					$('#inicio_Proyecto, #fin_Proyecto, #datepicker-3').datepicker({
						language: 'es',
						format:'yyyy-mm-dd',
						todayBtn: 'linked',
						autoclose: true
                   });
 </script>