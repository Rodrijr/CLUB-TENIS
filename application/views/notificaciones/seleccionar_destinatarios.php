
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
           	<?php echo form_open('Notificacion_controller/buscar_grupos'); ?>
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
		                
		                <th>Nombre</th>
		                <th>SELECCIONAR</th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; 
                        
                        ?>
		            	<?php	foreach($grupos as $grupo){ ?>
		            	<!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
		                <tr>
		                    <td style="min-width: 0px; max-width: 10%">
                            <?php echo $grupo['nombre_grupo']; ?></td>
	                      
                            <td style="min-width: 0px; max-width: 1%">
                       
                            <input 
                                type="checkbox" 
                                id="<?php echo $grupo['id_grupo']; ?>" 
                                name="destinatarios[]"                          
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
    