
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
            </div><br>
            <div class="row">
            <div class="col-md-2">            
           </div>
            <div class="col-md-6">            
          
                <?php echo form_open('Notificacion_controller/enviar_notificacion'); 

               
                foreach($grupos as $grupo)
                {  
                    $nombres1 = explode("*", "".key($grupo));               
                    foreach($grupo as $subgrupo)
                    { $count= 1;
                        if($count ==1)
                        {

                        echo "<h2>".$nombres1[0]."</h2>";             

                        }
               
                        echo "<h2>".$nombres1[1]."</h2>";
             ?>
                    
                         <table class="table table-bordered" 
                                >
                        <thead>
                              <tr>		                
                                <th>Nombre</th>
                                <th>SELECCIONAR</th>
                              </tr>
                            </thead>
                            <tbody>
                <?php
                       foreach($subgrupo as $alumno)
                       {
                         ?><tr>
                        <td><?php
                            echo $alumno['nombre_persona'];
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
      
    </div>
  </div>
    