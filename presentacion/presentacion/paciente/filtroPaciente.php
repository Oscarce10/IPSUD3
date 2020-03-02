<?php

    foreach ($pacientes as $p) {
        // Esta capa correspondiente a la fila del paciente a actualizar permitira agregar subcapas de estado y el candado a cambiar
        echo "<tr id='pac" . $p->getId() . "'>";

        echo "<td>" . $p->getId() . "</td>";

        echo "<td>" . $p->getNombre() . "</td>";

        echo "<td>" . $p->getApellido() . "</td>";

        echo "<td>" . $p->getCorreo() . "</td>";

        // Capa <div> correspondiente al icono de Estado a cambiar dependiendo el estado del paciente
        echo "<td><div id='est" . $p->getId() . "'>" . (($p->getEstado() == 1) ? "<i class='fas fa-check-circle fa-2x text-success'></i>" : "<i class='fas fa-times-circle fa-2x text-danger'></i>") . "</td>";

        echo "<td>" . (($p->getFoto() !== "" && file_exists("img/" . $p->getFoto() . "") && $p->getFoto()) ? "<img src='img/" . $p->getFoto() . "' alt='Imagen de usuario" . $p->getFoto() . "' height='50px'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

        echo "<td>" . "<a href='modalPaciente.php?idPaciente=" . $p->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
								<a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='top' title='Actualizar'> </a>
												   
					   			<a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='bottom' title='Actualizar Foto'></a>";

        // Icono de candado a cambiar dependiendo si el paciente esta activo o no
        echo "<span id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado() == 0) ? "fas fa-lock-open' title='Habilitar paciente' " : "fas fa-lock' title='Inhabilitar paciente'") . "' id='hab" . $p->getId() . "' href='#' data-toggle='tooltip' data-placement='right' </a></span>";

        echo "</tr>";
    }
    echo "<tr><td colspan='9'>" . count($pacientes) . " registros encontrados</td></tr>"?>