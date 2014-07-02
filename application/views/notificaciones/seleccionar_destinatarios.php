<div class="container">
        <div class="row"><br>  
            </div><br>
            <div class="row">
            <div class="col-md-2">            
           </div>
            <div class="col-md-6">            
          
                <?php echo form_open('notificacion_controller/enviar_notificacion'); 

               
                foreach($grupos as $grupo)
                {  
                    $nombres1 = explode("*", "".key($grupo));               
                    foreach($grupo as $subgrupo)
                    { $count= 1;
                        if($count ==1)
                        {
                        echo "<h4>".$nombres1[0]."</h4>";             

                        }
               
                        echo "<h5>".$nombres1[1]."</h5>";
             ?>
                    
                         <table class="table table-bordered" 
                                >
                        <thead>
                              <tr>		                
                                <th style="min-width: 0px; max-width: 40%">Nombre</th>
                                <th style="min-width: 0px; max-width: 100px">
                                    <input id="grupos" name="grupos[]" value="<?php echo $nombres1[2];   ?>" type="checkbox"> Todos
                                  
                                </th>
                              </tr>
                            </thead>
                <?php
                       foreach($subgrupo as $alumno)
                       {
                         ?><tr>
                        <td><?php
                            echo $alumno['nombre_persona']." ".$alumno['apellido_persona'];
                            ?>
                        </td>
                        <td><?php
                            echo '<input id="id_alumno" name="destinatarios[]" value="'.$alumno['ci_persona'].'" type="checkbox">';
                            ?>
                        </td>
                        </tr>
                        <?php
                       }
                        $count = $count +1;?>
                     </table> <?php
                    }
                    ?>
		          <?php 
                }
                ?>
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
      

    