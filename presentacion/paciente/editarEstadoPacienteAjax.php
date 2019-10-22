<?php
$paciente = new Paciente($_GET['idPaciente'], "", "", "", "", "", $_GET['estado']);
$paciente->actualizarEstado();
$paciente->consultar();
echo "<td>" . $paciente->getId() . "</td>";
echo "<td>" . $paciente->getNombre() . "</td>";
echo "<td>" . $paciente->getApellido() . "</td>";
echo "<td>" . $paciente->getCorreo() . "</td>";
echo "<td>" . (($paciente->getEstado()==1)?"<i class='fas fa-check-circle fa-2x text-success'></i>":"<i class='fas fa-times-circle fa-2x text-danger'></i>") . "</td>";
echo "<td>" . (($paciente->getFoto() !== "" && file_exists("img/" . $paciente->getFoto() . "") && $paciente->getFoto()) ?
"<img src='img/" . $paciente->getFoto() . "' alt='Imagen de usuario" . $paciente->getFoto() . "' height='50px'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

echo "<td>" .
"<a href='modalPaciente.php?idPaciente=" . $paciente->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
<a class='fas fa-pencil-ruler' href='index.php?pid=" .
base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" .
$paciente->getId() . "' data-toggle='tooltip' data-placement='top' title='Actualizar'> </a>

<a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") .
"&idPaciente=" . $paciente->getId() . "' data-toggle='tooltip' data-placement='bottom' title='Actualizar Foto'></a>";

echo ($paciente->getEstado())?"<a class='fas fa-lock-open' id='hab" .$paciente->getId() ."' href='#' data-toggle='tooltip' data-placement='right' 
title='Inhabilitar paciente'></a>":"<a class='fas fa-lock' href='#' id='hab" .$paciente->getId() ."' data-toggle='tooltip' 
data-placement='right' title='Habilitar paciente'></a>" . "</td>";
?>


<script type="text/javascript">
$(document).ready(function(){	
		$("#hab<?php echo $paciente -> getId();?>").click(function(){
			<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p -> getId() . "&estado=" . (($paciente -> getEstado() == 1)?"1":"0") . "\";" ?>
			$("#hab<?php echo $paciente -> getId();?>").tooltip('hide');
			$("#pac<?php echo $paciente -> getId();?>").load(ruta);
		});
	});
	</script>