<div class="container">
    
	<div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="well">
          <?php $attributes = array('class' => 'bs-example form-horizontal'); ?>
            
            <fieldset>
          <?php echo form_open('Sesion_controller/verificar_login', $attributes);?>       
            
            
              <legend>Autentificarse</legend>

              <div class="form-group">
                <label class="col-lg-2 control-label">Usuario</label>
                <div class="col-lg-10">
                	<div class="input-group">
                  	<input type="text" class="form-control" id="inputNombre" name="username" placeholder="Nombre de usuario" required="required" maxlength="30">
                  	<span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label" >Contraseña</label>
                <div class="col-lg-10">
                  <div class="input-group">
                      <input type="password" class="form-control" id="inputpassword" name="password" placeholder="Contraseña" required="required" maxlength="50">
                      <span class="input-group-addon"> <span class="glyphicon glyphicon-qrcode"></span> </span>               
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-offset-2 control-label" >
                  <?php 
                    if(isset($error))
                      echo '<p class="text-warning">Login o Contraseña Incorrectos...</p>'                  
                  ?>
                </label> 
              </div>

             
                <div class="col-lg-10 col-lg-offset-2">
                
                  <button type="submit" class="btn btn-primary">Ingresar</button> 
                   <button class="btn btn-default" type="reset" >Cancelar</button>
                    
                </div>
             
            
           
          <?php echo form_close();?>
             
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2"><br>
                 <a href="<?php echo base_url(); ?>index.php/Padres_controller/registrar_padre_codigo"> 
                    <button class="btn btn-warning"  >Registrarse</button>
                  </a> 
                </div></div>
            </fieldset>
	      </div>
	    </div>
	  </div>
	</div>
</div>
