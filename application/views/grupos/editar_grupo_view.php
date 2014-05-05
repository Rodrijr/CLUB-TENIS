
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
      <div class="form-group">
        <div class="col-lg-12">
          <br>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </form>

      <legend>Horarios</legend>

      <div class="form-group">
        <div class="col-lg-12">
          <?php echo form_open('Grupo_controller/agregar_horario');?>
          <p class="text-info"><strong><legend>Datos De Horario: </legend> </strong></p> 
          <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']?> ">
          <div class="form-group">
            <div class="col-lg-6">
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
                  <input type="time" name="hasta_hora" required="required" />
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="col-lg-12">
                <label class="control-label" for="inputDefault">Tipo: </label>
              </div>
              <div class="col-lg-11 col-lg-offset-1">
                <select class="form-control" name="tipo_entrenamiento" id="select">
                  <option value="Tactico" selected>T&aacute;tico</option>
                  <option value="Fisico">F&iacute;sico</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="col-lg-6">
                <div class="col-lg-12">
                  <label class="control-label" for="inputDefault">Entrenador: </label>
                </div>
                <div class="col-lg-12 col-lg-offset-1">
                  <input type="text" class="form-control" name="entrenador" placeholder="Entrenador" list="datalistEntrenador" autocomplete="off" maxlength="30" required="required" /><br>
                  <datalist id="datalistEntrenador">
                    <?php foreach ($listaEntrenadores as $entrenador) {
                      echo '<option value="'.$entrenador['nombre_persona']." - ".$entrenador['apellido_persona'].'">';
                    } ?>
                  </datalist>

                </div>
              </div>
              <div class="col-lg-6">
                <br><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>Agregar Horario</button>
              </div>
            </div>
          </div>
          </form>
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
              <?php $cont = 1; ?>
              <?php foreach ($listaHorarios as $horario) {
                echo '<tr>';
                  echo '<td>'.$cont.'</td>';
                  echo '<td>'.$horario['hora'].'</td>';
                  echo '<td>'.$horario['entrenador'].'</td>';
                  echo '<td>'.$horario['tipo'].'</td>';
                echo '</tr>';
                $cont++;
                } ?>
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
              <select name="nombreEntrenador">
                <option value="1">Homer Simpson
                <option value="1">Homer ya
                <option value="1">Bart
                <option value="1">Fred Flinstone
               </select>
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
  </div>
  <div class="form-group">
    <div class="col-lg-12">
      <br>
      <a href="<?php echo base_url(); ?>index.php/Grupo_controller/ver_lista_grupos" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</div>


<script type="text/javascript">

</script>