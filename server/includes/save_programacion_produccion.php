
<html>
<?date_default_timezone_set('America/Argentina/Buenos_Aires');?>
<body>
  <?
    $timestamp1 = strtotime($_GET[C3]." ".$_GET[C4].":00");
    $timestamp2 = strtotime($_GET[C5]." ".$_GET[C6].":00");
    $timestamp3 = strtotime($_GET[C7]." ".$_GET[C8].":00");

      $con=mysql_connect("localhost","root","L0calmente") or die ("problemas al conectar");
      mysql_select_db("produccion",$con)or die ("problemas al conectar la base de datos");
      $sql = "INSERT INTO programación  (`op_item`    , `Tipo`        , `Tiempo inicio estimado`, `Tiempo fin estimado`, `Tiempo fin límite`)
          values              ('".$_GET[C1]."' , '".$_GET[C2]."', '".$timestamp1."'        , '".$timestamp2."'    , '".$timestamp3." ' )";

      mysql_query ($sql,$con);
      echo $sql;
    ?>



  <?
    $timestamp1 = strtotime($_GET[C3]." ".$_GET[C4].":00");
    $timestamp2 = strtotime($_GET[C5]." ".$_GET[C6].":00");
    $timestamp3 = strtotime($_GET[C7]." ".$_GET[C8].":00");
  ?>
<br><br><br>
<br><em> OP_item:                </em><?php echo $_GET[C1];?>
<br><em> Tipo:                   </em><?php echo $_GET[C2];?>
<br><em> Fecha inicio estimado:  </em><?php echo $_GET[C3];?>
<br><em> hora inicio estimado:   </em><?php echo $_GET[C4];?>
<br><em> fecha Fin estimado:     </em><?php echo $_GET[C5];?>
<br><em> hora Fin estimado       </em><?php echo $_GET[C6];?>
<br><em> fecha Fin límite        </em><?php echo $_GET[C7];?>
<br><em> fecha Fin límite        </em><?php echo $_GET[C8];?>
<br>
<br><em> timestamp inicio estimado  </em><?php echo $timestamp1;?>
<br><em> timestamp fin estimado     </em><?php echo $timestamp3;?>
<br><em> timestamp fin límite       </em><?php echo $timestamp3;?>
<meta http-equiv="refresh" content="500;url=op.php" />
</body>
</html>
