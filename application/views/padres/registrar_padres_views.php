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
              
                    <div class="row-fluid">
                          <div class="span4"> 
                          </div>
                          <div class="span4">
                              
                              
                              <h1> REGISTRAR PADRE</h1>
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
                    <?php echo form_open('Padre_controller/registrar_padre'); ?>
                           <fieldset>
                               <div class='control-group'>
                                <label class="col-lg-2 control-label">CI:<font color='#FF0000'>*</font></label>
                                <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" NAME='CI' onkeypress='return validarNro(event)' 
                                           

                                           <?php if(isset($padre)) {  echo "value ='".$padre['ci_persona']."'"; 
                                                }
                                           ?> maxlength='10'>
                                    <BR>                                   
                                </div>
                            </div>
                                <div class='control-group'>
                             <label  class="col-lg-2 control-label">NOMBRE:<font color='#FF0000'>*</font></label>
                        <div class='controls'>                           

                            <INPUT TYPE='text' class="form-control" NAME='NOMBRE' <?php  if(isset($padre)) {  echo "                                                     value ='".$padre['nombre_persona']."'"; } ?> onkeypress='return isNumberKey(event)' maxlength='35'><BR>

                        </div>
                    </div>
                        <div class='control-group'>                            
                        <div class='controls'>         
                             <label for="inputEmail" class="col-lg-2 control-label">APELLIDO:<font color='#FF0000'>*</font></label>

                            <INPUT TYPE='text' class="form-control" NAME='APELLIDO' <?php  if(isset($padre)) {  echo "                                                     value ='".$padre['apellido_persona']."'"; } ?> onkeypress='return isNumberKey(event)' maxlength='35'><BR>

                        </div>
                    </div>
                               
                    <div class='control-group'>
                        <div class='controls'>
                           <label class="col-lg-2 control-label"> TELEFONO:<font color='#FF0000'>*</font></label>
                            <INPUT TYPE='text' class="form-control" NAME='TELEFONO' <?php  if(isset($padre)) {  echo "                                                     value ='".$padre['telefono']."'"; } ?>  onkeypress='javascript:return validarNro(event)' maxlength='10'><BR>
                        </div>
                    </div>
                               
                    <div class='control-group'>
                        <div class='controls'>
                           <label class="col-lg-2 control-label"> DIRECCION:<font color='#FF0000'>*</font></label>

                            <INPUT TYPE='text' class="form-control" NAME='DIRECCION' <?php  if(isset($padre)) {  echo " value ='".$padre['direccion']."'"; } ?>  maxlength='50' onkeypress='return isNumberKey(event)'><BR>

                        </div>
                    </div>                  
                    
                    <div class='control-group'>
                        <div class='controls'>
                            <label for="inputEmail" class="col-lg-2 control-label">E-MAIL:<font color='#FF0000'>*</font></label>
                            
                            <INPUT TYPE='text' class="form-control" NAME='EMAIL' <?php  if(isset($padre)) {  echo "                                                     value ='".$padre['email']."'"; } ?> maxlength='30' ><BR>
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
