 <div class="tab-pane fade in <?php echo $perfil;?>" id="perfil">
     <div class="container">
        <div class="row-fluid">
            <div class="col-lg-5">
                  <fieldset>
   
                 <?php echo form_open_multipart(''); ?>
                <H3><label >GRUPO</label></H3>
                      <h1> 
                   
                <?php
                    if(isset($grupo))
                    {
                        echo "<font color='#386CC4'>";
                        echo $grupo['nombre_grupo']."  ";
                        echo "</font>";                       
                ?>
                </h1>                 
                  <h3>
                    <fieldset>
                              
                    <div class='control-group'>
                         <label >ENCARGADO:
                             <font color='#386CC4'>
                        <?php
                           echo $persona['nombre_persona'];
                           echo $persona['apellido_persona'];
                        ?>
                            </font>
                        </label><br>
                    </div>
                        
                        
                    <div class='control-group'>
                        <label >HORARIOS:
                            <font color='#386CC4'>
                        <?php 
                          foreach($horarios as $horario)
                          {
                            echo $horario['horario']; 
                          }
                        ?>
                            </font>
                        </label><br>       
                        
                    </div>  
                    </fieldset>
                  </h3> 
                <?php
                        } // if(isset($persona)) close
                ?>
                  </fieldset>
  
                <?php echo form_close(); ?>
                       
        </div>
    </div>  
          </div>  
      </div>