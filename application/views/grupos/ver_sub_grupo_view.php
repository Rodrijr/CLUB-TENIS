<div class="container">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="form-group">
      <strong><legend><center><h3><?php echo $nombre_subgrupo;?></h3></center></legend></strong>
      <p class="text-success"><strong>Entrenador(es): </strong><?php echo $entrenadores;?>.</p>
      <p class="text-info"><strong>Horario de: </strong><?php echo $horario;?>Hrs.</p>
      <p><strong>Descripci&oacute;n: </strong><?php echo $descripcion;?>.</p>

      <div class="form-group">
        <div class="col-lg-9 col-lg-offset-2">
          <legend><center>Alumnos</center></legend>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
               <th>Apellidos</th>
              </tr>
            </thead>
            <tbody>
            <?php  
              $cont=1;
              foreach($alumnos as $alumno)
              {
                echo '<tr>';
                  echo '<td>'.$cont.'</td>';
                    echo '<td>'.$alumno['nombre_persona'].'</td>';
                    echo '<td>'.$alumno['apellido_persona'].'</td>';
                echo '</tr>';
                $cont++;
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <a class="btn btn-default" onclick='history.back()'>Atr&aacute;s</a>
          <a type="button" href="<?php echo base_url();?>index.php/Grupo_controller/agregar_alumnos_a_sub_grupo/<?php echo $id_subgrupo?>" class="btn btn-warning">Agregar Alumnos</a>
        </div>
      </div>
    </div>
  </div>
</div>