
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
       
        

    <img src="<?php echo base_url(); ?>imagenes\<?php echo $hijo['ci_persona'];  ?>.jpg" alt="" width="250" height="270"  class="img-thumbnail"/>
    </a>
  </div>
         </div>

        <div class="row-fluid">
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
                           echo $hijo['telefono'];
                        ?>
                            </font>
                        </label><br>
                        <label >CELULAR:
                             <font color='#386CC4'>
                        <?php
                           echo $hijo['celular'];
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
    </div>  
         
         
         
         <!-- BOTONOES LATERALES -->
            <div class="col-lg-2">
            
                    <div class="btn-group-vertical">
<a type="button" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_objetivos_de_jugador/<?php echo $hijo['id_persona']?>" class="btn btn-success">objetivos de jugador</a>
<a type="button" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_perfil_de_jugador/<?php echo $hijo['id_persona']?>" class="btn btn-info">perfil del jugador</a>
<a type="button" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_evaluacion_personal/<?php echo $hijo['id_persona']?>" class="btn btn-warning">evaluacion personal</a>
                        
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
