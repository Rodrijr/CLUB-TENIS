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
    <div class="col-lg-6">
        <div class="row-fluid">
              <div class="span4"> 
              </div>
              <div class="span4">
                  
                  
                  <h1> REGISTRAR ENTRENADOR</h1>
            <?php
               
                  
            ?>
              <?php $attributes = array('class'=>'bs exaple form-horizontal'); ?>
        <?php     if(isset($MSN))
                    {
                            echo"<div class='alert fade in'>";
							echo"<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                            echo"<strong>ALERTA!</strong> ";
							echo"<input  readonly='readonly' type='text_Rodri' name='numero' value='$MSN' style=' text-shadow: 0 0 0.2em #8F7; border:none; width:350px; height:30px'>";
                            echo "<font color='#FF0000'>";
                            echo validation_errors();
							echo"</font></div>"; 
                    }
                
                   
                  ?>
        <?php echo form_open('Entrenador_controller/registrar_entrenador'); ?>
               <fieldset>
                   <div class='control-group'>
                    <label class="col-lg-2 control-label">CI:<font color='#FF0000'>*</font></label>
                    <div class='controls'>                           
                        <INPUT TYPE='text' class="form-control" NAME='CI'
                               onkeypress='return validarNro(event)'
                               <?php if(isset($entrenador)) {  echo "value ='var_dump(".$entrenador['ci_entrenador'].")'"; 
                                    }
                               ?> maxlength='10'  required="required" 
                               pattern="[0-9]+" title="Ingrese numeros">
                        <BR>                                   
                    </div>
                </div>
                    <div class='control-group'>
                 <label  class="col-lg-2 control-label">NOMBRE:<font color='#FF0000'>*</font></label>
            <div class='controls'>                           
                <INPUT TYPE='text' class="form-control" NAME='NOMBRE' <?php  if(isset($entrenador)) {                           echo " value ='".$entrenador['nombre_entrenador']."'"; } ?>
                       onkeypress='return isNumberKey(event)' required="required" 
                       maxlength='35' required="required" maxlength="30" 
                       ><BR>
            </div>
        </div>
            <div class='control-group'>                            
            <div class='controls'>         
                 <label for="inputEmail" class="col-lg-2 control-label">APELLIDO:<font color='#FF0000'>*</font></label>
                <INPUT TYPE='text' class="form-control" NAME='APELLIDO' <?php  if(isset($entrenador)) {                     echo "value ='".$entrenador['apellido_entrenador']."'"; } ?>
                  onkeypress='return isNumberKey(event)' maxlength='35'
                  required="required" 
                       ><BR>
            </div>
        </div>
                   
        <div class='control-group'>
            <div class='controls'>
               <label class="col-lg-2 control-label"> TELEFONO:<font color='#FF0000'>*</font></label>
                <INPUT TYPE='text' class="form-control" NAME='TELEFONO' <?php  if(isset($entrenador)) {  echo " value ='".$entrenador['telefono']."'"; } ?>
                onkeypress='javascript:return validarNro(event)' maxlength='10'
                       pattern="[0-9]+" title="Ingrese solo Numeros" required="required" 
                       ><BR>
            </div>
        </div>
                   
        <div class='control-group'>
            <div class='controls'>
               <label class="col-lg-2 control-label"> DIRECCION:<font color='#FF0000'>*</font></label>
                <INPUT TYPE='text' class="form-control" NAME='DIRECCION' <?php  if(isset($entrenador)) {                        echo " value ='".$entrenador['ocupacion']."'"; } ?>  maxlength='50' 
                       required="required"  ><BR>
            </div>
        </div>                  
        
          <div class='control-group'>
                         <label for="inputEmail" class="col-lg-2 control-label">E-MAIL:<font color='#FF0000'  >*</font></label>
                        <div class='controls'>
                           
                            
                            <INPUT TYPE='email' class="form-control" NAME='EMAIL' <?php  if(isset($padre))                                      {  echo " value ='".$padre['email']."'"; } ?>
                                        maxlength='30'
                                    pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+" 
                                   placeholder = "ejemplo@hotmail.com"
                                   required="required"  title="ejemplo_email@hotmail.com"><BR>
                        </div>
                    </div>
                   
       
      
        <div class='control-group'>
        <div class='controls'>
                <input class='btn btn-default'  type='button' value='ATRAS' onclick='history.back()'> 
                <INPUT VALUE='INSERTAR' class='btn btn-success' TYPE='submit'><BR>

        </div>
        </div>
        
                </fieldset>
                  
        <?php echo form_close(); ?>
            </div>
            <div class="span4">    
              </div>
        </div>
    </div>
</div>