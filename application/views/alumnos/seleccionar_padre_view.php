<div class="container">
 <div class="col-lg-12">
        <div class="page-header">
        	<h1 id="tables" align="center">Buscar Padre</h1>
            
            <?php echo form_open('persona_controller/buscar_padre')?>          
            <fieldset>
                <div class="col-lg-10 form-group">
                     <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="apellido" placeholder="APELLIDO del padre a Buscar">
                            <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span> </span>
                        </div>
                    </div>
                    <button type="submit" class="col-lg-2 btn btn-success">Buscar</button>
                </div>
            </fieldset>
        <?php echo form_close() ?>
        </div>
 </div>
    
    <?php if(isset($padres))
    {
    ?>
    <div class="col-lg-11 col-lg-offset-2">
	        <div class="bs-component">
		      <div class="col-lg-8">
                   <?php echo form_open('alumno_controller/terminar_registro_alumno')?>   
		          <table class="table table-striped table-hover">
		          	<thead>
		              <tr>
		                <th>CI</th>
		                <th>NOMBRE APELLIDO</th>
                        <th>SELECCIONAR</th>
		              </tr>
		            </thead>
		            <tbody>
		            	<?php	foreach($padres as $padre){ ?>
		                <tr>
                        <td style="min-width: 0px; max-width: 10%">
                            <?php echo $padre['ci_persona']."asdfasd"; ?></td>
	                       <td style="min-width: 0px; max-width: 65%">
                             <a><?php echo $padre['nombre_persona']." ".$padre['apellido_persona']; ?></a>      
                            </td>
                            
                            <td style="min-width: 0px; max-width: 10px"> 
                               <input id="ci_padre" name="padres" value="<?php echo $padre['ci_persona']; ?>" type="checkbox">
                            </td>
                        </tr>
		                <?php } ?>
		            </tbody>
		          </table>
                  
                 <div class="row"><br>
          <div class="col-lg-2">
          </div>
          <div class="col-lg-3">
             <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTAR </button>
          </div>
          <div class="col-lg-3">
              <button type="button" class="btn btn-default btn-lg btn-block" onclick='history.back()'>ATRAS</button>
          </div>
          </div>
		          <?php echo form_close() ?>
		      </div>
	        </div>
            
	    </div>
    <?php }?>
    
    
<?php


?>
</div>