<div class="container">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="form-group">
      <strong><legend><center><h3><?php echo $nombre_subgrupo;?></h3></center></legend></strong>

      <div class="form-group">
        <p class="text-info"><strong>Sub-Grupo: </strong></p>
        <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_grupo?>">
        <div class="col-lg-12">
          <div class="col-lg-10 col-lg-offset-2">
            <br>
            <label class="control-label" for="inputDefault">Nombre: </label>
          </div>
          <div class="col-lg-6 col-lg-offset-3">
            <input type="text" class="form-control" name="nombreSubGrupo" placeholder="Nombre de Sub-Grupo" maxlength="30" required="required" value="<?php echo $nombre_subgrupo?>"><br>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="col-lg-10 col-lg-offset-2">
            <label class="control-label" for="inputDefault">Descripci&oacute;n: </label>
          </div>
          <div class="col-lg-6 col-lg-offset-3">
            <input type="text" class="form-control" name="descripcionSubGrupo" placeholder="Ej: Canchas 3,5,7" maxlength="100" required="required" value="<?php echo $descripcion?>"><br>
          </div>
        </div>
      </div>
      <!-- ################### Horario ######################## -->
      <div class="form-group">
        <div class="col-lg-12">            
          <p class="text-info"><strong>Horario:</strong></p> 
          <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">
              <div class="col-lg-6">
                <div class="col-lg-12">
                  <label class="control-label" for="inputDefault">Desde: </label>
                </div>
                <div class="col-lg-11 col-lg-offset-1">
                  <input type="time" name="desde_hora" required="required" value="<?php echo $desde?>"/>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="col-lg-12">
                  <label class="control-label" for="inputDefault">Hasta: </label>
                </div>
                <div class="col-lg-11 col-lg-offset-1">
                  <input type="time" name="hasta_hora" required="required" value="<?php echo $hasta?>"/>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <br>
              <p class="text-danger"><strong> <?php if(isset($alerta_hora)){ if($alerta_hora==1) echo "Mensaje: La Hora DESDE no puede ser Mayor que HASTA"; else echo ""; } ?></strong></p>
            </div>
          </div>
          <!-- ################### Entrenadores ######################## -->
          <div class="form-group">
            <div class="col-lg-9 col-lg-offset-2">
              <legend><center>Entrenadores</center></legend>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Descartar Entrenador</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cont = 1; ?>
                  <?php foreach($listaEntrenadores as $entrenador){ ?>
                    <tr>
                      <td><center><?php echo $cont; ?></center></td>
                      <td><?php echo $entrenador['nombre_persona']; ?></td>
                      <td><?php echo $entrenador['apellido_persona']; ?></td>
                      <td><center><a type="button" data-toggle="modal" href="#myModalEliminarEntrenador" class="btn btn-warning">Descartar Entrenador</a></center></td>

                      <!-- Modal Eliminar Entrenador -->
                      <div class="modal fade" id="myModalEliminarEntrenador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h3 class="panel-title">Alerta...!!</h3>
                                </div>
                              </div>
                              <div class="panel-body">
                                <center><p class="text-danger">Esta Seguro que quiere <strong>DESCARTAR</strong> este Entrenador?</p></center>
                                <div class="modal-footer">
                                  <?php echo form_open('Grupo_controller/descartar_entrenador_de_sub_grupo');?>
                                  <input type="HIDDEN" class="form-control" name="id_entrenador" value="<?php echo $entrenador['id_persona']; ?>">
                                  <input type="HIDDEN" class="form-control" name="id_subgrupo" value="<?php echo $id_subgrupo?>">    
                                  <center><div class="form-group">
                                    <div class="col-lg-12">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-danger">Aceptar</button>
                                    </div>
                                  </div></center>
                                  <?php echo form_close();?>  
                                </div>
                              </form>
                              </div>
                            </div><!-- /.panel panel-primary --> 
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </tr>
                    <?php $cont++; ?>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <a type="button" data-toggle="modal" href="#myModalAniadirEntrenador" class="btn btn-success">Agregar Entrenador</a>
            </div>
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-9 col-lg-offset-2">
          <legend><center>Alumnos</center></legend>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
               <th>Apellidos</th>
               <th>Descartar Alumno</th>
              </tr>
            </thead>
            <tbody>
            <?php  
              $cont=1;
              foreach($alumnos as $alumno)
              {
                echo '<tr>';
                  echo '<td><center>'.$cont.'</center></td>';
                    echo '<td>'.$alumno['nombre_persona'].'</td>';
                    echo '<td>'.$alumno['apellido_persona'].'</td>';
                    echo '<td><center><a href="'.base_url().'index.php/Grupo_controller/eliminar_alumno_sub_grupo/'.$id_subgrupo.'/'.$alumno['id_persona'].'">Descartar</a></center></td>';
                echo '</tr>';
                $cont++;
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <a class="btn btn-default" href="<?php echo base_url();?>index.php/Grupo_controller/editar_grupo/<?php echo $id_grupo?>">Atr&aacute;s</a>
          <a type="button" href="<?php echo base_url();?>index.php/Grupo_controller/agregar_alumnos_a_sub_grupo/<?php echo $id_subgrupo?>" class="btn btn-warning">Agregar Alumnos</a>
        </div>
      </div>
      
    </div>
  </div>

  <!-- ################### Modals Pop Up ######################## -->

  <!-- Modal Aniadir Entrenador -->
  <div class="modal fade" id="myModalAniadirEntrenador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="panel-title">Aniadiendo Entrenador A Sub-Grupo</h3>
              <?php echo form_open('Grupo_controller/agregar_entrenador');?>
            </div>
          </div>
          <div class="panel-body">
            <div class="modal-body">
              <strong><legend><center><?php echo $nombre_subgrupo?></center></legend></strong> 

              <div class="form-group">
                <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_grupo ?>">
                <input type="HIDDEN" class="form-control" name="id_subgrupo" value="<?php echo $id_subgrupo ?>">
              </div>
              <!-- ################### Entrenadores ######################## -->
              <div class="form-group">
                <div class="col-lg-12">                          
                  <div class="form-group">
                    <div class="col-lg-12">
                      <br><p class="text-info"><strong>Entrenadores:</strong></p>
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Seleccionados</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $cont = 1; ?>
                          <?php foreach($listaTodosEntrenadores as $entrenador){ ?>
                            <tr>
                              <td><?php echo $cont; ?></td>
                              <td><?php echo $entrenador['nombre_persona']; ?></td>
                              <td><?php echo $entrenador['apellido_persona']; ?></td>
                              <td><input type="checkbox" name="entrenadores[]" value="<?php echo $entrenador['id_persona']; ?>" /></td>
                            </tr>
                            <?php $cont++; ?>
                            <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Agregar Entrenador</button>
              <?php echo form_close();?>
            </div>
          </div>
        </div><!-- /.panel panel-primary --> 
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <

</div>