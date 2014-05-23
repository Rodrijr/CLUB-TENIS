<div class="container">

  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h3 class="panel-title">Aniadiendo Sub-Grupo</h3>
  <?php echo form_open('Grupo_controller/agregar_sub_grupo');?>
  <p class="text-info"><strong>Sub-Grupo: </strong></p> 

  <div class="form-group">
    <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_grupo?>">
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

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Agregar Sub-Grupo</button>
    <?php echo form_close();?>
  </div>
</div>