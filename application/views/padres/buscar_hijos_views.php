
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
          	

              <legend>
              	<div class="form-group has-success">
              		<label class="control-label" for="inputSuccess" >Ingrese El Código Correspondiente...</label>
              	</div>
          	  </legend>
              
              <div class="form-group">
                <label class="col-lg-2 col-lg-offset-1 control-label">Codigo:</label>
                <div class="col-lg-8">
                	<div class="input-group">
	                  	<input type="text" class="form-control" id="id_codigo_alumno" placeholder="Código" maxlength="30" required>
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
              	<a type="sumbit" data-toggle="modal" href="#myModalAniadirHijo" onclick="mostrar();" class="btn btn-primary"> Ingresar</a>
              	<a onclick="limpiar();" class="col-lg-offset-1 btn btn-default"> Limpiar</a>
              </div>
            </fieldset>
	    </div>
	  </div>
    </div>
</div>

<!-- Modal Aniadir Entrenador -->
<div class="modal fade" id="myModalAniadirHijo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="panel-title">Advertencia...!!</h3>
            <?php echo form_open('padres_controller/agregar_hijo_por_codigo');?>       
          </div>
        </div>
        <div class="panel-body">
          <div class="modal-body">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="col-lg-12">
                <p class="text-info"><strong>Código: </strong></p> 
              </div>
              <div class="col-lg-8 col-lg-offset-1">
                <input class="form-control" id="id_codigo" name="codigo_alumno" readonly/>
              </div>
            </div>

            <!-- ################### Horario ######################## -->
            <div class="form-group">
              <div class="col-lg-12">            
                <p class="text-danger"><strong>Mensaje:</strong></p>
                <p >Esta Seguro Que Desea Relacionar Este <strong>Código(Alumno)</strong> Con Su Cuenta?</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
            <button type="submit" class="btn btn-warning">SI</button>
            <?php echo form_close();?>
          </div>
        </div>
      </div><!-- /.panel panel-primary --> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	function mostrar()
	{
		var codigo_alumno = document.getElementById("id_codigo_alumno").value;
		document.getElementById("id_codigo").value=codigo_alumno;
	}

	function limpiar()
	{
		document.getElementById("id_codigo_alumno").value="";
	}
</script>