
     <div class="container">
    <ul id="myTab" class="nav nav-pills">
        <?php
            foreach ($lista as $hijo)
            {
                echo '<li class=""><a href="#'.$hijo['ci_persona'].'" data-toggle="tab">'.$hijo['nombre_persona']. '</a></li>';
            }
        ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        
        <?php 
            foreach ($lista as $hijo)
            {
                echo  '<div class="tab-pane fade" id="'.$hijo['ci_persona'].'">' ;
                ?>
     
       
    <div class="container">
             <div class="col-lg-3"> 
                 <div class="row">
    <a href="" class="thumbnail">        
        <img src="<?php echo base_url(); ?>imagenes\<?php echo $hijo['ci_persona'];  ?>.jpg" aling ="center" width="270px" height="190px"/>
    </a>
           </div>
  </div>
         

            <div class="col-lg-6">
                  <fieldset>
    <legend><H3><label ></label></H3> </legend>
                 <?php echo form_open(base_url().'index.php/Alumno_controller/modificar_perfil/'.$hijo['id_persona']); ?>
                <H3><label >ES EL PERFIL DE:</label></H3>
                      <h1> 
                   
                <?php
                    if(isset($hijo))
                    {
                        echo "<font color='#386CC4'>";
                        echo $hijo['nombre_persona']."  ";
                        echo $hijo['apellido_persona'];
                        echo "</font>";                       
                ?>
                </h1>                 
                  <h3>
                         <fieldset>
                    <div class='control-group'>
                        <label >CI:
                            <font color='#386CC4'>
                        <?php 
                           echo $hijo['ci_persona']; 
                        ?>
                            </font>
                        </label><br>                
                   
                        <label >TELEFONO:
                             <font color='#386CC4'>
                        <?php
                          $telefono = explode('*',$hijo['telefono']);
                           echo $telefono[0];
                             if(isset($telefono[1]) && !empty($telefono[1]))
                             {
                                 echo " || ".$telefono[1];
                             }
                        ?>
                            </font>
                        </label><br>
                        <label >CELULAR:
                             <font color='#386CC4'>
                        <?php
                        if(isset($persona['celular']))
                        {
                            $celular = explode('*',$hijo['celular']);
                           echo $celular[0];
                            if(isset($celular[1]) && !empty($telefono[1]))
                             {echo " || ".$celular[1];
                             }
                        }
                        ?>
                            </font>
                        </label><br>
                   
                        <label >DIRECCION:
                             <font color='#386CC4'>
                        <?php
                            echo $hijo['direccion']; 
                        ?>
                             </font>
                        </label><br>
                   
                        
                    </div>  
                       </fieldset>
                      </h3> 
                <?php
                    } // if(isset($hijo)) close
                ?>
                  </fieldset>
                
                 <div class='control-group'>
                    <div class='controls'>
                            <input class='btn btn-default'  type='button' 
                                   value='CANCELAR' onclick='history.back()'> 
                            <INPUT VALUE='Modificar' class='btn btn-success' TYPE='submit'><BR>

                    </div>
                    </div>
                <br>
                <br>
  
                <?php echo form_close(); ?>
                       
        
    </div>

         
         
         
         <!-- BOTONOES LATERALES -->
            <div class="col-lg-2">
            
                    <div class="btn-group-vertical">
<a type="button" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_objetivos_de_jugador/<?php echo $hijo['id_persona']?>" class="btn btn-success">Objetivos De Jugador</a>
<a type="button" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_perfil_de_jugador/<?php echo $hijo['id_persona']?>" class="btn btn-info">Perfil De Jugador</a>
<a type="button" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_evaluacion_personal/<?php echo $hijo['id_persona']?>" class="btn btn-warning">Evaluación Personal</a>
                        
<!-- <button class="btn btn-primary" data-toggle="modal" >planilla de asistencia</button>-->
<!-- <button class="btn btn-primary" data-toggle="modal" >kardex</button>-->
                    </div>
    
            </div>
        
         </div>  
        
        
                <?php
                echo  '</div>';
            }
            
        ?>        
  </div>
         </div>
