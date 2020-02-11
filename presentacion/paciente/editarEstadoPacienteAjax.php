<?php
$paciente = new Paciente($_GET['idPaciente'], "", "", "", "", "", $_GET['estado']);
$paciente->actualizarEstado();
$paciente->consultar();
$p = $paciente;

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
								
								
								echo "<span id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado()==0)?"fas fa-lock-open' title='Habilitar paciente' ":
										"fas fa-lock' title='Inhabilitar paciente'") . "' id='hab" .$p->getId() . "' href='#' data-toggle='tooltip' data-placement='right' </a></span>";
								echo "</td>"
?>
<script>
$('[data-toggle="tooltip"]').tooltip();
$("#hab<?php echo $p -> getId();?>").click(function(){
	<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p -> getId() . "&estado=" . $p -> getEstado() . "\";"; ?>
	$("#hab<?php echo $p -> getId();?>").tooltip('hide');
	$("#pac<?php echo $p -> getId();?>").load(ruta);
});
</script>