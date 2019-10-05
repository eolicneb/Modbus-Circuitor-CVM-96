<?php
	require ('../conexion.php');

	$id_equipo = $_POST['id_equipo'];

	$query = "SELECT id_sistema, sistema FROM t_sistema WHERE id_equipo = '$id_equipo' ORDER BY sistema";
	$resultado=$mysqli->query($query);

	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['id_sistema']."'>".$row['sistema']."</option>";
	}
	echo $html;
?>
