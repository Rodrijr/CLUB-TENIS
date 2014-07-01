<div class="container">
    <div class="col-lg-12">
        <div class="page-header">
        	<h1 id="tables" align="center">Buscar Usuario</h1>
            <?php echo form_open('persona_controller/buscar_persona')?>      
            <fieldset>
                <div class="col-lg-10 form-group">
                     <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="apellido" placeholder="Ingrese el APELLIDO">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span> </span>
                        </div>
                    </div>
                    <button type="submit" class="col-lg-2 btn btn-success">Buscar</button>
                </div>
            </fieldset>
        <?php echo form_close() ?>
        </div>
        <div class="col-lg-11 col-lg-offset-2">
	        <div class="bs-component">
		      <div class="col-lg-10">
        <?php
        if(isset($MSN)&& !empty($MSN))
                {
                            echo"<div class='alert fade in'>";
							echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                            echo"<strong>ALERTA!</strong> ";
							echo"<font color='#FF0000'><input  readonly='readonly' type='text_Rodri' name='numero' value='$MSN' style=' text-shadow: 0 0 0.2em #8F7; border:none; width:350px; height:30px'>";
                            echo "";
                            echo validation_errors();
							echo"</font></div>";} ?>
                  </div>
                </div>
            </div>
        
        <div class="col-lg-11 col-lg-offset-1">
	        <div class="bs-component">
		      <div class="col-lg-11">
		          <table class="table table-striped table-hover">
		          	<thead>
		              <tr>
                        <th>CI</th>
		                <th>APELLIDO</th>
		                <th>NOMBRE </th>
		                <th>ACCION</th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; ?>
		            	<?php	foreach($personas as $persona){ ?>
		            	<!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
		                <tr>
                        <td style="min-width: 0px; max-width: 10%">
                            <?php echo $persona['ci_persona']; ?></td>
                            <td style="min-width: 0px; max-width: 65%">
                             <a><?php echo $persona['apellido_persona']; ?>
                             </a>      
                            </td>
	                       <td style="min-width: 0px; max-width: 65%">
                             <a><?php echo $persona['nombre_persona']; ?>
                             </a>      
                            </td>
                            <td style="min-width: 0px; max-width: 10%">
                             <?PHP echo form_open_multipart('Persona_controller/enviar/'.$persona['ci_persona'],'class="form-horizontal"');
           
               echo '<input type="submit" 
                      value="Enviar" 
                      class ="btn btn-info "/>';
          
    echo form_close();                            ?>
                            </td>
                            
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
