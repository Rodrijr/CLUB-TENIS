








    <ul id="myTab" class="nav nav-pills">
      <li class="active"><a href="#perfil" data-toggle="tab">Perfil</a></li>
      
      <li class="dropdown">
        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Modificar <b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
          <li><a href="#dropdown1" tabindex="-1" data-toggle="tab">Modificar Perfil</a></li>
          <li><a href="#dropdown2" tabindex="-1" data-toggle="tab">Cambiar Contraceña</a></li>
        </ul>
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="perfil">
     <div class="container">
     <div class="col-lg-3">   
         
         <div class="row">
  
    <a href="" class="thumbnail">
      <img data-src="C:\wamp\www\EscuelaTenisCbba\application\imagenes\silhouette.jpeg/100%x180" >
    </a>
  </div>
         </div>

        <div class="row-fluid">
            <div class="col-lg-5">
                  <fieldset>
    <legend><H3><label >SU PERFIL</label></H3> </legend>
                 <?php echo form_open(''); ?>
                <H3><label >SU NOMBRE ES:</label></H3>
                      <h1> 
                   
                <?php
                    if(isset($persona))
                    {
                        echo "<font color='#386CC4'>";
                        echo $persona['nombre_persona']."  ";
                        echo $persona['apellido_persona'];
                        echo "</font>";                       
                ?>
                </h1>                 
                  <h3>
                         <fieldset>
                    <div class='control-group'>
                        <label >CI:
                            <font color='#386CC4'>
                        <?php 
                           echo $persona['ci_persona']; 
                        ?>
                            </font>
                        </label><br>                
                   
                        <label >TELEFONO:
                             <font color='#386CC4'>
                        <?php
                           echo $persona['telefono'];
                        ?>
                            </font>
                        </label><br>
                   
                        <label >DIRECCION:
                             <font color='#386CC4'>
                        <?php
                            echo $persona['direccion']; 
                        ?>
                             </font>
                        </label><br>
                   
                        <label >EMAIL:
                             <font color='#386CC4'>
                        <?php 
                           echo $persona['email']; 
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
     
      <div class="tab-pane fade" id="dropdown1">
         <div class="container">
             <div class="col-lg-3">   
         
         
         </div>
     <div class="col-lg-4">   
                 
         
                    <?php echo form_open('Persona_controller/modificar_mi_perfil'); 
                        if(isset($persona))
                        {
                    ?>
         <fieldset>
    <legend><H3><label >MODIFICAR PERFIL</label></H3>
            
                        </legend>
                    <div class="input-group">
                      <span class="input-group-addon"><label>CI</label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['ci_persona'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='10'
                             name ="CI"
                      >
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon"><label>NOMBRE    </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['nombre_persona'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='10'
                             name ="NOMBRE"
                      >
                    </div>                    <div class="input-group">
                      <span class="input-group-addon"><label>APELLIDO  </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['apellido_persona'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='10'
                             name ="APELLIDO"
                      >
                    </div>                    <div class="input-group">
                      <span class="input-group-addon"><label>TELEFONO  </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['telefono'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='10'
                             name ="TELEFONO"
                      >
                    </div>                    <div class="input-group">
                      <span class="input-group-addon"><label>DIRECCION </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['direccion'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='10'
                             name ="DIRECCION"
                      >
                    </div>        <div class="input-group">
                      <span class="input-group-addon"><label>E-MAIL    </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['email'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='10'
                             name ="EMAIL"
                      >
                    </div>
          <BR>
                    <div class='control-group'>
                    <div class='controls'>
                            <input class='btn btn-default'  type='button' 
                                   value='CANCELAR' onclick='history.back()'> 
                            <INPUT VALUE='GUARDAR' class='btn btn-success' TYPE='submit'><BR>

                    </div>
                    </div>
                            </fieldset>
                    <?php } echo form_close(); ?>
          
      </div>
             </div>
          </div>
      <div class="tab-pane fade" id="dropdown2">
     
           
           <div class="container">
             <div class="col-lg-3">   
         
         
         </div>
     <div class="col-lg-4">   
                 
         
                    <?php echo form_open('Persona_controller/cambiar_contraceña'); 
                        if(isset($persona))
                        {
                    ?>
         <fieldset>
    <legend><H3><label >MODIFICAR PERFIL</label></H3></legend>
               <div class="input-group">
                      <span class="input-group-addon"><label>ACTUAL</label></span>
                      <input type="text" class="form-control"
                             name ="ACTUAL"
                      >
                    </div>
          <div class="input-group">
                      <span class="input-group-addon"><label>NUEVA</label></span>
                      <input type="text" class="form-control" 
                             name ="NUEVA1"
                      >
                    </div>
           <div class="input-group">
                      <span class="input-group-addon"><label>REPITA</label></span>
                      <input type="text" class="form-control" 
                             
                             name ="NUEVA2"
                      >
                    </div>
             <BR>
                    <div class='control-group'>
                    <div class='controls'>
                            <input class='btn btn-default'  type='button' 
                                   value='CANCELAR' onclick='history.back()'> 
                            <INPUT VALUE='CAMBIAR' class='btn btn-success' TYPE='submit'><BR>

                    </div>
                    </div>
             </fieldset>
               <?php } echo form_close(); ?>
             </div>
         </div>
      </div>
    </div>







