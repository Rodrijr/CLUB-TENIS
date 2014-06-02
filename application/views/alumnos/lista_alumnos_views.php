<div class="container">
    <div class="col-lg-12">
        <div class="page-header">
        	<h1 id="tables" align="center">Lista De Alumnos</h1>
            
            	
            <?php echo form_open('Persona_controller/buscar_alumno')?>          
            <fieldset>
                <div class="col-lg-10 form-group">
                     <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="ci" placeholder="CI del  alumno ">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span> </span>
                        </div>
                    </div>
                    <button type="submit" class="col-lg-2 btn btn-success">Buscar</button>
                </div>
                
            </fieldset>
        <?php echo form_close() ?>
        </div>
        <div class="col-lg-11 col-lg-offset-1">
	        <div class="bs-component">
		      <div class="col-lg-11">
		          <table class="table table-striped table-hover">
		          	<thead>
		              <tr>
                        <th>FOTOGRAFIA</th>
		                <th>CI</th>
		                <th>NOMBRE APELLIDO</th>
		                <th>ESTADO</th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; ?>
		            	<?php	foreach($alumnos as $alumno){ ?>
		            	<!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
		                <tr>
                        <td style="min-width: 0px; max-width: 5%">
                        
                            <?PHP echo form_open_multipart('Persona_controller/subir_foto/'.$alumno['ci_persona'],'class="form-horizontal"'); 
    $link = "./imagenes/".$alumno['ci_persona'].".jpg";
                                                             
$f=file_exists($link);
if($f){?>
                            
<img src="<?php echo base_url(); ?>imagenes\<?php echo $alumno['ci_persona'];  ?>.jpg" aling ="center" width="170px" height="98px"/> 
 <?php                           
                            
} else {?>
        <input type="file" name="userfile" />
         <br><br>
<input type="submit" value="ESTABLECER" class ="btn btn-default btn-lg "/>                 
 <?php
} echo form_close();
 ?>                       
                            
                        </td>   
                        <td style="min-width: 0px; max-width: 10%">
                            <?php echo $alumno['ci_persona']; ?></td>
	                       <td style="min-width: 0px; max-width: 65%">
                             <a><?php echo $alumno['nombre_persona']." ".$alumno['apellido_persona']; ?></a>      
                            </td>
                            <td style="min-width: 0px; max-width: 10%">
                                <?php echo $alumno['estado']; ?></td>
                            
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