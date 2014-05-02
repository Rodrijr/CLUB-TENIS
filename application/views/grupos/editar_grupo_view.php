
<div class="container"> 
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">Editar Grupo</h1>
        </div>
      </div>
    </div>

  <div class="col-lg-6">
    
    <legend>Datos de Grupo</legend>
    <?php echo form_open('Grupo_controller/actualizar_grupo');?>    
      <div class="form-group">
        <div class="col-lg-12">
          <input type="HIDDEN" class="form-control" name="idGrupo" placeholder="Nombre del Grupo" value="<?php echo $grupo['id_grupo'] ?>">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Nombre: </label>
          </div>
          <div class="col-lg-5 col-lg-offset-1">
            <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" value="<?php echo $grupo['nombre_grupo'] ?>" maxlength="30" pattern="[a-zA-Z0-9]+" title="Solo se aceptan letras y Numeros. Ejemplo: Grupo3"><br>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-12">
          <br>
          <!-- <button class="btn btn-default">Cancelar</button> -->
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </form>

    <div class="form-group">
      <div class="col-lg-12">
        <legend>Datos de Entrenador</legend>
        <?php 
          if(isset($mensaje))
            echo '<p class="text-success">'.$mensaje.'..!!</p>'                  
        ?>
        <div class="col-lg-12">
          <?php 
            if($grupo['id_entrenador'] == 0)
            {
              echo '<a data-toggle="modal" href="#myModalAniadirEntrenador" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Aniadir Entrenador</a><br>';
            }
            else
            {
              echo '<div class="col-lg-12">';
                echo '<label class="control-label" for="inputDefault">Nombre: </label>';
              echo '</div>';
              echo '<div class="col-lg-8 col-lg-offset-1">';
                echo '<div><label class="control-label" for="inputDefault"><p class="text-success">'.$nombre_entrenador.'</p></label></div>';
                # Button trigger modal
                echo '<div><a data-toggle="modal" href="#myModalEliminarEntrenador" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span> Eliminar Entrenador</a><br></div>';
              echo '</div>';
            } 
          ?>
        </div>

        <!-- Modal Eliminar Entrenador -->
        <div class="modal fade" id="myModalEliminarEntrenador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Eliminando Entrenador</h3>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="modal-body">
                    <p class="text-warning"><strong>Estas Seguro que deseas Des-Asignar de este Grupo a este Entrenador:</strong></p><br>
                    <h3><p class="text-info"><?php echo $nombre_entrenador?></p></h3>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a href="<?php echo base_url(); ?>index.php/Grupo_controller/desasignar_entrenador_de_grupo/<?php echo $grupo['id_grupo']; ?>" class="btn btn-primary">Des-Asignar</a>
                  </div>
                </div>
              </div><!-- /.panel panel-primary --> 
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Modal Aniadir Entrenador -->
        <div class="modal fade" id="myModalAniadirEntrenador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="panel-title">Aniadiendo Entrenador</h3>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="modal-body">
                    <p class="text-info"><strong>Seleccionar Un Entrenador: </strong></p> 
                    <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cont = 1; ?>
                      <?php foreach($entrenadores as $entrenador){ ?>
                      <!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
                        <tr>
                          <td><?php echo $cont; ?></td>
                            <td><?php echo $entrenador['nombre_persona']; ?></td>
                            <td><?php echo $entrenador['apellido_persona']; ?></td>
                            <td><a Title="Seleccionar Entrenador" href="<?php echo base_url(); ?>index.php/Grupo_controller/asignar_entrenador_a_grupo/<?php echo $grupo['id_grupo']; ?>/<?php echo $entrenador['id_persona']; ?>"><span class="glyphicon glyphicon-check"></span></a></td>
                        </tr>
                        <?php $cont++; ?>
                        <?php } ?>
                    </tbody>
                  </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div><!-- /.panel panel-primary --> 
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
    </div>   

    <!-- Horarios de Grupo -->

    <div class="form-group">
      <div class="col-lg-12">
        <br>
        <legend>Horarios de Grupo</legend>
        <div class="col-lg-6">
          <a href="<?php echo base_url(); ?>index.php/Horario_controller/asignar_horario"><span class="glyphicon glyphicon-plus"></span> Añadir Horario</a>
          <a data-toggle="modal" href="#myModalAniadirHorario" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span> Add Horario</a><br>;
        </div>
        <?php
          if($cantidad_horarios!=0){
            echo '<legend><label id="turno">Turno</label></legend>';
              echo '<div class="page-header">';
                echo '<h4 id="tables" align="center">Lunes - Martes - Miercoles - Jueves - Viernes</h4>';
              echo '</div>';
            echo '<table class="table table-striped table-hover" style="visibility:visible; display:table" id="table_dia">';
              echo '<thead>';
                echo '<tr>';
                  echo '<th>#</th>';
                  echo '<th>Desde</th>';
                  echo '<th>Hasta</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                $cont = 1;
                foreach ($lista_horarios_de_grupo as $horario) {
                  echo '<tr>';
                    echo '<td>'.$cont.'</td>';
                    echo '<td>'.$horario['desde'].':00 </td>';
                    echo '<td>'.$horario['hasta'].':00 </td>';
                  echo '</tr>';
                $cont++;
                }
              echo '</tbody>';
            echo '</table>';
          }
        ?>
      </div>
      <!-- Modal Aniadir Entrenador -->
      <div class="modal fade" id="myModalAniadirHorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="panel-title">Agregar Horarios</h3>
                </div>
              </div>
              <div class="panel-body">
              <?php echo form_open('Grupo_controller/agregar_horario_a_grupo');?>  
                <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?>">  
                <div class="modal-body">
                  <div class = "form-group">
                    <p class="text-info col-md-5"><strong>Seleccionar Un Turno: </strong></p> 
                    <div class="col-md-4">
                      <select class="form-control" id="turno_seleccionado" onchange="establecer_turno()" name="turno_horario">
                        <option value="mañana" selected>Mañana</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                      </select><br><br>
                    </div>
                  </div>
                  <!-- ............Tabla de Horarios............ -->
                  <div class="container">
                    <legend><label id="turno">Turno Mañana</label></legend>
                    <div class="page-header">
                      <h4 id="tables" align="center">Lunes - Martes - Miercoles - Jueves - Viernes</h4>
                    </div>

                    <!-- ............Turno Maniana............ -->
                    <table class="table table-striped table-hover" style="visibility:visible; display:table" id="table_dia">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Desde</th>
                          <th>Hasta</th>
                          <th><span class="glyphicon glyphicon-check"></span></th>
                        </tr>
                      </thead>
                      <tbody>
                      <!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
                      <?php
                        $cont = 1;
                        foreach ($lista_horarios['turno_dia'] as $horario) {
                          echo '<tr>';
                            echo '<td>'.$cont.'</td>';
                            echo '<td>'.$horario['desde'].'</td>';
                            echo '<td>'.$horario['hasta'].'</td>';
                            echo '<td><input id="check_horario" name="horarios_dia[]" value="'.$horario['id_horario'].'" type="checkbox"></td>';
                          echo '</tr>';
                        $cont++;
                      } ?>
                      </tbody>
                    </table><!-- ............/ Turno Maniana............ -->
                    <!-- ............Turno Tarde............ -->
                    <table class="table table-striped table-hover" style="visibility:hidden; display:none" id="table_tarde">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Desde</th>
                          <th>Hasta</th>
                          <th><span class="glyphicon glyphicon-check"></span></th>
                        </tr>
                      </thead>
                      <tbody>
                      <!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
                      <?php
                        $cont = 1;
                        foreach ($lista_horarios['turno_tarde'] as $horario) {
                          echo '<tr>';
                            echo '<td>'.$cont.'</td>';
                            echo '<td>'.$horario['desde'].'</td>';
                            echo '<td>'.$horario['hasta'].'</td>';
                            //echo '<td><input name="horarios_tarde" type="checkbox"></td>';
                            echo '<td><input id="check_horario" name="horarios_dia[]" value="'.$horario['id_horario'].'" type="checkbox"></td>';
                          echo '</tr>';
                        $cont++;
                      } ?>
                      </tbody>
                    </table><!-- ............/ Turno Tarde............ -->
                    <!-- ............Turno Noche............ -->
                    <table class="table table-striped table-hover" style="visibility:hidden; display:none" id="table_noche">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Desde</th>
                          <th>Hasta</th>
                          <th><span class="glyphicon glyphicon-check"></span></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $cont = 1;
                        foreach ($lista_horarios['turno_noche'] as $horario) {
                          echo '<tr>';
                            echo '<td>'.$cont.'</td>';
                            echo '<td>'.$horario['desde'].'</td>';
                            echo '<td>'.$horario['hasta'].'</td>';
                            //echo '<td><input name="horarios_noche" type="checkbox"></td>';
                            echo '<td><input id="check_horario" name="horarios_dia[]" value="'.$horario['id_horario'].'" type="checkbox"></td>';
                          echo '</tr>';
                        $cont++;
                      } ?>
                      </tbody>
                    </table><!-- ............/ Turno Noche............ -->
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="col-lg-12">
                      <br>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div><!-- /.panel panel-primary --> 
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>   
  </div>
</div>

<script type="text/javascript">
  function establecer_turno(){
    var turno = document.getElementById("turno_seleccionado").value;
    $('input:checkbox').removeAttr('checked');

    document.getElementById('table_dia').style.visibility='hidden';
    document.getElementById('table_dia').style.display='none';

    document.getElementById('table_tarde').style.visibility='hidden';
    document.getElementById('table_tarde').style.display='none';

    document.getElementById('table_noche').style.visibility='hidden';
    document.getElementById('table_noche').style.display='none';

    if(turno=="mañana")
    {
      document.getElementById("turno").innerHTML="Turnoo Mañana";table_dia
      document.getElementById('table_dia').style.visibility='visible';
      document.getElementById('table_dia').style.display='table';
    }
    else if(turno=="tarde")
    {
      document.getElementById("turno").innerHTML="Turno Tarde";
      document.getElementById('table_tarde').style.visibility='visible';
      document.getElementById('table_tarde').style.display='table';
    }
    else
    {
      document.getElementById("turno").innerHTML="Turno Noche";
      document.getElementById('table_noche').style.visibility='visible';
      document.getElementById('table_noche').style.display='table';
    }
  }
</script>