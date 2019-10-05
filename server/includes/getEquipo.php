<?php
	require ('../conexion.php');

	$id_area = $_POST['id_area'];

	$queryE = "SELECT id_equipo, equipo FROM t_equipo WHERE id_area = '$id_area' ORDER BY equipo";
	$resultadoE = $mysqli->query($queryE);

	$html= "<option value='0'>Seleccionar equipo</option>";

	while($rowE = $resultadoE->fetch_assoc())
	{
		$html.= "<option value='".$rowE['id_equipo']."'>".$rowE['equipo']."</option>";
	}

	echo $html;
?>
