<?php
$administrador = new Administrador ( $_SESSION ['id'] );
$administrador->consultar ();

include 'presentacion/menuAdministrador.php';
?>


<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-6">
			<!-- Search form -->
			<form class="form-inline active-pink-3 active-pink-4">
				<i class="fas fa-search" aria-hidden="true"></i> <input
					class="form-control form-control-sm ml-3 w-75" type="text"
					id="formConsulta"
					placeholder="Buscar paciente por nombre o apellido"
					aria-label="Search">
			</form>
		</div>
		<div class="col-6">
			<a class="btn btn-outline-warning" href="#" role="button">Exportar
				todos los usuarios como PDF</a>
		</div>
	</div>


	<div class="col-12" id="tabla"></div>
</div>


<div class="modal fade" id="modalPaciente" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent"></div>
	</div>
</div>

<script>
$(document).ready(function(){	
	
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});

	$("#formConsulta").keyup(function() {
		console.log( $("#formConsulta").val());
		if($("#formConsulta").val() != ""){
			$("#tabla").show();
			<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/filtroPacientes.php")."\";";?>
			
			$("#tabla").load(ruta, {"filtro": $("#formConsulta").val()})
			<?php ob_start();?>
		}
		else
			$("#tabla").hide();
		
			});	

	//Al presionar enter se cierra la sesion, esto evita que eso pase
	$(document).keypress(
			  function(event){
			    if (event.which == '13') {
			      event.preventDefault();
			    }
			});
	
});
</script>

<script>

 
// function generatePDF(){
// 	console.log("asdd");
// 	html2canvas(document.querySelector('body')).then(canvas => {
// 		let pdf = new jsPDF('p', 'mm', 'a4');
// 		pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
// 		pdf.save("pacientes");
// 	});
// }

function print() {
	var w = document.getElementById("tabla").offsetWidth;
	  var h = document.getElementById("tabla").offsetHeight;
	  html2canvas(document.getElementById("tabla"), {
	    dpi: 300, // Set to 300 DPI
	    scale: 0.5, // Adjusts your resolution
	    onrendered: function(canvas) {
	      var img = canvas.toDataURL("image/jpeg", 1);
	      var doc = new jsPDF('L', 'px', [w, h]);
	      doc.addImage(img, 'JPEG', 0, 0, w, h);
	      doc.save('pacientes.pdf');
	    }
	  });
}
</script>
