<div class="container">
	<div class="row">
	    <div class="col-lg-12">
	      <div class="page-header">
	        <h1 id="forms"><center>Lista De Grupos</center></h1>
	      </div>
	    </div>
	</div>

	<div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-9 col-lg-offset-2">
      	<?php echo form_open('Grupo_controller/buscar_grupos')?>          
            <fieldset>
                <!-- zzzzzzzzzzzzzzzzzzz Datos Basicos zzzzzzzzzzzzzzzzzzzzzzz -->

                <div class="col-lg-10 form-group">
                    <label class="col-lg-2 control-label">Buscar Por: </label>
                    <div class="col-lg-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nombreEntrenador" placeholder="Nombre de Entrenador" pattern="[a-zA-Z]+" title="Solo se aceptan Letras">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span> </span>
                        </div>
                    </div>
                    <button type="submit" class="col-lg-2 btn btn-success">Buscar</button>
                </div>
                
            </fieldset>
        <?php echo form_close() ?>
	  </div>
	</div>
	</div>
</div>

<div class="container">
    <div class="col-lg-12">
        <div class="col-lg-11 col-lg-offset-1">
	        <div class="bs-component">
	          <?php	foreach($lista_sub_grupos as $sub_grupo_entrenador){ ?>
		          <div class="panel panel-primary">
					<div class="panel-heading">
					  <h3 class="panel-title"><strong><?php echo $sub_grupo_entrenador['grupo']['nombre_grupo']?></strong></h3>
					</div>
					<div class="panel-body">
						<p class="text-primary"><strong>Entrenador(es): </strong><?php echo $sub_grupo_entrenador['entrenador']?></p>
						<div class="col-lg-10 col-lg-offset-1">
						  <legend><?php echo $sub_grupo_entrenador['sub_grupo']['nombre_subgrupo'] ?></legend>
						  <blockquote>
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
</div>

