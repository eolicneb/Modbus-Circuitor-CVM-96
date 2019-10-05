<!doctype html>  <!-- Consumo actual -->

<?php
  date_default_timezone_set('America/Argentina/Buenos_Aires');

  $segundos = 60;   // Refrescar cada 60 segundos

  $soundActivo = true;
  if ($_GET){
    if (array_key_exists("mudo",$_GET)){
      $soundActivo = false;
    }
  }
  function vaMudo($conSonido){
    if ($conSonido) {
      return '';
    }
    else {return '?mudo';}
  }



  // Variable que registra que periodo de tiempo mostrar por defecto
  $periodo='dia';
  $ls_periodos=['semana'=>604800000, 'dia'=>86400000, 'hora'=>3600000];
  /*  Complejo sistema de listas q sirve para asignar la clase 'presado'
      al boton correspondiente al periodo q esta seleccionado, y al ibase_resto
      le asigna la clase 'presione', asi se los puede formatear distinto en el css.
  */
  $ls_class=['semana'=>[1,0,0], 'dia'=>[0,1,0], 'hora'=>[0,0,1]];
  $ref_class=['presione', 'presado'];
  $menos_periodo=['semana'=>'dia', 'dia'=>'hora', 'hora'=>'hora'];

  // $mensaje='6';
  if ($_GET){
    if (array_key_exists("periodo", $_GET)){
      if (array_key_exists($_GET["periodo"],$ls_periodos)){
        $periodo = $_GET["periodo"];
      // $mensaje=$ls_periodos[$periodo];
      }
    }
  }
  $class=$ls_class[$periodo];

  /*  Definicion de funciones para interactuar con la base de datos  */
  /*Conectar a la base de datos*/
  function conectarBD(){
      require 'includes/conn.php';
      $BD = "z";
      //variable que guarda la conexi�n de la base de datos
      $conexion = mysqli_connect($server, $usuario, $pass, $BD);
      //Comprobamos si la conexi�n ha tenido exito
      if(!$conexion){
         echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
      }
      //devolvemos el objeto de conexi�n para usarlo en las consultas
      return $conexion;
  }

  /*Desconectar la conexion a la base de datos*/
  function desconectarBD($conexion){
      //Cierra la conexi�n y guarda el estado de la operaci�n en una variable
      $close = mysqli_close($conexion);
      //Comprobamos si se ha cerrado la conexi�n correctamente
      if(!$close){
         echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
      }
      //devuelve el estado del cierre de conexi�n
      return $close;
  }

  //Devuelve un array multidimensional con el resultado de la consulta
  function getArraySQL($sql){
      //Creamos la conexi�n
      $conexion = conectarBD();
      //generamos la consulta
      if(!$result = mysqli_query($conexion, $sql)) die();

      $rawdata = array();
      //guardamos en un array multidimensional todos los datos de la consulta
      $i=0;
      while($row = mysqli_fetch_array($result))
      {
          //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
          $rawdata[$i] = $row;
          $i++;
      }

      //Cerramos la base de datos
      desconectarBD($conexion);
      //devolvemos rawdata
      return $rawdata;
  }

  //Acciones para cuando es preciso dar colAlarma
  function darAlarma(){
      mandarMail("Mail de\nprueba\n\nLa potencia es ".$pot, "Prueba mail php", "eoneb@hotmail.com");
  }

  // Esta funcion preciso de una cuenta autorizada de ISP para funcionar.
  /*Enviar mail:
      $msj: Texto para el cuerpo del mail. Cada linea separada con '\n'
      $titulo: Titulo del mail
      $destinatario: alguien@donde.com
  */
  function mandarMail($msj, $titulo, $destino){
      // use wordwrap() if lines are longer than 70 characters
      $msj = wordwrap($msj,70);
      $headers = "From: webmaster@example.com";
      // send email
      mail($destino,$titulo,$msj,$headers);
  }

  // La ultima fila registrada en la base de datos se usa
  // para mostrar los datos actuales de tiempo y potencia
  $res = getArraySQL('SELECT `time`, `potencia` FROM `potencia registrada`  ORDER BY `time` DESC LIMIT 1');
  $pot= $res[0]['potencia']/1000;
  /*$pot= 750;*/
  $unixtime =$res[0]['time']/1000;


  if ($pot > 650 ) {
    $segundos = 187;   // Refrescar cada 187 segundos el tiempo que funciona la alarma

    echo " <audio src='archivos/alert.mp3' autoplay> </audio>";
  }

  /* Si la variable 'test' aparece en $_GET el refresco
     se hace cada segund en vez de cada 20 segundos.    */
  if ($_GET){
    if (array_key_exists('test', $_GET)){
      $segundos = 1;
    }
  }
  header("Refresh:".$segundos);





  if ($_GET){
    if (array_key_exists('test', $_GET)){
      $pot=400+(time()%30)*15;
    }
      if (array_key_exists('alarma', $_GET)){
        darAlarma();
      }
  }

  // Valores para la ubicacion del degrade de advertencia
  $d=array();
  for ($i=0; $i<4; $i++){
    $d[$i]=800-$pot-100*$i;
  }

  $date = date(DATE_RFC2822);
  $newDate = date("D, d M Y".(" 00:00:00")." O");

  $valorInicial = $unixtime*1000;//-$ls_periodos[$periodo];
  $conta = $valorInicial;
  if ($_GET){
    if (array_key_exists("conta", $_GET)){
        $conta = $_GET["conta"];
        if ($conta > $valorInicial) {$conta = $valorInicial;}
    }
  }
  /* Cuando se piden datos a SQL se piden los que tienen tiempos
      entre $tiempo1 y $tiempo2 de forma que empiezen en $conta y
      abarquen el periodo de segundos dado por $ls_periodos[$periodo] */
  $tiempo1=$conta-$ls_periodos[$periodo];
  $tiempo2=$conta+ 16 * 60 *1000;
  //Sentencia SQL
  $sql = "SELECT `time`, `potencia`, `contratada` from `potencia registrada` WHERE time > ".$tiempo1." and time <= ".$tiempo2.";";
  //Array Multidimensional
  $rawdata = getArraySQL($sql);

?>

			<a name="TOP"></a>
      <script src="js/jquery.js"></script>
      <script src="js/highstock.js"></script>
      <br><br>
      <script src="js/exporting.js"></script>
      <!-- Este es el fondo en degrade que se actualiza segun el valor de la potencia -->
      <div id="zero" class="hoja" style= <?php echo '"background: linear-gradient(195deg, rgb(107,170,34) '.$d[3].'%, rgb(255,164,1) '.$d[2].'%, rgb(234,53,34) '.$d[1].'%, rgb(100,10,5) '.$d[0].'%);"';//'"background-color:green"'; ?> >
        <div class="info">
          <div class="cabecera">
              <div class="c1">
                  <p2>Potencia a las <?php echo date("H:i:s",$unixtime);?></p2>
                  <p1><?php echo round($pot,1);?> kW</p1>
              </div>
          </div>
          <div class="dataspace">
              <!-- En este div se inserta el grafico de los datos de $rowdata -->
              <div id="container" class="graf"></div>
          </div>
          <!--Botonera ubicada bajo el grafico para navegar los datos -->
          <div class="botonera">

              <form action="<?=$_SERVER["PHP_SELF"].'?periodo='.$periodo.'&conta='.($conta - $ls_periodos[$periodo]).vaMudo($soundActivo)?>" method="post" class="botonI">
                  <input type="submit" value=<?php echo $periodo.'_anterior'; ?> class="presione">
              </form>

              <div class='spacer'></div>

              <form action="<?=$_SERVER["PHP_SELF"].'?periodo=semana&conta='.$conta.vaMudo($soundActivo)?>" method="post" class="periodo">
                  <input type="submit" value="semana" class=<?=$ref_class[$class[0]];?>>
              </form>

              <form action="<?=$_SERVER["PHP_SELF"].'?periodo=dia&conta='.$conta.vaMudo($soundActivo)?>" method="post" class="periodo">
                  <input type="submit" value="dia" class=<?=$ref_class[$class[1]];?>>
              </form>

              <form action="<?=$_SERVER["PHP_SELF"].'?periodo=hora&conta='.$conta.vaMudo($soundActivo)?>" method="post" class="periodo">
                  <input type="submit" value="hora" class=<?=$ref_class[$class[2]];?>>
              </form>

              <div class='spacer'></div>

              <form  action="<?=$_SERVER["PHP_SELF"].'?periodo='.$periodo.'&conta='.($conta + $ls_periodos[$periodo]).vaMudo($soundActivo)?>" method="post" class="botonD">
                  <input type="submit" value=<?php echo $periodo.'_siguiente'; ?> class="presione">
              </form>

              <form  action="<?=$_SERVER["PHP_SELF"].'?periodo='.$periodo.vaMudo($soundActivo)?>" method="post" class="fin">
                  <input type="submit" value='>|' class="presione">
              </form>

          </div>
          <div  style="text-align:right; margin: 5px">
            <a href="/phpMyAdmin/">Visit the AppServ Open Project<br><br></a>
          </div>

        </div>
        <!-- En este contenedor se enciende el gif de advertencia cuando la potencia supera los 650 kW -->
        <div class='fire' style = <?php   if ($pot>=650) {echo '"background-image: url(\'imagenes/fuego.gif\')";';}   ?> >  </div>
        <!-- Boton test -->
        <?php $t='?test'; if ($_GET){ if(array_key_exists('test',$_GET)){$t='';}} ?>
        <form class='test' action='<?=$_SERVER[PHP_SELF].$t.vaMudo($soundActivo); ?>' method='post'>
                <input type='submit' value=''>
              </form>
      </div>
      <!-- Todo el script siguient se encarga de tomar los datos de la lista $rawdata
      y dibujar la grafica que va insertada en el div id="container"            -->
      <script type='text/javascript'>

        var doubleClicker = {
          clickedOnce: false,
          timer: null,
          timeBetweenClicks: 400
        };

        var resetDoubleClick = function() {
          clearTimeout(doubleClicker.timer);
          doubleClicker.timer = null;
          doubleClicker.clickedOnce = false;
        };

        var zoomIn = function(event) {
          var tiempo = Highcharts.numberFormat(event.xAxis[0].value+<?= $ls_periodos[$menos_periodo[$periodo]]/2 ?>);
          window.open("<?=$_SERVER["PHP_SELF"].'?periodo='.$menos_periodo[$periodo].'&conta='?>"+tiempo+"<?= vaMudo($soundActivo)?>","_self")
        };

        var ondbclick = function(event) {
          if (doubleClicker.clickedOnce === true && doubleClicker.timer) {
            resetDoubleClick();
            zoomIn(event);
          } else {
            doubleClicker.clickedOnce = true;
            doubleClicker.timer = setTimeout(function(){
              resetDoubleClick();
            }, doubleClicker.timeBetweenClicks);
          }
        };

        $(function () {
            Highcharts.setOptions({
                global: {
                    useUTC: false
                },
                lang: {
                  thousandsSep: "",
                  months: [
                      'Enero', 'Febrero', 'Marzo', 'Abril',
                      'Mayo', 'Junio', 'Julio', 'Agosto',
                      'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                  ],
                  weekdays: [
                      'Domingo', 'Lunes', 'Martes', 'Miercoles',
                      'Jueves', 'Viernes', 'Sabado'
                  ]
                }
            });

            var chart;
            $('#container').highcharts({
                chart: {
                    type: 'spline',
                    animation: false, //Highcharts.svg, // don't animate in old IE
                    marginRight: 10,
                    events: {
                        load: function() {

                        },
                        click: function(event) {
                          ondbclick (event);
                        }
                    }
                },
                title: {
                    text: (function() {
                       return '<?php echo strftime("%A, %d %B %Y - %H:%M:%S", $conta/1000); ?>';
                    })(),
                    events: {
                        load: function() {

                        },
                        click: function(event) {
                          ondbclick (event);
                        }

                    }
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 1
                },
                yAxis: {
                    title: {
                        text: '[KiloWatts]'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            Highcharts.dateFormat('%d-%m-%Y %H:%M:%S', this.x) +'<br/>'+
                            Highcharts.numberFormat(this.y, 1)+' kW';
                    }
                },
                legend: {
                    enabled: true
                },
                exporting: {
                    enabled: true
                },
                series: [

                  {
                    name: 'Potencia Adquirida instantánea',
                    animation: false,
                    data: (function() {
                       var data = [];
                        <?php for($i = 7 ;$i  <count($rawdata);$i++)
                        { echo "data.push([ ".$rawdata[$i]["time"].",".$rawdata[$i]["potencia"]/1000 ."]);"; } ?>
                    return data;
                    })()
                },



                {
                    name: 'Potencia contratada',
                    animation: false,
                         data: (function() {
                            var data = [];
                        <?php
                            for($i = 7 ;$i  <count($rawdata)-7 ;$i++ ){
                        ?>
                        data.push([<?php echo $rawdata[$i]["time"];?>,<?php echo $rawdata[$i]["contratada"]/1000;?>]);
                        <?php } ?>
                    return data;
                         })()
                },





                {
                  name: 'Potencia Adquirida promediada',
                  animation: false,
                  data: (function() {
                     var data = [];
                     <?php

                         for($i = 7 ;$i<count($rawdata)-7;$i++)
                         { $p0 = $rawdata[$i-7]["potencia"]/1000;
                           $p1 = $rawdata[$i-6]["potencia"]/1000;
                           $p2 = $rawdata[$i-5]["potencia"]/1000;
                           $p3 = $rawdata[$i-4]["potencia"]/1000;
                           $p4 = $rawdata[$i-3]["potencia"]/1000;
                           $p5 = $rawdata[$i-2]["potencia"]/1000;
                           $p6 = $rawdata[$i-1]["potencia"]/1000;
                           $p7 = $rawdata[$i]["potencia"]/1000;
                           $p8 = $rawdata[$i+1]["potencia"]/1000;
                           $p9 = $rawdata[$i+2]["potencia"]/1000;
                           $p10 = $rawdata[$i+3]["potencia"]/1000;
                           $p11 = $rawdata[$i+4]["potencia"]/1000;
                           $p12 = $rawdata[$i+5]["potencia"]/1000;
                           $p13 = $rawdata[$i+6]["potencia"]/1000;
                           $p14 = $rawdata[$i+7]["potencia"]/1000;
                           $pp = $p0 + $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12 + $p13 + $p14;
                           $pp = $pp/15;

                           echo "data.push([".$rawdata[$i]["time"].",".$pp;?>]);
                           <?php } ?>

                  return data;
                  })()
                },






              ]
            });
        });
      </script>
    </div>
