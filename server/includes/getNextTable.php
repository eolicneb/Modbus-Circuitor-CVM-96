<?php

	$prev = array_keys($_POST)[0];

	$nextTable=array('id_area'=>'equipo',
										'id_equipo'=>'sistema',
										'id_sistema'=>'elemento',
										'id_elemento'=>'componente');

	$next = $nextTable[$prev];

	$prev_id=array('id_area'=>'id_de_area',
									'id_equipo'=>'id_de_equipo',
									'id_sistema'=>'id_de_sistema',
									'id_elemento'=>'id_de_elemento');

	$id_prev = $_POST[$prev];

	require ('../conexion_planta.php');

	$queryM = "SELECT id_".$next.", $next FROM ".$next."s WHERE $prev_id[$prev] = '$id_prev'";
	$resultadoM = $mysqli->query($queryM);

	$html= "<option value='0'>Seleccionar ".$next."</option>";
	//echo $html;

	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_'.$next]."'>".$rowM[$next]."</option>";
	}

	echo $html;
?>
