<?php
	// LLamar con post({$nivel: $id_elemento, val: 'valor_nuevo'})

	$nivel = $_POST['nivel'];

	$id = $_POST['id'];

	$valor = $_POST['valor'];

	require ('../conexion_planta.php');

	$queryM = "UPDATE `".$nivel."s` SET `".$nivel."`='".$valor."' WHERE `id_".$nivel."`='".$id."'";
	$resultadoM = $mysqli->query($queryM);

	$html= "Se modifico la tabla $nivel, elemento $id, con el nuevo valor $valor.<br>$queryM";

	echo $html;
?>
