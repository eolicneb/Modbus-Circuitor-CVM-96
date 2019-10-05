
<?php
  session_start();
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  function displayTableElec($sql){
     //Creamos la conexión
     $server = "localhost";
     $usuario = "root";
     $pass = "L0calmente";
     $BD = "produccion";
     $conexion = mysqli_connect($server,$usuario,$pass,$BD);
     $sql = "SELECT * FROM `preimpresion`";

     //generamos la consulta
     if(!$result = mysqli_query($conexion, $sql)) die();

     $rawdata = array();
     //guardamos en un array multidimensional todos los datos de la consulta
     $i=0;

     while($row = mysqli_fetch_array($result))
     {
         $rawdata[$i] = $row;
         $i++;
     }

     $close = mysqli_close($conexion);

     //DIBUJAMOS LA TABLA

     echo '<table class="w3-table-all w3-hoverable">';
     $columnas = count($rawdata[0])/2;
     //echo $columnas;
     $filas = count($rawdata);
     //echo "<br>".$filas."<br>";

     //Añadimos los titulos

     for($i=1;$i<count($rawdata[0]);$i=$i+2){
        next($rawdata[0]);
        echo "<th><b>".key($rawdata[0])."</b></th>";
        next($rawdata[0]);
     }

     for($i=0;$i<$filas;$i++){

        echo "<tr>";
        for($j=0;$j<$columnas;$j++){
           echo "<td>".$rawdata[$i][$j]."</td>";

        }
        echo "</tr>";
     }

     echo '</table>';

  }



  ?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Preimpresión Madygraf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/z/imagenes/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/z/imagenes/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <h1>Ver datos de preimpresion</h1>



 <?php displayTableElec($sql); ?>


  </body>
</html>
