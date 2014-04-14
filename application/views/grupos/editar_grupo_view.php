
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
          <div class="col-lg-12">
            <?php 
              if($grupo['id_entrenador'] == 0)
              {
                echo '<a href=""><span class="glyphicon glyphicon-plus-sign"></span> Aniadir Entrenador</a><br>';
              }
              else
              {
                echo '<div class="col-lg-12">';
                  echo '<label class="control-label" for="inputDefault">Nombre: </label>';
                echo '</div>';
                echo '<div class="col-lg-8 col-lg-offset-1">';
                  echo '<div><label class="control-label" for="inputDefault"><p class="text-success">'.$nombre_entrenador.'</p></label></div>';
                  echo '<div><a href="#"><span class="glyphicon glyphicon-trash"></span> Eliminar Entrenador</a><br></div>';
                echo '</div>';
              } 
            ?>
          </div>
          <div class="col-lg-6">
            
          </div>
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
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>

    </form>
  </div>
</div>