<div class="container">
	<div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-9 col-lg-offset-2">
      	<?php echo form_open('Grupo_controller/buscar_grupos')?>          
            <fieldset>
                <!-- zzzzzzzzzzzzzzzzzzz Datos Basicos zzzzzzzzzzzzzzzzzzzzzzz -->

                <div class="col-lg-10 form-group">
                    <label class="col-lg-2 control-label">Buscar Por: </label>
                    <div class="col-lg-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nombreEntrenador" placeholder="Nombre de Entrenador" pattern="[a-zA-Z]+" title="Solo se aceptan Letras">
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
        	<h1 id="tables" align="center">Lista De Grupos Por Entrenador</h1>
        </div>
        <div class="col-lg-11 col-lg-offset-1">
	        <div class="bs-component">
	          <?php	foreach($gruposEntrenador as $entrenador){ ?>
		          <div class="page-header">
		           	<h3 id="tables"><strong>Entrenador: </strong><?php echo $entrenador['nombreEntrenador']." ".$entrenador['apellidosEntrenador']; ?></h3>
		          </div>
		          <div class="col-lg-10 col-lg-offset-1">
		          <table class="table table-striped table-hover">
		            <thead>
		              <tr>
		                <th>#</th>
		                <th>Nombre Grupo</th>
		                <th></th>
		                <th></th>
		                <th></th>
		                <th></th>
		              </tr>
		            </thead>
		            <tbody>
		              <?php  
		                $cont = 1;
		                foreach($entrenador['grupos'] as $itemGrupos){
		                  echo "<tr>";
		                    echo "<td>".$cont."</td>";
		                    echo "<td>".$itemGrupos['nombreGrupo']."</td>";
		                    echo '<td><a href="">Ver</a></td>';
		                    echo '<td><a href="'.base_url().'index.php/Grupo_controller/editar_grupo/'.$itemGrupos['idGrupo'].'">Editar</a></td>';
							echo '<td><a href="">Eliminar</a></td>';
		                  echo "</tr>";
		                  $cont++;
		                }
		              ?>
		            </tbody>
		          </table>
		      </div>
		      <?php } ?>
	        </div>
	    </div>
	</div>
</div>
