<div class="container">
	<div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-9 col-lg-offset-2">
      	<?php echo form_open('Grupo_controller/buscar_grupos')?>          
            <fieldset>
                <div class="col-lg-10 form-group">
                    <label class="col-lg-2 control-label">Buscar Por: </label>
                    <div class="col-lg-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nombreGrupo" placeholder="Nombre de Grupo">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span> </span>
                        </div>
                    </div>
                    <button type="submit" class="col-lg-2 btn btn-success">Buscar</button>
                </div>
                
            </fieldset>
        <?php echo form_close() ?>
	  </div>
	</div>
	</div>
</div>

<div class="container">
    <div class="col-lg-12">
        <div class="page-header">
        	<h1 id="tables" align="center">Lista De Grupos</h1>
        </div>
        <div class="col-lg-11 col-lg-offset-1">
	        <div class="bs-component">
		      <div class="col-lg-10">
		          <table class="table table-striped table-hover">
		          	<thead>
		              <tr>
		                <th>#</th>
		                <th>Nombre</th>
		                <th>Descripci&oacute;n</th>
		                <th></th>
		                <th></th>
		                <th></th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; ?>
		            	<?php	foreach($grupos as $grupo){ ?>
		            	<!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
		                <tr>
		                	<td><?php echo $cont; ?></td>
		                    <td><?php echo $grupo['nombre_grupo']; ?></td>
		                    <td><?php echo $grupo['descripcion_grupo']; ?></td>
		                    <td><a Title="Ver Grupo" href="<?php echo base_url(); ?>index.php/Grupo_controller/ver_grupo/<?php echo $grupo['id_grupo']; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
	                  		<td><a Title="Editar Grupo" href="<?php echo base_url(); ?>index.php/Grupo_controller/editar_grupo/<?php echo $grupo['id_grupo']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
							<td><a Title="Eliminar Grupo" href=""><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
		                <?php $cont++; ?>
		                <?php } ?>
		            </tbody>
		          </table>
		          
		      </div>
	        </div>
	    </div>
	</div>
</div>
