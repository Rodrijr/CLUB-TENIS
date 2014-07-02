<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center>Nuevo Sub-Grupo</center></h1>
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-lg-offset-2">
    <?php echo form_open('grupo_controller/agregar_sub_grupo');?>
     
    <div class="form-group">
      <p class="text-info"><strong>Sub-Grupo: </strong></p>
      <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_grupo?>">
      <div class="col-lg-12">
        <div class="col-lg-10 col-lg-offset-2">
          <br>
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
          <input type="text" class="form-control" name="descripcionSubGrupo" placeholder="Ej: Canchas 3,5,7" maxlength="100" required="required"><br>
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
            <p class="text-danger"><strong> <?php if($alerta_hora==1) echo "Mensaje: La Hora DESDE no puede ser Mayor que HASTA"; else echo ""; ?></strong></p>
          </div>
        </div>
        <!-- ################### Entrenadores ######################## -->
        <div class="form-group">
          <div class="col-lg-12">
            <br><p class="text-info"><strong>Entrenadores:</strong></p>
            <div class="col-lg-12">
              <!-- <p class="text-danger"><strong><?php #if($alerta_entrenador==1) echo "Mensaje: Tiene que seleccionar al menos un Entrenador"; else echo ""; ?> </p> -->
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
      <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>index.php/grupo_controller/editar_grupo/<?php echo $id_grupo?>">Cancelar</a>
      <button type="submit" class="btn btn-primary">Agregar Sub-Grupo</button>
      <?php echo form_close();?>
    </div>
  </div>
</div>