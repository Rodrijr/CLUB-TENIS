
<div class="container"> 
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="forms"><center>Buscar Código</center></h1>
      </div>
    </div>

    <div class="bs-docs-section">
      <div class="col-lg-4 col-lg-offset-4">
        <div class="well">
            <?php $attributes = array('class' => 'bs-example form-horizontal'); ?>
            <fieldset>
          	<?php echo form_open('Padres_controller/agregar_hijo_por_codigo', $attributes);?>       

              <legend>
              	<div class="form-group has-success">
              		<label class="control-label" for="inputSuccess" >Ingrese El Código Correspondiente...</label>
              	</div>
          	  </legend>
              
              <div class="form-group">
                <label class="col-lg-2 col-lg-offset-1 control-label">Codigo:</label>
                <div class="col-lg-8">
                	<div class="input-group">
	                  	<input type="text" class="form-control" name="codigo_alumno" placeholder="Código" required="required" maxlength="30">
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
                <button class="col-lg-offset-1 btn btn-default" type="reset" >Limpiar</button>
              </div>
          	<?php echo form_close();?>
            </fieldset>
	    </div>
	  </div>
    </div>
</div>

