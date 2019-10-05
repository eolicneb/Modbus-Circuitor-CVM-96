<?
    $con=mysql_connect("localhost","root","L0calmente") or die ("problemas al conectar");
    mysql_select_db("produccion",$con)or die ("problemas al conectar la base de datos");
    $sql = "INSERT INTO t_op  (`Orden de Producción`, `Producto`  , `Cliente`      , `Fecha de despacho`        ,      `Tirada`  ,    `Despacho`   ,   `Observaciones` , `Tipo de acaballado`     , `Formato`,`Versión`)
        values              ('".$_GET[C1]."' , '".$_GET[C2]."', '".$_GET[C3]."', '".$_GET[C4]."', '".$_GET[C5]."', '".$_GET[C6]."', '".$_GET[C7]."', '".$_GET[C8]."', '".$_GET[C9]."', ' ".$_GET[C10]." ' )";

    mysql_query ($sql,$con);
    echo $sql;
  ?>

  <br><em>Orden de Producción: </em>".<?php $_GET[C1];?>
  <br><em>Producto:            </em>".<?php $_GET[C2];?>
  <br><em>Cliente:             </em>".<?php $_GET[C3];?>
  <br><em>Fecha de despacho:   </em>".<?php $_GET[C4];?>
  <br><em>Tirada:              </em>".<?php $_GET[C5];?>
  <br><em>Despacho:            </em>".<?php $_GET[C6];?>
  <br><em>Observaciones:       </em>".<?php $_GET[C7];?>
  <br><em>Tipo de acaballado:  </em>".<?php $_GET[C8];?>
  <br><em>Formato:             </em>".<?php $_GET[C9];?>
  <br><em>Versión:             </em>".<?php $_GET[C10];?>
  <meta http-equiv="refresh" content="1;url=op.php" />
</body>
</html>
