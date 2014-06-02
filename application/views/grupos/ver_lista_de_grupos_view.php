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
        <div class="col-lg-8 col-lg-offset-4">
	        <div class="bs-component">
		      <div class="col-lg-6 " >
		          <table class="table table-striped table-hover">
		          	<thead>
		              <tr>
		                <th>#</th>
		                <th>Nombre De Grupo</th>
		                <th colspan="2">Acciones</th>
		                
		              </tr>
		            </thead>
		            <tbody>
		            	<?php $cont = 1; ?>
		            	<?php	foreach($grupos as $grupo){ ?>
		            	<!--<td><a href="<?php # echo base_url(); ?>grupos/Grupo_controller/ver_grupo/">Ver</a></td> -->
		                <tr>
		                	<td><?php echo $cont; ?></td>
		                    <td><?php echo $grupo['nombre_grupo']; ?></td>
		                    <td><a style="color: purple" Title="Editar Grupo" href="<?php echo base_url(); ?>index.php/Grupo_controller/editar_grupo/<?php echo $grupo['id_grupo']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
		                    <td><a data-toggle="modal" href="#myModalEliminarGrupo"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
		                <?php $cont++; ?>
		                <?php } ?>
		            </tbody>
		          </table>
		          
		      </div>
	        </div>
	    </div>
	</div>

<!-- Modal Aniadir Entrenador -->
  <div class="modal fade" id="myModalEliminarGrupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="panel-title">Alerta...!!</h3>
            </div>
          </div>
          <div class="panel-body">
            <center><p class="text-danger">Esta Seguro que quiere <strong>ELIMINAR</strong> este Grupo?</p></center>
            <div class="modal-footer">
              <?php echo form_open('Grupo_controller/descartar_entrenador_de_sub_grupo');?>
              <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $grupo['id_grupo']; ?> ">   
              <center><div class="form-group">
                <div class="col-lg-12">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-danger">Aceptar</button>
                </div>
              </div></center>
              <?php echo form_close();?>  
            </div>
          </form>
          </div>
        </div><!-- /.panel panel-primary --> 
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


</div>


