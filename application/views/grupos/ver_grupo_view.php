
     <div class="container">
        <div class="row-fluid">
            <div class="col-lg-6">
                  <fieldset>
   
                <?php echo form_open_multipart(''); ?>
                <H3><label >ES EL GRUPO:</label></H3>
                      <h1> 
                   
                <?php
                    if(isset($grupo))
                    {
                        echo "<font color='#386CC4'>";
                        echo $grupo['nombre_grupo']."  ";
                        echo "</font>";                       
                ?>
                </h1>                 
                  <h3>
                    <fieldset>
                              
                    <div class='control-group'>
                         <label >Descripcion:
                             <font color='#386CC4'>
                        <?php
                           echo $grupo['descripcion_grupo'];
                        ?>
                            </font>
                        </label><br>
                    </div>  
                    </fieldset>
                  </h3> 
                <?php
                        } // if(isset($persona)) close
                ?>
                  </fieldset>
  
                <?php echo form_close(); ?>       
        </div>

        

      <div class="form-group">
        <legend>Horarios</legend>
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

      

      <div class="form-group">
        <legend>Alumnos</legend>
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
              <?php $cont = 1; ?>
              <?php foreach ($listaAlumnos as $alumnos) {
                echo '<tr>';
                  echo '<td>'.$cont.'</td>';
                  echo '<td>'.$alumnos['nombre_alumno'].'</td>';
                  echo '<td>'.$alumnos['apellido_alumno'].'</td>';
                echo '</tr>';
                $cont++;
              } ?>
            </tbody>
          </table> 
        </div>
      </div>
  </div>
</div>

    </div>  
  </div>  