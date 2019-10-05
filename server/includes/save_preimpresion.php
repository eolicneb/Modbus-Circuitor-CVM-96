<?
    $con=mysql_connect("localhost","root","L0calmente") or die ("problemas al conectar");
    mysql_select_db("produccion",$con)or die ("problemas al conectar la base de datos");
    $sql = "INSERT INTO preimpresion  (`Fecha`, `Turno`        , `Operador`      , `Producto`     , `OP`          ,    `Identificación` ,   `Forma`       , `Máquina`      , `Repeticiones` ,`Causa`)
        values               ('".$_GET[C1]."' , '".$_GET[C2]."', '".$_GET[C3]."', '".$_GET[C4]."', '".$_GET[C5]."', '".$_GET[C6]."'     , '".$_GET[C7]."' , '".$_GET[C8]."', '".$_GET[C9]."', ' ".$_GET[C10]." ' )";

    mysql_query ($sql,$con);
    echo $sql;
  ?>

  <br><em>Fecha           : </em>"<?php echo $_GET[C1];?>
  <br><em>Turno           : </em>"<?php echo $_GET[C2];?>
  <br><em>Operador        : </em>"<?php echo $_GET[C3];?>
  <br><em>Producto        : </em>"<?php echo $_GET[C4];?>
  <br><em>OP              : </em>"<?php echo $_GET[C5];?>
  <br><em>Identificación  : </em>"<?php echo $_GET[C6];?>
  <br><em>Forma           : </em>"<?php echo $_GET[C7];?>
  <br><em>Máquina         : </em>"<?php echo $_GET[C8];?>
  <br><em>Repeticiones    : </em>"<?php echo $_GET[C9];?>
  <br><em>Causa           : </em>"<?php echo $_GET[C10];?>
  <meta http-equiv="refresh" content="1;url=/z/op.php?VerPreimpresion=true" />
</body>
</html>
