
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/index.css">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	  <link rel="icon" href="/imagenes/favicon.ico" type="image/x-icon">

	</head>
  <body>
    <?
      if ( $_GET[SGEn]==false){
            echo "<div class='topnav'><ul><li><a href='?SGEn=true' > Plan eficiencia energética</a></li></ul></div>";}
    ?>
    <div class="content">
    <div class="topnav">
      <ul>
        <li><a class="active" href="index.php">Energía</a></li>
        <li><a href="gmao.php">Mantenimiento</a></li>
				<li><a href="OP.php">Producción</a></li>
        <li><a href="/wordpress/" target="_blank">Wordpress</a></li>
      </ul>
    </div>
  </div>
      <?
        if ( $_GET[SGEn]==true){
          require 'SGEn.php';
          exit;
        }
        require 'consumo.php';
    ?>


    <br>
  </body>
</html>
<?php echo '<TITLE>Pot: '.round($pot,1).' kW</TITLE>' ?>
