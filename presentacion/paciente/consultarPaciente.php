<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente = new Paciente();
//$pacientes = $paciente->consultarTodos();
include 'presentacion/menuAdministrador.php';

?>
<div class="container">
	<div class="row">
		<div  class="col-6">
			<!-- Search form -->
			<form class="form-inline active-pink-3 active-pink-4" >
				<i class="fas fa-search" aria-hidden="true"></i> 
				<input
					class="form-control form-control-sm ml-3 w-75" type="text" id="formConsulta"
					placeholder="Buscar paciente por nombre o apellido"
					aria-label="Search">
			</form>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-header bg-primary text-white">Consultar Paciente</div>
			<div class="card-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nombre</th>
							<th scope="col">Apellido</th>
							<th scope="col">Correo</th>
							<th scope="col">Estado</th>
							<th scope="col">Foto</th>
							<th scope="col">Servicios</th>
						</tr>
					</thead>
					<tbody class="resConsulta">
							
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>



<div class="modal fade" id="modalPaciente" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent"></div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

<script type="text/javascript">
$(document).ready(function(){	
	$( "#formConsulta" ).keyup(function() {
		console.log($("#formConsulta").val());
		$filtro = ($filtro==null)?$("#formConsulta").val();
		$pacientes = null;
		$pacientes = $paciente-- >filtroPaciente($filtro);
		<?php 
		if($pacientes!= null){
		foreach ($pacientes as $p) { ?>
		$("#hab<?php echo $p -> getId();?>").click(function(){
			<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p -> getId() . "&estado=" . $p -> getEstado() . "\";"; ?>
			// Esto esconde el Tooltip del candado previamente seleccionado
			$("#hab<?php echo $p -> getId();?>").tooltip('hide');
			// Esto carga toda la capa de la fila de la tabla del paciente a actualizar vease arriba que la etiqueta <tr> contiene el id pac#
			$("#pac<?php echo $p -> getId();?>").load(ruta);
		});
		<?php }} ?>
		});

	<?php foreach ($pacientes as $p) { ?>
		$("#hab<?php echo $p -> getId();?>").click(function(){
			<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p -> getId() . "&estado=" . $p -> getEstado() . "\";"; ?>
			// Esto esconde el Tooltip del candado previamente seleccionado
			$("#hab<?php echo $p -> getId();?>").tooltip('hide');
			// Esto carga toda la capa de la fila de la tabla del paciente a actualizar vease arriba que la etiqueta <tr> contiene el id pac#
			$("#pac<?php echo $p -> getId();?>").load(ruta);
		});
		<?php } ?>
	});
	</script>
