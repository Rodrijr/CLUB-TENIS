
<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms">Nuevo Grupo</h1>
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
            <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" maxlength="30" pattern="[a-zA-Z0-9]+" title="Solo se aceptan letras y Numeros. Ejemplo: Grupo3" required="required"><br>
          </div>
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