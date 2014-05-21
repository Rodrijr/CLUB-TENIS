
<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center>Editar Grupo</center></h1>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-lg-offset-3">
    <legend>Datos de Grupo</legend>
    <?php echo form_open('Grupo_controller/actualizar_grupo');?>    
      <div class="form-group">
        <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?> ">
        <div class="col-lg-12">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Nombre: </label>
          </div>
          <div class="col-lg-12">
            <div class="col-lg-5 col-lg-offset-1">
              <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" maxlength="30" required="required" value="<?php echo $grupo['nombre_grupo']?>" ><br>
            </div>
            <div class="col-lg-6">  
              <button type="submit" class="btn btn-primary">Cambiar Nombre</button>
            </div>
          </div>
        </div>
      </div>
    <?php echo form_close();?>
  </div>

  <div class="col-lg-10 col-lg-offset-1">
    <strong><legend>Sub Grupos</legend></strong>
    
    <div class="form-group">
      <div class="form-group">
        <div class="col-lg-12">
          <legend><center>Alumnos</center></legend>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre de Sub_grupo</th>
                <th>Entrendor(es)</th>
                <th width="15%">Horario</th>
                <th>descripcion</th>
                <th>Ver</th>
                <th>Editar</th>
              </tr>
            </thead>
            <tbody>
            <?php $cont = 1; ?>
            <?php foreach ($sub_grupos as $item_sub_grupo) 
            {
              echo '<tr>'; 
                echo '<td>'.$cont.'</td>';
                echo '<td>'.$item_sub_grupo['nombre_subgrupo'].'</td>';
                echo '<td>'.$item_sub_grupo['entrenadores'].'</td>';
                echo '<td><center>'.$item_sub_grupo['horario'].'</center></td>';
                echo '<td>'.$item_sub_grupo['descripcion'].'</td>';
                echo '<td><a href="'.base_url().'index.php/Grupo_controller/ver_sub_grupo/'.$item_sub_grupo['id_subgrupo'].'">Ver</a></td>';
                echo '<td><a href="'.base_url().'index.php/Grupo_controller/editar_sub_grupo/'.$item_sub_grupo['id_subgrupo'].'">Editar</a></td>';
                #echo '<strong><legend><center><h3>'.$item_sub_grupo['nombre_subgrupo'].'</h3></legend></center></strong>';
                #echo '<p class="text-success"><strong>Entrenador(es): </strong>'.$item_sub_grupo['entrenadores'].'.</p>';
                #echo '<p class="text-info"><strong>Horario de: </strong>'.$item_sub_grupo['horario'].' Hrs.</p>';
                #echo '<p><strong>Descripci&oacute;n: </strong>'.$item_sub_grupo['descripcion'].'.</p>';  
                $cont++; 
              echo '</tr>';    
            } ?>
            </tbody>
          </table>
        </div>
      </div>

      <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-6 col-lg-offset-5">
      <br>
      <a href="<?php echo base_url(); ?>index.php/Grupo_controller/ver_lista_grupos" class="btn btn-default">Atr&aacute;s</a>
      <a data-toggle="modal" href="#myModalAniadirEntrenador" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Añadir Sub-Grupo</a>
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
            <h3 class="panel-title">Aniadiendo Sub-Grupo</h3>
            <?php echo form_open('Grupo_controller/agregar_sub_grupo');?>
          </div>
        </div>
        <div class="panel-body">
          <div class="modal-body">
            <p class="text-info"><strong>Sub-Grupo: </strong></p> 

            <div class="form-group">
              <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?>">
              <div class="col-lg-12">
                <div class="col-lg-10 col-lg-offset-2">
                  <label class="control-label" for="inputDefault">Nombre: </label>
                </div>
                <div class="col-lg-6 col-lg-offset-3">
                  <input type="text" class="form-control" name="nombreSubGrupo" placeholder="Nombre de Sub-Grupo" maxlength="30" required="required" ><br>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="col-lg-10 col-lg-offset-2">
                  <label class="control-label" for="inputDefault">Descripci&oacute;n: </label>
                </div>
                <div class="col-lg-6 col-lg-offset-3">
                  <input type="text" class="form-control" name="descripcionSubGrupo" placeholder="Ej: Canchas 3,5,7" maxlength="30" required="required"><br>
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
                        <input type="time" name="desde_hora" required="required" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="col-lg-12">
                        <label class="control-label" for="inputDefault">Hasta: </label>
                      </div>
                      <div class="col-lg-11 col-lg-offset-1">
                        <input type="time" name="hasta_hora" required="required"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <br>
                    <p class="text-danger">Mensaje: </p>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-12">
                    <br><p class="text-info"><strong>Entrenadores:</strong></p>
                    <div class="col-lg-12">
                      <p class="text-danger">Mensaje: </p>
                    </div>
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
                        <?php foreach($listaEntrenadores as $entrenador){ ?>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar Sub-Grupo</button>
            <?php echo form_close();?>
          </div>
        </div>
      </div><!-- /.panel panel-primary --> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">

</script>