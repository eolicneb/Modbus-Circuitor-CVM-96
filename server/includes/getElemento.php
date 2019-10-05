<?php
	require ('../conexion.php');

	$id_sistema = $_POST['id_sistema'];

	$query3 = "SELECT id_elemento, elemento FROM t_elemento WHERE id_sistema = '$id_sistema' ORDER BY elemento";
	$resultado3=$mysqli->query($query3);

	while($row3 = $resultado3->fetch_assoc())
	{
		$html.= "<option value='".$row3['id_elemento']."'>".$row3['elemento']."</option>";
	}
	echo $html;
?>
