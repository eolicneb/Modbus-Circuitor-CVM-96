<?
  $con=mysql_connect("localhost","root","L0calmente") or die ("problemas al conectar");
  mysql_select_db("produccion",$con)or die ("problemas al conectar la base de datos");
  $sql = "INSERT INTO t_op_item (`OP`       , `Máquina` , `Identificación` , `Tipo de montaje` ,      `Páginas` ,    `Colores`   ,   `Ejemplares` , `Colores especiales`, `Bandas`       ,`Tipo Papel`        , `Densidad`      , `Ancho`         , `Propietario`   , `Formato de corte`, `Código Papel`  , `Consumo en Kgs`, `Tiros (hojas)` , `Tiraje para terminación`, `Pérdidas en partida`, `Pérdidas en el tiraje`, `Pérdidas en el Escarpe`, `Total de tiros` ) values ('".$_GET[C0]."' , '".$_GET[C1]."'     , '".$_GET[C3]."'  , '".$_GET[C4]."'   , '".$_GET[C5]."', '".$_GET[C6]."', '".$_GET[C7]."', '".$_GET[C8]."'     , '".$_GET[C9]."', ' ".$_GET[C10]." ' , '".$_GET[C11]."', '".$_GET[C12]."', '".$_GET[C13]."', '".$_GET[C14]."'  , '".$_GET[C15]."', '".$_GET[C16]."', '".$_GET[C17]."', '".$_GET[C18]."'         , '".$_GET[C19]."'     , '".$_GET[C20]."'       , '".$_GET[C21]."'        , '".$_GET[C22]."')"
  ;

  mysql_query ($sql,$con);
  echo $sql;
?>

<body>
<br><em>OP                      </em>".<?php $_GET[C0];?>
<br><em>Máquina                 </em>".<?php $_GET[C1];?>
<br><em>Identificación          </em>".<?php $_GET[C3];?>
<br><em>Tipo de montaje         </em>".<?php $_GET[C4];?>
<br><em>Páginas                 </em>".<?php $_GET[C5];?>
<br><em>Colores                 </em>".<?php $_GET[C6];?>
<br><em>Ejemplares              </em>".<?php $_GET[C7];?>
<br><em>Colores especiales      </em>".<?php $_GET[C8];?>
<br><em>Bandas                  </em>".<?php $_GET[C9];?>
<br><em>Tipo Papel              </em>".<?php $_GET[C10];?>
<br><em>Densidad                </em>".<?php $_GET[C11];?>
<br><em>Ancho                   </em>".<?php $_GET[C12];?>
<br><em>Propietario             </em>".<?php $_GET[C13];?>
<br><em>Formato de corte        </em>".<?php $_GET[C14];?>
<br><em>Código Papel            </em>".<?php $_GET[C15];?>
<br><em>Consumo en Kgs          </em>".<?php $_GET[C16];?>
<br><em>Tiros (hojas)           </em>".<?php $_GET[C17];?>
<br><em>Tiraje para terminación </em>".<?php $_GET[C18];?>
<br><em>Pérdidas en partida     </em>".<?php $_GET[C19];?>
<br><em>Pérdidas en el tiraje   </em>".<?php $_GET[C20];?>
<br><em>Pérdidas en el Escarpe  </em>".<?php $_GET[C21];?>
<br><em>Total de tiros          </em>".<?php $_GET[C22];?>





<meta http-equiv="refresh" content="1;url=op.php" />
</body>
</html>
