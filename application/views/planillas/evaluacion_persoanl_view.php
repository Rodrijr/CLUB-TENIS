<div class="container">
    <div class="col-lg-12 col-lg-offset-1">
        <div class="col-lg-10">
            <?php echo form_open('Planilla_controller/guardar_datos_planilla_evaluacion_personal'); ?>
                <h2>EVALUACION PERSONAL</h2>

                <div class="form-group">
                    <label for="inputEmail" class="control-label">Alumno: </label><br>
                    <div class="col-lg-4">
                      <input type="text" class="form-control" id="inputDefault" value="<?php echo $objetivos_de_jugador['alumno'];?>" disabled>
                    </div>
                    <input type="HIDDEN" class="form-control" name="id_grupo" value="<?php echo $id_alumno;?>">
                </div>
                <br>
                1.- COMPORTAMIENTO   
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div >
                        <div class='controls'>                           
                            <INPUT TYPE='text'
                                   class="form-control" 
                                   maxlength='10'  
                                   required="required" 
                                   pattern="[0-9]+"
                                   title="Ingrese numeros">
                            <BR>                                   
                        </div>
                        </div>
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
               2.- DISPOSICIÓN AL TRABAJO   
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
               3.- ACTITUD  EN CANCHA   
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
               4.- ACTITUD EN PREPARACIÓN FISICA:  
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
               5.- ASISTENCIA:   
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
                6.- PUNTUALIDAD:   
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
                7.- RENDIMIENTO  EN TORNEOS:   
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>1º EVALUACION</th>
                        <th>2º EVALUACION</th>
                        <th>3º EVALUACION</th>
                    </tr>
                </thead>
                <tbody>		            	
                    <tr>
                        <td>
                        <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        
                        </td>
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>                            
                        <td>
                         <div class='controls'>                           
                                    <INPUT TYPE='text' class="form-control" 
                                    maxlength='10'  
                                    required="required" 
                                    pattern="[0-9]+"
                                    title="Ingrese numeros">
                                    <BR>                                   
                                </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="col-lg-12">
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-1">
                    <br>
                    <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>index.php/Planilla_controller/ver_lista_de_alumnos">Cancel</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </div>
            </div>    

            <?php echo form_close(); ?>
        </div>
    </div>

</div>