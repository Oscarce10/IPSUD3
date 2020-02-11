<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente = new Paciente();
$pacientes = $paciente->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
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
						<tbody>
							<?php
							foreach ($pacientes as $p) {
								echo "<tr id='pac" .$p->getId() ."'>";
								echo "<td>" . $p->getId() . "</td>";
								echo "<td>" . $p->getNombre() . "</td>";
								echo "<td>" . $p->getApellido() . "</td>";
								echo "<td>" . $p->getCorreo() . "</td>";
								echo "<td> <div id='est" . $p->getId() . "'>" . (($p->getEstado()==1)?"<i class='fas fa-check-circle fa-2x text-success'></i>":"<i class='fas fa-times-circle fa-2x text-danger'></i>") . "</td>";
								echo "<td>" . (($p->getFoto() !== "" && file_exists("img/" . $p->getFoto() . "") && $p->getFoto()) ?
									"<img src='img/" . $p->getFoto() . "' alt='Imagen de usuario" . $p->getFoto() . "' height='50px'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

								echo "<td>" .
									"<a href='modalPaciente.php?idPaciente=" . $p->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
								<a class='fas fa-pencil-ruler' href='index.php?pid=" .
									base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" .
									$p->getId() . "' data-toggle='tooltip' data-placement='top' title='Actualizar'> </a>
												   
					   			<a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") .
									"&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='bottom' title='Actualizar Foto'></a>";
									  
// 								echo ($p->getEstado())?"<span id='inhab" . $p->getId() . "'><a class='fas fa-lock-open' id='hab" .$p->getId() ."' href='#' data-toggle='tooltip' data-placement='right' 
// 								title='Inhabilitar paciente'></a></span>":"<span id='hab" . $p->getId() . "'><a class='fas fa-lock' href='#' id='hab" .$p->getId() ."' data-toggle='tooltip' 
// 								data-placement='right' title='Habilitar paciente'></a></span>" . "</td>";
								
								echo "<span id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado()==0)?"fas fa-lock-open' title='Habilitar paciente' ": 
								"fas fa-lock' title='Inhabilitar paciente'") . "' id='hab" .$p->getId() . "' href='#' data-toggle='tooltip' data-placement='right' </a></span>";

								echo "</tr>";

								
							}
							echo "<tr><td colspan='9'>" . count($pacientes) . " registros encontrados</td></tr>" ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modalPaciente" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent">
		</div>
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
	<?php foreach ($pacientes as $p) { ?>
		$("#hab<?php echo $p -> getId();?>").click(function(){
			<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p -> getId() . "&estado=" . $p -> getEstado() . "\";"; ?>
			$("#hab<?php echo $p -> getId();?>").tooltip('hide');
			$("#pac<?php echo $p -> getId();?>").load(ruta);
		});
		<?php } ?>
	});
	</script>
