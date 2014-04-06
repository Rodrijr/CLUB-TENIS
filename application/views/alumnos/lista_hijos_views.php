
 <div class="row-fluid">
                         
                          <div class="span7">
                              
                              
                              <h1> Lista de Hijos </h1>
                    
                          <?php $attributes = array('class'=>'bs exaple form-horizontal'); ?>
                    <?php     if(isset($MSN))
                                {
                                        echo"<div class='alert fade in'>";
										echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
										echo"<strong>ALERTA!</strong> <input  readonly='readonly' type='text_Rodri' name='numero' value='$MSN' style=' text-shadow: 0 0 0.2em #8F7; border:none; width:350px; height:30px'>";
                             echo validation_errors(); 
										echo"</div>"; 
                                }                 
                              ?>
                        <?php echo form_open('Alumnos_controller/ver_lista_hijos'); ?>
                           <fieldset>
                         <div class="bs-example bs-example-tabs">
                            <ul id="myTab" class="nav nav-tabs">

                               <?php 
                                       if(isset($lista_hijos))
                                       {
                                           foreach($lista_hijos as $Hijo)
                                           {   ?>         
                                               
                     <li class="">
                         <a href='#<?php echo $Hijo["nombre_persona"]; ?>' data-toggle="tab">
                             <font><font>
                                 <?php echo $Hijo['nombre_persona']; ?>
                            </font></font>
                         </a>
                    </li>
                                               
                                <?php    
                                           }                                   
                                       } 




                                ?>
								 </ul> 
                            
                              
                              
						
    <div id="myTabContent" class="tab-content">	 
							 <?php 
                                       if(isset($lista_hijos))
                                       {
                                           foreach($lista_hijos as $Hijo)
                                           {   ?>         
                                               
		
		 <div class="tab-pane fade" id='<?php echo $Hijo["nombre_persona"]; ?>'>
        		<?php			 			
				echo $Hijo['ci_persona'];
				echo $Hijo['nombre_persona'];
                echo $Hijo['apellido_persona'];
			 	echo $Hijo['telefono'];
			 	?>
      </div>
                    
                                               
                                <?php    
                                           }                                   
                                       } 




                                ?>
 
     
     
      
    </div>
  </div>
							 </fieldset>
                    <?php echo form_close(); ?>
                        </div>
                        <div class="span4">    
                          </div>
                    </div>
