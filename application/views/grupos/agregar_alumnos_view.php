<div class="container">

	<div class="row">
	    <div class="col-lg-12">
	      <div class="page-header">
	        <h1 id="forms"><center>Lista De Alumnos</center></h1>
	      </div>
	    </div>
	</div>

    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">            
        <?php echo form_open('grupo_controller/guardar_alumnos_en_sub_grupo');?>
        <input type="HIDDEN" class="form-control" name="id_subgrupo" value="<?php echo $id_subgrupo ?>">
        <div class="form-group">
          <div class="col-lg-12">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th width="5%"></th>
                </tr>
              </thead>
              <tbody>
                <?php $cont = 1; ?>
                <?php foreach($listaAlumnos as $alumno){ ?>
                <!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
                  <tr>
                    <td><?php echo $cont; ?></td>
                      <td><?php echo $alumno['nombre_persona']; ?></td>
                      <td><?php echo $alumno['apellido_persona']; ?></td>
                      <td><input name="alumnos[]" value="<?php echo $alumno['id_persona']; ?>" type="checkbox"></td>
                  </tr>
                  <?php $cont++; ?>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="form-group">
        <a class="btn btn-default" onclick='history.back()'>Atr&aacute;s</a>
    		<button type="submit" class="btn btn-primary">Agregar Alumnos</button>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
</div>