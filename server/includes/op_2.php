    <?require 'navegador.php';?>
    <br>
    <h1>Ingresar Ítem OP</h1>
    <br>
      <form action="guardar_op.php" method="get">
        <table>
          <tr>
            <td>N° OP </td>
            <td><input type="number" name="C0" placeholder="Ej: 1568" required style="width: 220px"></td>
          </tr>
          <tr>
            <td>Máquina</td>
            <td><select name="C1" required style="width: 220px">
                  <option value null > selecione una opción </option>
                  <option value="M1000" > M1000 </option>
                  <option value="M300-1" > M300-1 </option>
                  <option value="M300-2" > M300-2 </option>
                  <option value="Ryobi" > Ryobi </option>
                  <option value="M1000 o M300-1" > M1000 o M300-1 </option>
            </select></td>
          </tr>
          <!--<tr>
            <td>Fecha de despacho</td>
            <td><input type="date" name="C2" required style="width: 220px"></td>
          </tr>-->
          <tr>
            <td>Identificación</td>
            <td><select name="C3" required style="width: 220px">
                  <option value null > -> selecione una opción -< </option>
                  <option value="Folleto"   > Folleto </option>
                  <option value="Tapa"      > Tapa </option>
                  <option value="Lámina"    > Lámina </option>
                  <option value="Pliego 1"  > Pliego 1 </option>
                  <option value="Pliego 2"  > Pliego 2 </option>
                  <option value="Pliego 3"  > Pliego 3 </option>
                  <option value="Pliego 4"  > Pliego 4 </option>
                  <option value="Pliego 5"  > Pliego 5 </option>
                  <option value="Pliego 6"  > Pliego 6 </option>
                  <option value="Pliego 7"  > Pliego 7 </option>
                  <option value="Pliego 8"  > Pliego 8 </option>
                  <option value="Pliego 9"  > Pliego 9 </option>
                  <option value="Pliego 10" > Pliego 10 </option>
                  <option value="Pliego 11" > Pliego 11 </option>
                  <option value="Pliego 12" > Pliego 12 </option>
                  <option value="Pliego 13" > Pliego 13 </option>
                  <option value="Pliego 14" > Pliego 14 </option>

            </select></td>
          </tr>
          <tr>
            <td>Tipo de montaje</td>
            <td><select name="C4" required style="width: 220px">
                  <option value null > selecione una opción </option>
                  <option value="Shetter"   > Shetter   </option>
                  <option value="Chopper"   > Chopper   </option>
                  <option value="T/R Aparte"> T/R Aparte   </option>
                  <option value="Tabloide"  > Tabloide  </option>
                  <option value="Delta"     > Delta     </option>
                  <option value="Paralelo"  > Paralelo  </option>
            </select></td>
          </tr>
          <tr>
            <td>Páginas</td>
            <td><select name="C5" required style="width: 220px">
                  <option value null > selecione una opción </option>
                  <option value="4" > 4 </option>
                  <option value="8" > 8 </option>
                  <option value="16" > 16 </option>
                  <option value="32" > 32 </option>

            </select></td>
          </tr>
          <tr>
            <td>Colores</td>
            <td><select name="C6" required style="width: 220px">
                  <option value="4" > 4/4 </option>
                  <option value="1" > 1/4 </option>
                  <option value="2" > 2/4 </option>
                  <option value="3" > 3/4 </option>
            </select></td>
          </tr>
          <tr>
            <td>Ejemplares</td>
            <td><select name="C7" required style="width: 220px">
                  <option value="1" > 1 </option>
                  <option value="4" > 4 </option>
            </select></td>
          </tr>
          <tr>
            <td>Bandas</td>
            <td><select name="C9" required style="width: 220px">
                  <option value="1" > 1 </option>
                  <option value="2" > 2 </option>
            </select></td>
          </tr>
          <tr>
            <td>Colores especiales</td>
            <td><input type="text" name="C8"  < style="width: 220px"></td>
          </tr>
          <tr><td><hr></td><td><hr></td></tr>
          <tr>
            <td>Tipo Papel</td>
            <td><select name="C10" required style="width: 220px">
                  <option value null > Seleccione opcion </option>
                  <option value="Couche" > Couche </option>
                  <option value="LWC" > LWC </option>
                  <option value="SCA" > SCA </option>
            </select></td>
          </tr>
          <tr>
            <td>Densidad</td>
            <td><input type="text" name="C11" required placeholder="Ej: 59.2" style="width: 220px"></td>
          </tr>
          <tr>
            <td>Ancho</td>
            <td><input type="text" name="C12" required placeholder="Ej: 86" style="width: 220px"></td>
          </tr>
          <tr>
            <td>Propietario</td>
            <td><input type="text" name="C13" required placeholder="Ej: Ed. Atlantida"  style="width: 220px"></td>
          </tr>
          <tr>
            <td>Formato de corte</td>
            <td><input type="text" name="C14" required placeholder="Ej: 890 x 578"  style="width: 220px"></td>
          </tr>
          <tr>
            <td>Código Papel</td>
            <td><input type="text" name="C15"   placeholder="Ej: 4521" style="width: 220px"></td>
          </tr>
          <tr>
            <td>Consumo en Kgs</td>
            <td><input type="text" name="C16" required placeholder="Ej: 2841 kg" style="width: 220px"></td>
          </tr>
                    <tr><td><hr></td><td><hr></td></tr>
          <tr>
            <td>Tiros (hojas)</td>
            <td><input type="text" name="C17" required placeholder="Ej: 42000" style="width: 220px"></td>
          </tr>
          <tr>
            <td>Tiraje para terminación</td>
            <td><input type="text" name="C18" required placeholder="Ej: 43260"  style="width: 220px"></td>
          </tr>
          <tr>
            <td>Pérdidas en partida</td>
            <td><input type="text" name="C19" required  placeholder="Ej: 4000"  style="width: 220px"></td>
          </tr>
          <tr>
            <td>Pérdidas en el tiraje</td>
            <td><input type="text" name="C20" required  placeholder="Ej: 3360"  style="width: 220px"></td>
          </tr>
          <tr>
            <td>Pérdidas en el Escarpe</td>
            <td><input type="text" name="C21" placeholder="Ej: 200" style="width: 220px"></td>
            <td> (o doblado) </td>
          </tr>
          <tr>
            <td>Total de tiros</td>
            <td><input type="text" name="C22" required  placeholder="Ej: 50620"  style="width: 220px"></td>
          </tr>


        </table>
      <br>
      <input type="submit" name="save" value="Ingresar Item OP">
    </form>
