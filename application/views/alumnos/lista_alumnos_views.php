<div class="container">
    <div class="col-lg-12">
        <div class="page-header">
        	<h1 id="tables" align="center">Lista De Alumnos</h1>
        </div>
        <div class="col-lg-11 col-lg-offset-1">
	        <div class="bs-component">
		      <div class="col-lg-10">
		          <table class="table table-bordered">
		          	<thead>
		              <tr>
		                <th>CI</th>
		                <th>Nombre</th>
		                <th>TELEFONO</th>
		                <th>DIRECCION</th>
		                <th>E-MAIL</th> 
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; ?>
		            	<?php	foreach($alumnos as $alumno){ ?>
		            	<!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
		                <tr>
		                    <td style="min-width: 0px; max-width: 10%">
                            <?php echo $alumno['ci_persona']; ?></td>
	                       <td style="min-width: 0px; max-width: 55%">
                             <a><?php echo $alumno['nombre_persona']." ".$alumno['apellido_persona']; ?></a>      
                            </td>
                            <td style="min-width: 0px; max-width: 10%">
                                <?php echo $alumno['telefono']; ?></td>
                            <td style="min-width: 0px; max-width: 300px">
                                <?php echo $alumno['direccion']; ?></td>
                            <td style="min-width: 0px; max-width: 10%">
                                <?php echo $alumno['email']; ?></td>
                            
                        </tr>
		                <?php $cont++; ?>
		                <?php } ?>
		            </tbody>
		          </table>
		          
		      </div>
	        </div>
	    </div>
	</div>
</div>