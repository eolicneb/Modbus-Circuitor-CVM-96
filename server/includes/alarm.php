

<?php

function conectarBD_alarm(){
    require 'conn.php';
    $BD_alarm = "z";
    //variable que guarda la conexi�n de la base de datos
    $conexion_alarm = mysqli_connect($server, $usuario, $pass, $BD_alarm);

    //Comprobamos si la conexi�n ha tenido exito
    if(!$conexion_alarm){
       echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
    }
    //devolvemos el objeto de conexi�n para usarlo en las consultas
    return $conexion_alarm;
}

/*Desconectar la conexion a la base de datos*/
function desconectarBD_alarm($conexion_alarm){
    //Cierra la conexi�n y guarda el estado de la operaci�n en una variable
    $close_alarm = mysqli_close($conexion_alarm);
    //Comprobamos si se ha cerrado la conexi�n correctamente
    if(!$close_alarm){
       echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
    }
    //devuelve el estado del cierre de conexi�n
    return $close_alarm;
}



function getArraySQL_alarm($sql_alarm){
    //Creamos la conexi�n
    $conexion_alarm = conectarBD_alarm();
    //generamos la consulta
    if(!$res_alarmult_alarm = mysqli_query($conexion_alarm, $sql_alarm)) die();

    $rawdata_alarm = array();
    //guardamos en un array multidimensional todos los datos de la consulta
    $i_alarm=0;
    while($row_alarm = mysqli_fetch_array($res_alarmult_alarm))
    {
        //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
        $rawdata_alarm[$i_alarm] = $row_alarm;
        $i_alarm++;
    }

    //Cerramos la base de datos
    desconectarBD_alarm($conexion_alarm);
    //devolvemos rawdata
    return $rawdata_alarm;
}

$res_alarm = getArraySQL_alarm('SELECT `time`, `potencia` FROM `potencia registrada`  ORDER BY `time` DESC LIMIT 1');
$pot= $res_alarm[0]['potencia']/1000;

$segundos = 60;
if ($pot > 650 ) {
  $segundos = 187;   // Refrescar cada 187 segundos el tiempo que funciona la alarma

  echo " <audio src='/z/includes/alert.mp3' autoplay> </audio>";


}
header("Refresh:".$segundos);

?>
