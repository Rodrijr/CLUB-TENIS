
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

      <div class="form-group">
        <div class="col-lg-12">
          <br>
          <legend>Horarios de Grupo</legend>
          <div class="col-lg-6">
            <a href="#"><span class="glyphicon glyphicon-plus"></span> Añadir Horario</a>
          </div>
        </div>
      </div>   

      <div class="form-group">
        <div class="col-lg-12">
          <br>
          <button class="btn btn-default">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>

    </form>
  </div>
</div>