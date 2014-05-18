
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

    <strong><legend>Sub Grupos</legend></strong>
    <a data-toggle="modal" href="#myModalAniadirEntrenador" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Aniadir Entrenador</a>
  </div>



  <div class="form-group">
    <div class="col-lg-12">
      <br>
      <a href="<?php echo base_url(); ?>index.php/Grupo_controller/ver_lista_grupos" class="btn btn-default">Cancelar</a>
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
          </div>
        </div>
        <div class="panel-body">
          <div class="modal-body">
            <p class="text-info"><strong>Sub-Grupo: </strong></p> 

            <div class="form-group">
              <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?> ">
              <div class="col-lg-12">
                <div class="col-lg-10 col-lg-offset-2">
                  <label class="control-label" for="inputDefault">Nombre: </label>
                </div>
                <div class="col-lg-6 col-lg-offset-3">
                  <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" maxlength="30" required="required" value="<?php echo $grupo['nombre_grupo']?>" ><br>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="col-lg-10 col-lg-offset-2">
                  <label class="control-label" for="inputDefault">Descripci&oacute;n: </label>
                </div>
                <div class="col-lg-6 col-lg-offset-3">
                  <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" maxlength="30" required="required" value="<?php echo $grupo['nombre_grupo']?>" ><br>
                </div>
              </div>
            </div>
            <!-- ################### Horario ######################## -->
            <div class="form-group">
              <div class="col-lg-12">
              <?php echo form_open('Grupo_controller/agregar_horario');?>
                <p class="text-info"><strong>Horario:</strong></p> 
                <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?> ">
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
                </div>

                <div class="form-group">
                  <div class="col-lg-12">
                    <br><p class="text-info"><strong>Entrenadores:</strong></p>
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
                        <?php foreach($listaEntrenadores as $entrenador){ ?>
                        <!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
                          <tr>
                            <td><?php echo $cont; ?></td>
                              <td><?php echo $entrenador['nombre_persona']; ?></td>
                              <td><?php echo $entrenador['apellido_persona']; ?></td>
                              <!-- <td><a Title="Seleccionar Entrenador" href="<?php echo base_url(); ?>index.php/Grupo_controller/asignar_entrenador_a_grupo/<?php echo $grupo['id_grupo']; ?>/<?php #echo $entrenador['id_persona']; ?>"><span class="glyphicon glyphicon-check"></span></a></td> -->
                              <td><input id="check_horario" name="horarios_dia[]" value="'.$horario['id_horario'].'" type="checkbox"></td>
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