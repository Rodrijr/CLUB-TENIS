<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <center><h1 id="forms">Nuevo Grupo</h1></center>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-lg-offset-4" >
      <strong><legend>Datos de Grupo</legend></strong>
      <?php echo form_open('grupo_controller/crear_grupo');?>    
        <div class="form-group">
          <div class="col-lg-12">
            <div class="col-lg-12">
              <label class="control-label" for="inputDefault">Nombre: </label>
            </div>
            <div class="col-lg-9 col-lg-offset-1">
              <input id="input_nombre_grupo"  type="text" class="form-control" name="nombreGrupo" placeholder="Nombre del Grupo" maxlength="30" required="required"><br>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-12">
            <br>
            <center>
            <a href="<?php echo base_url(); ?>index.php/grupo_controller/ver_lista_grupos" class="btn btn-warning">Cancelar</a>
            <button type="submit" class="btn btn-primary">Crear Grupo</button>
            </center>
          </div>
        </div>
      <?php echo form_close();?>
      
    </div>
  </div>
</div>