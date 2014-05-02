
     <div class="container">
        <div class="row-fluid">
            <div class="col-lg-6">
                  <fieldset>
   
                <?php echo form_open_multipart(''); ?>
                <H3><label >ES EL GRUPO:</label></H3>
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
                         <label >Descripcion:
                             <font color='#386CC4'>
                        <?php
                           echo $grupo['descripcion_grupo'];
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