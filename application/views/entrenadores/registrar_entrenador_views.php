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
    <div class="row">
        <div class="col-lg-2">
        </div>
      <div class="col-lg-8">
        <div class="page-header">
          <h1 id="forms"> Registrar Entrenador</h1>
        </div>
      </div>
    </div>
      <div class="row">
          <div class="col-lg-3">
          </div>
      <div class="col-lg-5">
       
       
              <?php $attributes = array('class'=>'bs exaple form-horizontal');
           
                if(isset($MSN)&& !empty($MSN))
                {
                            echo"<div class='alert fade in'>";
							echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                            echo"<strong>ALERTA!</strong> ";
							echo"<input  readonly='readonly' type='text_Rodri' name='numero' value='$MSN' style=' text-shadow: 0 0 0.2em #8F7; border:none; width:350px; height:30px'>";
                            echo "<font color='#FF0000'>";
                            echo validation_errors();
							echo"</font></div>"; 
                    
                    if(strcmp( "El registro fue existoso" ,$MSN)==0)
                    {
                        $entrenador = array(
                        'ci_persona'=> '',
                        'nombre_persona' => '',
                        'apellido_persona' => '',
                        'telefono' => '*',
                        'celular' => '*',
                        'direccion' => '',
                        'email' => '',
                        'tipo' => 'Entrenador');
                    }
                }
            ?>
           </div>
    </div>  
     <div class="row">
          <div class="col-lg-2">
          </div>
      <div class="col-lg-7">
        <?php echo form_open('entrenador_controller/registrar_entrenador'); ?>
       <div class="row">
           <div class="col-lg-3">
          </div>
           <div class="col-lg-3">
          <span class="label label-warning">Los campos con * son OPCIONALES</span>
          </div>
        </div>
          <div class="row">
            <legend style="color:blue">Datos Personales</legend>
        <div class="col-lg-5">
              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">CI</button>
              </span>
              <input type="text" 
                     class="form-control"
                     required="required"
                     pattern="[0-9]+"                    
                     maxlength='7' 
                     title="Ingrese numeros"
                     onkeypress='return validarNro(event)'
                     NAME='CI' 
                     value = "<?php  if(isset($entrenador)) 
                        {  
                            echo $entrenador['ci_persona']; 
                        } 
                     ?>";
                     
                     >
            </div><!-- /input-group -->
          </div> 
        </div>
          <div class="row">
              <br>
          <div class="col-lg-5">
              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Nombre</button>
              </span>
              <input type="text" 
                     class="form-control"
                     onkeypress='return isNumberKey(event)' 
                     required="required" 
                     maxlength='35'
                     NAME='NOMBRE' 
                     <?php  if(isset($entrenador)) 
                        {  
                            echo " value ='".$entrenador['nombre_persona']."'"; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div> 
          <div class="col-lg-5">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">apellido</button>
              </span>
              <input type="text" 
                     class="form-control"
                     required="required"
                     onkeypress='return isNumberKey(event)' 
                     maxlength='35'
                     NAME='APELLIDO' 
                     <?php  if(isset($entrenador)) 
                        {  
                            echo " value ='".$entrenador['apellido_persona']."'"; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div>  
        </div>  
          <div class="row">
              <br>
            <legend style="color:blue">Contacto</legend>
              
               
        <div class="col-lg-5">
              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Celular</button>
              </span>
              <input type="text" 
                     class="form-control"
                     pattern="[0-9]+"                    
                     maxlength='8' 
                     required="required"
                     title="Ingrese numeros"
                     onkeypress='return validarNro(event)'
                     NAME='CELULAR1' 
                     <?php  if(isset($entrenador)) 
                        {  
                         $cel = explode ('*', $entrenador['celular']);
                            echo 'value ="'.$cel[0].'"'; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div> 
        <div class="col-lg-5">              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Celular *</button>
              </span>
              <input type="text" 
                     class="form-control" 
                     pattern="[0-9]+"                    
                     maxlength='8' 
                     title="Ingrese numeros"
                     onkeypress='return validarNro(event)'
                     NAME='CELULAR2' 
                     <?php  if(isset($entrenador)) 
                        {  
                             echo 'value ="'.$cel[1].'"'; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div> 
          </div>
          <div class="row">
              <br>
        <div class="col-lg-5">
              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Telefono</button>
              </span>
              <input type="text" 
                     class="form-control"
                     pattern="[0-9]+"                    
                     maxlength='7' 
                     title="Ingrese numeros"
                     onkeypress='return validarNro(event)'
                     NAME='TELEFONO1' 
                     <?php  if(isset($entrenador)) 
                        {  
                         $tel = explode ("*", $entrenador['telefono']);
                            echo " value ='".$tel[0]."'"; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div> 
        <div class="col-lg-5">              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Telefono *</button>
              </span>
              <input type="text" 
                     class="form-control"
                     pattern="[0-9]+"                    
                     maxlength='7' 
                     title="Ingrese numeros"
                     onkeypress='return validarNro(event)'
                     NAME='TELEFONO2' 
                     <?php  if(isset($entrenador)) 
                        {  
                             echo " value ='".$tel[1]."'"; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div> 
   
        
          </div>
          <div class="row"> <br>
          <div class="col-lg-5">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">e-mail</button>
              </span>
              <input type="text" class="form-control"
                     placeholder = "ejemplo@hotmail.com"
                     required="required"
                     pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+"
                     maxlength='30'
                     NAME='EMAIL' 
                     <?php  if(isset($entrenador)) 
                        {  
                            echo " value ='".$entrenador['email']."'"; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">direccion</button>
              </span>
              <input type="text" 
                     class="form-control"
                     maxlength='50' 
                     required="required"
                     NAME='DIRECCION' 
                     <?php  if(isset($entrenador)) 
                        {  
                            echo " value ='".$entrenador['direccion']."'"; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div>
          </div>
           <div class="row">
              <br>
            <legend style="color:blue">Cuenta de Usuario</legend>
              
               <div class="col-lg-1">
               </div>
        <div class="col-lg-4">
              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Usuario</button>
              </span>
              <input type="text" 
                     class="form-control"
                     required="required"
                     maxlength='12' 
                      pattern="[a-zA-Z0-9.+_-]+"
                     NAME='LOGIN' 
                     <?php  if(isset($usuario)) 
                        {  
                            echo 'value ="'. $usuario['login'].'"'; 
                        } 
                     ?>
                     >
            </div><!-- /input-group -->
          </div> 
        <div class="col-lg-5">
              
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Contraseña</button>
              </span>
              <input type="password" 
                     class="form-control"
                     required="required"
                     maxlength='30' 
                     pattern="[a-zA-Z0-9.-]+"
                     NAME='CONTRACENA' 
                     
                     >
            </div><!-- /input-group -->
          </div>           
          </div>      
          
          
          
          <div class="row"><br>
          <div class="col-lg-2">
          </div>
          <div class="col-lg-3">
             <button type="button" class="btn btn-primary btn-lg btn-block" onclick='history.back()'>ATRAS</button>
          </div>
          <div class="col-lg-3">
              <button type="submit" class="btn btn-default btn-lg btn-block">REGISTRAR</button>
          </div>
          </div>
          
        
             <br><br><br>
        <?php echo form_close(); ?>
          
        </div>
          </div>
 </div><!-- div row -->
