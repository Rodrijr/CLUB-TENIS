<div class="container">
<div class="bs-example bs-example-tabs">
    <ul id="myTab" class="nav nav-pills">
      <li class=""><a href="#Grupos" data-toggle="tab">GRUPO</a></li>
      <li class="active"><a href="#Alumnos" data-toggle="tab">ALUMNO</a></li>
      <li class=""><a href="#Padres" data-toggle="tab">PADRES</a></li>
      <li class="dropdown">
        
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
     
    </div>
       <div class="tab-pane fade active in" id="Alumnos">
        <div class="row"><br>   
           	<?php echo form_open('Notificacion_controller/buscar_alumnos'); ?>
           <div class="col-md-2">
            
           </div>
           <div class="col-md-6">
            <input type="text" class="form-control" name="ci" placeholder="CI">
           </div>
           
           <INPUT VALUE='BUSCAR' class='btn btn-success' TYPE='submit'>
            <?php echo form_close() ?>
            </div><br>
            <div class="row">
            <div class="col-md-2">            
           </div>
                <?php echo form_open('Notificacion_controller/enviar_notificacion'); ?>
           <div class="col-md-8">
               
         <table class="table table-bordered">
		          	<thead>
		              <tr>
		                <th>CI</th>
		                <th>Nombre</th>
		                <th>TELEFONO</th>
		                <th>SELECCIONAR</th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; 
$dest = array();
                        function agregar_lista($id)
                        {
                            array_push($dest,$id);
                            print_r($dest);
                        }
                        ?>
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
                            <input 
                            type="checkbox" 
                            name = "<?php echo $alumno['id_persona']?>"
                            onchange="agregar_lista(<?php echo $alumno['id_persona']?>)";
                                   >   
                            </td>
                           
                            
                        </tr>
		                <?php $cont++; ?>
		                <?php } ?>
		            </tbody>
             
		          </table>
               </div>
         </div>
                <div class="row">
            <div class="col-md-5">            
           </div>
                <div class="col-md-5">
            <input class='btn btn-default'  type='button' value='ATRAS' onclick='history.back()'> 
    <INPUT VALUE='ENVIAR' class='btn btn-success' TYPE='submit'>
                         
              
               
               </div> <?php echo form_close() ?>
               
                </div>
      </div>
      <div class="tab-pane fade" id="Padres">
       
      </div>
      
    </div>
  </div>
    