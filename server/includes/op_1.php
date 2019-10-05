
      <br>
      <h1>Ingresar OP</h1>
      <br>
      <form action="guardar_op.php" method="get">
        <table>
          <tr>
            <td>Orden de Producción</td>
            <td><input type="number" name="C1" placeholder="Ej: 1568" style="width: 180px"></td>
          </tr>
          <tr>
            <td>Producto</td>
            <td><input type="text" name="C2" placeholder="Ej: Paparazzi N°903" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Cliente</td>
            <td><input type="text" name="C3" placeholder="Ej: Editorial Atlantida" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Fecha de despacho</td>
            <td><input type="date" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Tirada</td>
            <td><input type="number" name="C5" placeholder="Ej: 42000" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Despacho</td>
            <td><input type="text" name="C6" required placeholder="Ej: Paquetes Sunchados x 50" style="width: 180px"></td>
          </tr>
          <tr>
            <td>Observaciones</td>
            <td > <textarea rows="4" required="" cols="50" name="C7" placeholder="Ej: Despacho 25% antes de las 10:00hs; 70% antes de las 12:00 y resto antes de las 15:00hs" style="width: 180px" ></textarea></td>
          </tr>
          <tr>
            <td>Tipo de acaballado</td>
            <td><input type="text" name="C8" required placeholder="Ej: Acaballado" style="width: 180px"></td>
          </tr>
          <tr>
            <td>Formato</td>
            <td><input type="text" name="C9" required placeholder="Ej: 20.0 x 27.5" style="width: 180px"></td>
          </tr>
          <tr>
            <td>Versión</td>
            <td><input type="text" name="C10" required value="1" readonly style="width: 180px"></td>
          </tr>

          </table>
          <br>
          <input type="submit" name="save" value="Ingresar OP">
          </form>


<!--      <br>
      <h1>Ingresar OP</h1>
      <br>
      <form action="guardar_op.php" method="get">
        <table>
          <tr>
            <td>Máquina</td>
            <td><select name="C5" required style="width: 180px">
                  <option value null > selecione una opción </option>
                  <option value="M1000" > M1000 </option>
                  <option value="M300-1" > M300-1 </option>
                  <option value="M300-2" > M300-2 </option>
                  <option value="Ryobi" > Ryobi </option>
            </select></td>
          </tr>
          <tr>
            <td>Fecha de despacho</td>
            <td><input type="date" name="C4" required style="width: 180px"></td>
          </tr>

          <tr>
            <td>Identificación</td>
            <td><select name="C4" required style="width: 180px">
                  <option value null > -> selecione una opción -< </option>
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
            <td>Tipo de montaje</td>
            <td><select name="C6" required style="width: 180px">
                  <option value null > selecione una opción </option>
                  <option value="Shetter" > Shetter </option>
                  <option value="Chopper" > Chopper </option>

            </select></td>
          </tr>
          <tr>
            <td>Páginas</td>
            <td><select name="C7" required style="width: 180px">
                  <option value null > selecione una opción </option>
                  <option value="4" > 4 </option>
                  <option value="8" > 8 </option>
                  <option value="16" > 16 </option>
                  <option value="32" > 32 </option>

            </select></td>
          </tr>
          <tr>
            <td>Colores</td>
            <td><input type="number" name="C8" value="4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Ejemplares</td>
            <td><input type="number" name="C9" value="10000" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Colores especiales</td>
            <td><input type="number" name="C10"  < style="width: 180px"></td>
          </tr>
          <tr><td><hr></td><td><hr></td></tr>
          <tr>
            <td>Bandas</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Color especial</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Tipo Papel</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Propietario</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Formato de corte</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Código Papel</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Consumo en Kgs</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
                    <tr><td><hr></td><td><hr></td></tr>
          <tr>
            <td>Tiros (hojas)</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Tiraje para terminación</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Pérdidas en partida</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Pérdidas en el tiraje</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Pérdidas en el Escarpe</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Total de tiros</td>
            <td><input type="text" name="C4" required style="width: 180px"></td>
          </tr>
          <tr>
            <td>Fecha inicio </td>
            <td><input type="datetime-local" name="C1" required style="width: 180px"></td>
          </tr>
            <td>Duración [hs]</td>
            <td><input type="number" name="C10" style="width: 180px"></td>
          </tr>-->
