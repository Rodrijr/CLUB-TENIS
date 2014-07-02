<div class="container"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center>Lista De Alumnos</center></h1>
      </div>
    </div>
  </div>

  <div class="col-lg-12 col-lg-offset-1">
    <div class="col-lg-10">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th colspan="3"><center>Planillas</center></th>
          </tr>
        </thead>
        <tbody>
          <?php $cont = 1; ?>
          <?php foreach ($lista_alumnos as $alumno) {
            echo '<tr>';
              echo '<td>'.$cont.'</td>';
              echo '<td>'.$alumno['nombre_persona'].'</td>';
              echo '<td>'.$alumno['apellido_persona'].'</td>';
              echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_objetivos_de_jugador/'.$alumno['id_persona'].'">Objetivos Del Jugador</a></td>';
              echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_perfil_de_jugador/'.$alumno['id_persona'].'" style="color:red">Perfil Del Jugador</a></td>';
              echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_evaluacion_personal/'.$alumno['id_persona'].'" style="color:green">Evaluaci&oacute;n Personal</a></td>';
              //echo '<td><a href="'.base_url().'index.php/Planilla_controller/llenar_objetivos_individuales/'.$alumno['id_persona'].'" style="color:purple">Objetivos Individuales</a></td>';
            echo '</tr>';
            $cont++;
            } ?>
        </tbody>
      </table> 
    </div>
  </div>
</div>