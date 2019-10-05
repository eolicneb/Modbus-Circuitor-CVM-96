
<?php
  session_start();
  date_default_timezone_set('America/Argentina/Buenos_Aires');

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
    <h1>Ingreso de datos</h1>

    <form action="includes/save_preimpresion.php" method="GET">
      <br>
      <table>
        <tr>
          <td> Fecha: </td>
          <td> <input type="date" name="C1" required style="width: 200px"> </td>
        </tr>
        <tr>
          <td> Turno: </td>
          <td> <select name="C2"  required  style="width: 200px">
            <option value null > -->Selecione opcion<-- </option>
            <option value="Mañana" > Mañana </option>
            <option value="Tarde" > Tarde </option>
            <option value="Noche" > Noche </option>
          </td>
        </tr>
        <tr>
          <td>Operador</td>
           <td><input type="text"  style="width: 200px" placeholder="POR FAVOR LOGEARSE" readonly  name="C3" value="<? echo  $_SESSION['name'] ?>"></td>
        </tr>

        <tr>
          <td> Producto: </td>
          <td> <input type="text" name="C4" placeholder="Ej: Paparazzi 904" required style="width: 200px"> </td>
        </tr>
        <tr>
          <td> OP: </td>
          <td> <input type="number" name="C5" placeholder="Ej: 1578" required style="width: 200px"> </td>
        </tr>
        <tr>
          <td> Identificación: </td>
          <td><select name="C6" required style="width: 200px">
                <option value null > -> selecione una opción -< </option>
                <option value="Folleto" > Folleto </option>
                <option value="Tapa" > Tapa </option>
                <option value="Pliego 1" > Pliego 1 </option>
                <option value="Pliego 2" > Pliego 2 </option>
                <option value="Pliego 3" > Pliego 3 </option>
                <option value="Pliego 4" > Pliego 4 </option>
                <option value="Pliego 5" > Pliego 5 </option>
                <option value="Pliego 6" > Pliego 6 </option>
                <option value="Pliego 7" > Pliego 7 </option>
                <option value="Pliego 8" > Pliego 8 </option>
                <option value="Pliego 9" > Pliego 9 </option>
                <option value="Pliego 10" > Pliego 10 </option>
                <option value="Pliego 11" > Pliego 11 </option>
                <option value="Pliego 12" > Pliego 12 </option>
                <option value="Pliego 13" > Pliego 13 </option>
                <option value="Pliego 14" > Pliego 14 </option>

          </select></td>
        </tr>
        <tr>
          <td> Forma: </td>
          <td> <input type="text" name="C7" placeholder="Ej: A B C D" required style="width: 200px"> </td>
        </tr>
        <tr>
          <td> Máquina: </td>
          <td> <select name="C8"  required  style="width: 200px">
            <option value null > -->selecione opcion<-- </option>
            <option value="M1000"   > M1000  </option>
            <option value="M300-1"  > M300-1 </option>
            <option value="Ryobi"   > Ryobi  </option>
            <option value="M300-2"  > M300-2 </option>
          </td>
        </tr>
        <tr>
          <td> Repeticiones: </td>
          <td> <input type="number" name="C9" placeholder="Ej: 1" required style="width: 200px"> </td>
        </tr>
        <tr>
          <td> Causa: </td>
          <td colspan="2"><textarea rows="7" placeholder="Ej: Corte de plancha; Desgaste" required cols="22" name="C10" ></textarea></td>
        </tr>
      </table>
      <br>
      <?php
        require 'includes/header.php';
      ?>
      <input type="submit" value="guardar">
    </form>

  </body>
</html>
