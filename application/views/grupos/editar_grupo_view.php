
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
    <?php echo form_open('Grupo_controller/crear_grupo');?>    
      <div class="form-group">
        <div class="col-lg-12">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Nombre: </label>
          </div>
          <div class="col-lg-5 col-lg-offset-1">
            <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" maxlength="30" required="required" value="<?php echo $grupo['nombre_grupo']?>" ><br>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Descripci&oacute;n: </label>
          </div>
          <div class="col-lg-5 col-lg-offset-1">
            <textarea class="form-control" rows="3" id="textArea" style="resize:none; margin: 0px -3.84375px 0px 0px; width: 424px; height: 87px;" placeholder="Descripci&oacute;n del Grupo" name="descripcionGrupo" ><?php echo $grupo['descripcion_grupo']?></textarea>
          </div>
        </div>
      </div>

      <legend>Horarios</legend>

      <div class="form-group">
        <div class="col-lg-12">
          <a href="" class="btn btn-success" onClick="AgregarListaHorario()" ><span class="glyphicon glyphicon-plus-sign"></span> Agregar Horario</a><br>

          <p class="text-info"><strong><legend>Datos De Horario: </legend> </strong></p> 
          <div class="form-group">
            <div class="col-lg-6">
              <div class="col-lg-12">
                <label class="control-label" for="inputDefault">Hora: </label>
              </div>
              <div class="col-lg-11 col-lg-offset-1">
                <input type="time" name="hora" required="required" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="col-lg-12">
                <label class="control-label" for="inputDefault">Tipo: </label>
              </div>
              <div class="col-lg-11 col-lg-offset-1">
                <select class="form-control" name="nombreGrupo" id="select">
                  <option value="Tactico" selected>T&aacute;tico</option>
                  <option value="Fisico">F&iacute;sico</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="col-lg-12">
                <label class="control-label" for="inputDefault">Entrenador: </label>
              </div>
              <div class="col-lg-5 col-lg-offset-1">
                <input type="text" class="form-control" name="nombreEntrenador" placeholder="Entrenador" list="datalistEntrenador" autocomplete="off" maxlength="30" required="required" /><br>
                <datalist id="datalistEntrenador">
                  <?php foreach ($listaEntrenadores as $entrenador) {
                    echo '<option value="'.$entrenador['nombre_persona']." ".$entrenador['apellido_persona'].'">';
                  } ?>
                </datalist>
              </div>
              <div class="col-lg-12">
                <input id="check_horario" name="horarios_dia[]" value="'.$horario['id_horario'].'" type="checkbox">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Hora</th>
                <th>Entrenador</th>
                <th>Tipo De Entrenamiento</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table> 
        </div>
      </div>

      <legend>Alumnos</legend>

      <div class="form-group">
        <div class="col-lg-12">
          <a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar Alumno</a><br><br>
        </div>

        <div class="col-lg-12">
          <div class="col-lg-12">
            <label class="control-label" for="inputDefault">Alumno: </label>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="nombreEntrenador" placeholder="Alumno" list="datalistAlumno" autocomplete="off" maxlength="30" required="required" />
            <datalist id="datalistAlumno">
              <option value="Alumno 1">
              <option value="Alumno 2">
              <option value="Alumno 3">
            </datalist>
          </div>
        </div>

        
        <div class="col-lg-12">
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table> 
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-12">
          <br>
          <a href="<?php echo base_url(); ?>index.php/Grupo_controller/ver_lista_grupos" class="btn btn-default">Cancelar</a>
          <button type="submit" class="btn btn-primary">Crear Grupo</button>
        </div>
      </div>
    </form>
  </div>
</div>


<div class="container"> 
  <!-- Modal Aniadir Entrenador -->
  <div class="modal fade" id="myModalAniadirHorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('Grupo_controller/verificar_login');?>  
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="panel-title">Horario</h3>
            </div>
          </div>
          <div class="panel-body">
            <div class="modal-body">
              <p class="text-info"><strong><legend>Datos De Horario: </legend> </strong></p> 
 
              <div class="form-group">
                <div class="col-lg-6">
                  <div class="col-lg-12">
                    <label class="control-label" for="inputDefault">Hora: </label>
                  </div>
                  <div class="col-lg-11 col-lg-offset-1">
                    <input type="time" name="hora" required="required" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="col-lg-12">
                    <label class="control-label" for="inputDefault">Tipo: </label>
                  </div>
                  <div class="col-lg-11 col-lg-offset-1">
                    <select class="form-control" name="nombreGrupo" id="select">
                      <option value="Tactico" selected>T&aacute;tico</option>
                      <option value="Fisico">F&iacute;sico</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-12">
                    <label class="control-label" for="inputDefault">Entrenador: </label>
                  </div>
                  <div class="col-lg-5 col-lg-offset-1">
                    <input type="text" class="form-control" name="nombreEntrenador" placeholder="Entrenador" list="datalistEntrenador" autocomplete="off" maxlength="30" required="required" /><br>
                    <datalist id="datalistEntrenador">
                      <?php foreach ($listaEntrenadores as $entrenador) {
                        echo '<option value="'.$entrenador['nombre_persona']." ".$entrenador['apellido_persona'].'">';
                      } ?>
                    </datalist>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
          </div>
        </div><!-- /.panel panel-primary --> 
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal Aniadir Entrenador -->
</div>


<script type="text/javascript">

</script>