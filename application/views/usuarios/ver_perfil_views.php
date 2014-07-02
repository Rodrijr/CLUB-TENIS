<script language="javascript">

    function validarNro(e) {

        var key;

        if(window.event) // IE

        {

            key = e.keyCode;

        }

        else if(e.which) // Netscape/Firefox/Opera

        {

            key = e.which;

        }

        if (key < 48 || key > 57)

        {

            if(key == 46 || key == 8 ) // Detectar . (punto) y backspace (retroceso)

            { return true; }
            else 
            { return false; }

        }

        return true;

    }


    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return true;
 
        return false;
    }

</script>

<div class="container">
    <ul id="myTab" class="nav nav-pills">
      <li class="<?php echo $perfil; ?>"><a href="#perfil" data-toggle="tab">Perfil</a></li>
      
         <li class ="<?php echo $modificarPerfil; ?>"><a href="#modificarPerfil" tabindex="-1" data-toggle="tab">Modificar Perfil</a></li>
          <li class ="<?php echo $contracenia; ?>"><a href="#contracenia" tabindex="-1" data-toggle="tab">Cambiar Contraseña</a></li>
        
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in <?php echo $perfil;?>" id="perfil">
     <div class="container">
     <div class="col-lg-3">   
         
         <div class="row">
  <?php if(isset($persona))
                    {
                       ?>
    <img src="<?php echo base_url(); ?>imagenes\<?php echo $persona['ci_persona']; } ?>.jpg" alt="" width="250" height="270"  class="img-thumbnail"/>
  </div>
         </div>

        <div class="row-fluid">
            <div class="col-lg-5">
                  <fieldset>
    <legend><H3><label >SU PERFIL</label></H3> </legend>
                 <?php echo form_open_multipart(''); ?>
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
                         $telefono = explode('*',$persona['telefono']);
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
                            $celular = explode('*',$persona['celular']);
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
  <br><br>
                <?php echo form_close(); ?>
                       
        </div>
    </div>  
          </div>  
      </div>
       

      <div class="tab-pane fade in <?php echo $modificarPerfil;?>" id="modificarPerfil">
         <div class="container">
             <div class="col-lg-4">   
         <?php 
   ?>
     <div class="row">
         
  <?php if(isset($persona))
        { echo   form_open_multipart('Persona_controller/do_Upload','class="form-horizontal"'); 
  ?>
         
        
         
         
         
    <img src="<?php echo base_url(); ?>imagenes\<?php echo $persona['ci_persona'];  ?>.jpg" aling ="center" alt="" width="250" height="270"  class="img-thumbnail"/>
<br><br><br>
         
         <?php 
         $tipo = $this->session->userdata('tipo_usuario');
         if($tipo != "Alumno")
         {
             
         ?>
<input type="file" name="userfile" />
         <br><br>
<input type="submit" value="CAMBIAR FOTO" class ="btn btn-default btn-lg btn-block"/>
         <?php 
         }
         ?>
         </div>
                 <?php  echo form_close(); }
                 if(isset($MSN1)&& !empty($MSN1))
                {
                    echo"<div class='panel panel-danger'>";
							echo '<div class="panel-heading">';
                            echo' <h3 class="panel-title">ALERTA!</h3></div>';
							echo"<div class='panel-body'><input  readonly='readonly' type='text_Rodri' name='numero' value='$MSN1' style=' border:none; width:350px; height:30px'>";
                            
							echo" </div></div>"; 
                }
                 ?>
         </div>
     <div class="col-lg-6">   
                 
         
                    <?php 
                        if(isset($persona))
                        {
                        echo form_open('Persona_controller/modificar_mi_perfil/'.$persona['ci_persona'].""); 
                         
                    ?>
         <fieldset>
    <legend><H3><label >MODIFICAR PERFIL</label></H3></legend>
            <?php if(isset($MSN))
                            {
                               if(isset($tipo1)){
                               echo '<div class="'.$tipo1.'">';
     echo  '<div class="panel-heading">';
     echo   ' <h3 class="panel-title">ALERTA!</h3>';
      echo '</div>';
      echo '<div class="panel-body">';
       echo "<label>".$MSN."</label>";
       echo '</div>';
     echo '</div>';
                         
                        } 
                            }?>
                    <div class="input-group">
                      <span class="input-group-addon"><label>CI</label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['ci_persona'];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='7'
                             pattern="[0-9]+" title="Ingrese solo Numeros" required="required" 
                             name ='CI'>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon"><label>NOMBRE    </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['nombre_persona'];?>"
                             onkeypress='return isNumberKey(event)'
                             maxlength='35' DISABLED
                             name ='NOMBRE'>
                    </div>                    <div class="input-group">
                      <span class="input-group-addon"><label>APELLIDO  </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['apellido_persona'];?>"
                              onkeypress='return isNumberKey(event)'
                             maxlength='35' DISABLED
                             required="required"
                             name ='APELLIDO'>
                    </div>     
             
             
              <div class="row">
                <div class="col-lg-6">
                 <div class="input-group">
                    <span class="input-group-addon">
                        <label>TELEFONO  </label>
                    </span>
                      <input type="text" class="form-control" 
                             value="<?php
                             $telefono = explode('*',$persona['telefono']);
                            echo $telefono[0];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='7'
                             pattern="[0-9]+" 
                             title="Ingrese solo Numeros" 
                             
                             name ='TELEFONO1'>
                    </div>  
                    </div>                 
                 <div class="col-lg-6">
                 <div class="input-group">
                    <span class="input-group-addon">
                        <label>TELEFONO  </label>
                    </span>
                      <input type="text" class="form-control" 
                             value="<?php 
                            if(isset($telefono[1]))
                            {
                            echo $telefono[1];
                            }?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='7'
                             pattern="[0-9]+" 
                             title="Ingrese solo Numeros" 
                             name ='TELEFONO2'>
                    </div>  
                    </div>
                </div>
             <div class="row">
                <div class="col-lg-6">
                 <div class="input-group">
                    <span class="input-group-addon">
                        <label>CELULAR  </label>
                    </span>
                      <input type="text" class="form-control" 
                             value="<?php 
                            $celular = explode('*',$persona['celular']);
                            echo $celular[0];?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='8'
                             <?php if(strcmp($persona['tipo'],"Entrenador"))
                            {
                                echo 'required="required"';
                            }?>
                             pattern="[0-9]+" 
                             title="Ingrese solo Numeros" 
                             name ='CELULAR1'>
                    </div>  
                    </div>                 
                 <div class="col-lg-6">
                 <div class="input-group">
                    <span class="input-group-addon">
                        <label>CELULAR  </label>
                    </span>
                      <input type="text" class="form-control" 
                             value="<?php 
                            if(isset($celular[1]))
                            {
                            echo $celular[1];
                            }?>"
                             onkeypress ='return validarNro(event)'
                             maxlength='8'
                             pattern="[0-9]+" 
                             title="Ingrese solo Numeros" 
                             name ='CELULAR2'>
                    </div>  
                    </div>
                </div>  
             
             
             
             
             <div class="input-group">
                      <span class="input-group-addon"><label>DIRECCION </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['direccion'];?>"
                             maxlength='50'
                             title="Solo se aceptan letras" required="required"
                             name ='DIRECCION'>
                    </div>        <div class="input-group">
                      <span class="input-group-addon"><label>E-MAIL    </label></span>
                      <input type="text" class="form-control" 
                             value="<?php echo $persona['email'];?>"
                             maxlength='30'
                             pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+" 
                             placeholder = "ejemplo@hotmail.com"
                             required="required"
                             name ='EMAIL'>
                    </div>
          <BR>
                    <div class='control-group'>
                    <div class='controls'>
                            <input class='btn btn-default btn-lg btn-block'                                        type='button' 
                                   value='CANCELAR' onclick='history.back()'> 
                            <INPUT VALUE='GUARDAR CAMBIOS' class='btn btn-default btn-lg btn-block' TYPE='submit'><BR>

                    </div>
                    </div>
                            </fieldset>
         <br><br>
                    <?php } echo form_close(); ?>
          
      </div>
             </div>
          </div>
      <div class="tab-pane fade in <?php echo $contracenia;?>" id="contracenia">
     
           
           <div class="container">
             <div class="col-lg-3">   
         
         
         </div>
     <div class="col-lg-4">   
                 
         
                    <?php 
                        if(isset($persona))
                        {
                            echo form_open('Persona_controller/cambiar_contracena/'.$persona['id_persona']); 
                            
                           
                    ?>
         <fieldset>
    <legend><H3><label >CAMBIAR CONTRASEÑA </label></H3></legend>
             
             <?php if(isset($MSN))
                    {
                        if(isset($tipo1)){
    echo '<div class="panel panel-'.$tipo1.'">';
     echo  '<div class="panel-heading">';
     echo   ' <h3 class="panel-title">ALERTA!</h3>';
      echo '</div>';
      echo '<div class="panel-body">';
       echo "<label><p>".$MSN."</p></label>";
       echo '</div>';
     echo '</div>';
                            
                            
                            
                        } 
                            }?>
               <div class="input-group">
                      <span class="input-group-addon"><label>ACTUAL</label></span>
                      <input type="password" class="form-control"
                             name ="ACTUAL"
                      >
                    </div>
          <div class="input-group">
                      <span class="input-group-addon"><label>NUEVA</label></span>
                      <input type="password" class="form-control" 
                             name ="NUEVA1"
                      >
                    </div>
           <div class="input-group">
                      <span class="input-group-addon"><label>REPITA</label></span>
                      <input type="password" class="form-control"                              
                             name ="NUEVA2"
                      >
            </div>
             <BR>
                    <div class='control-group'>
                    <div class='controls'>
                            <input class='btn btn-default'  type='button' 
                                   value='CANCELAR' onclick='history.back()'> 
                            <INPUT VALUE='GUARDAR CAMBIOS' class='btn btn-default btn-lg btn-block' TYPE='submit'><BR>

                    </div>
                    </div>
             </fieldset><br>
         <br>
               <?php  } echo form_close(); ?>
             </div>
         </div>
      </div>
    </div>


</div>




