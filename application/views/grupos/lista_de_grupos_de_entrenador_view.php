<div class="container">
	<div class="row">
	    <div class="col-lg-12">
	      <div class="page-header">
	        <h1 id="forms"><center>Lista De Grupos</center></h1>
	      </div>
	    </div>
	</div>

	<div class="col-lg-12">
 
        <div class="col-lg-11 col-lg-offset-1">
        	
	        <div class="bs-component">

	          <?php	foreach($lista_sub_grupos as $sub_grupo_entrenador){ ?>
		          <div class="panel panel-primary">
					<div class="panel-heading">
					  <h3 class="panel-title"><strong><?php echo $sub_grupo_entrenador['sub_grupo']['nombre_subgrupo']." - ".$sub_grupo_entrenador['grupo']['nombre_grupo']?></strong></h3>
					</div>
					<div class="panel-body">
						<div class="col-lg-10 col-lg-offset-1">
						  <blockquote>
						  	<p class="text-primary"><strong>Entrenador(es): </strong><?php echo $sub_grupo_entrenador['entrenador']?></p>
						    <p><strong>Horario: </strong><?php echo $sub_grupo_entrenador['sub_grupo']['horario']?></p>
							<p><?php echo $sub_grupo_entrenador['sub_grupo']['descripcion']?></p>
						  </blockquote>
						  <legend><center>Alumnos</center></legend>
				          <table class="table table-striped table-hover">
				            <thead>
				              <tr>
				                <th>#</th>
				                <th>Nombre</th>
				                <th>Apellidos</th>
				                <th>Objetivos</th>
				                <th>Perfil</th>
				                <th>Evaluación Personal</th>
				                <th>Objetivos Individuales</th>

				              </tr>
				            </thead>
				            <tbody>
				            <!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
				              <?php  
				                $cont = 1;
				                foreach($sub_grupo_entrenador['lista_alumnos'] as $alumno){
				                  echo "<tr>";
				                    echo "<td>".$cont."</td>";
		                            echo "<td>".$alumno['nombre_persona']."</td>";
		                            echo "<td>".$alumno['apellido_persona']."</td>";
		                            echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_objetivos_de_jugador/'.$alumno['id_persona'].'">Objetivos Del Jugador</a></td>';
					                echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_perfil_de_jugador/'.$alumno['id_persona'].'" style="color:red">Perfil Del Jugador</a></td>';
					                echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_evaluacion_personal/'.$alumno['id_persona'].'" style="color:green">Evaluaci&oacute;n Personal</a></td>';
					                echo '<td><a href="'.base_url().'index.php/planilla_controller/llenar_objetivos_individuales/'.$alumno['id_persona'].'" style="color:purple">Objetivos Individuales</a></td>';
		                          echo "</tr>";
				                  $cont++;
				                }
				              ?>
				            </tbody>
				          </table>
				        </div>
				  	</div>
				  </div>
		      <?php } ?>
	        </div>
	    </div>
	</div>

	<div class="col-lg-12">
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <br>
            <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>index.php">Atrás</a>
          </div>
        </div>
    </div>
</div>

