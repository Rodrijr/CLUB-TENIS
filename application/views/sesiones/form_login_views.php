<div class="container">
	<div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-6">
        <div class="well">
          <?php $attributes = array('class' => 'bs-example form-horizontal'); ?>
          <?php echo form_open('Sesion_controller/verificar_login', $attributes);?>          
            <fieldset>
              <legend>Autentificarse</legend>

              <div class="form-group">
                <label class="col-lg-2 control-label">Usuario</label>
                <div class="col-lg-10">
                	<div class="input-group">
                  	<input type="text" class="form-control" id="inputNombre" name="username" placeholder="Correo o nombre de usuario" required="required">
                  	<span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-2 control-label" >Contraseña</label>
                <div class="col-lg-10">
                  <div class="input-group">
                      <input type="password" class="form-control" id="inputpassword" name="password" placeholder="Contraseña" required="required">
                      <span class="input-group-addon"> <span class="glyphicon glyphicon-qrcode"></span> </span>               
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-offset-2 control-label" >
                  <?php 
                    if(isset($error))
                      echo '<p class="text-warning">Login o Contrasenia incorrectos.</p>'                  
                  ?>
                </label> 
              </div>

              <div class="form-group">
                            <label>
                                
                            </label>
                        </div>

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-default" type="reset" >Cancelar</button> 
                  <button type="submit" class="btn btn-primary">Ingresar</button> 
                </div>
              </div>
            </fieldset>
          </form>
	      </div>
	    </div>
	  </div>
	</div>
</div>
