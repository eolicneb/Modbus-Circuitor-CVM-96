<?php
	// LLamar con post({$nivel: $id_elemento, val: 'valor_nuevo'})

	$nivel = $_POST['nivel'];

	$prev = array('equipo'=>'area',
								'sistema'=>'equipo',
								'elemento'=>'sistema',
								'componente'=>'elemento');

	$id_prev = $_POST['id_previo'];

	$valor = $_POST['valor'];

	require ('../conexion_planta.php');

	$queryM = "INSERT INTO `".$nivel."s` (`".$nivel."`, `id_de_".$prev[$nivel]."`) VALUES ('".$valor."', '".$id_prev."');";
	//$mysqli->query($queryM);
	$queryM .= " SELECT `id_".$nivel."` FROM `".$nivel."s` WHERE `".$nivel."`='".$valor."' AND `id_de_".$prev[$nivel]."`='".$id_prev."';";


	$html= "Se agregó el nuevo valor $valor a la tabla $nivel.s asociado al id $id_prev .<br>$queryM";

	echo "Devolucion de newEntry.php: ".$queryM;
?>
