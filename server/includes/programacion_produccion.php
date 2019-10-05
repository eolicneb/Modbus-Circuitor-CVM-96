
<?php
  session_start();
  date_default_timezone_set('America/Argentina/Buenos_Aires');


?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Mtto Madygraf</title>
    <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

<form action="includes/save_programacion_produccion.php" method="GET">
  <br>
  <table>
    <tr>
      <td> OP_item: </td>
      <td><input type="text" name="C1" required readonly value="<?echo $_GET[OP_item_prog];?>" style="width: 150px"> </td>
    </tr>
    <tr>
      <td> Tipo: </td>
      <td>
      <select name="C2" required style="width: 155px">
            <option value null > ->seleccione opcion<- </option>
            <option value="completo" > completo </option>
            <option value="reimpresión" > reimpresión </option>
            <option value="final" > final </option>
            <option value="parcial 1" > parcial 1 </option>
            <option value="parcial 2" > parcial 2 </option>
            <option value="parcial 3" > parcial 3 </option>
            <option value="parcial 4" > parcial 4 </option>
            <option value="parcial 5" > parcial 5 </option>
            <option value="parcial 6" > parcial 6 </option>
            <option value="parcial 7" > parcial 7 </option>
      </select>
      <td>
    </tr>
    <tr>
      <td> <hr> </td>
      <td> <hr> </td>
      <td> <hr> </td>
    </tr>
    <tr>
      <td> Fecha y hora inicio estimado: </td>
      <td><input type="date" name="C3" required style="width: 150px"> </td>
      <td><input type="time" name="C4" required style="width: 150px"> </td>
    </tr>
    <tr>
      <td> <hr> </td>
      <td> <hr> </td>
      <td> <hr> </td>
    </tr>
    <tr>
      <td> fecha y hora fin estimado: </td>
      <td><input type="date" name="C5" required style="width: 150px"> </td>
      <td><input type="time" name="C6" required style="width: 150px"> </td>
    </tr>
    <tr>
      <td> <hr> </td>
      <td> <hr> </td>
      <td> <hr> </td>
    </tr>

    <tr>
      <td> fecha y hora Fin límite: </td>
      <td><input type="date" name="C7" required style="width: 150px"> </td>
      <td><input type="time" name="C8" required style="width: 150px"> </td>
            <td> Tiempo máximo de entrega hacia encuadernacion </td>
    </tr>
  </table>
  <?php
    /*require 'header.php';*/
    if ($_GET[OP_item_prog] == null) {echo "<meta http-equiv='refresh' content='5;URL=/z/OP.php' />";}
  ?>
  <br>
  <input type="submit" name="enviar" value="Guardar" />
</form>

</body>
</html>
