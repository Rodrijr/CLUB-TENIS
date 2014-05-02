<div class="container">
<div class="bs-example bs-example-tabs">
    <ul id="myTab" class="nav nav-pills">
      <li class=""><a href="#Grupos" data-toggle="tab">GRUPO</a></li>
      <li class="active"><a href="#Alumnos" data-toggle="tab">ALUMNO</a></li>
      <li class=""><a href="#Padres" data-toggle="tab">PADRES</a></li>
      <li class="dropdown">
        
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade" id="Grupos">
       <input type = "text" name = variable1 value = 0 size=12>
       <input type="button" name="" value="Buscar" onclick="Buscar()">
            <FORM name = "calculadora"> 
	   <FONT SIZE="8" COLOR="">1.- Calculadora</FONT><br><br>
       <input type = "text" name = variable1 value = 0 size=12> <br>
       <input type = "text" name = variable2 value = 0 size=12>
       <input type="button" name="" value=" + " onclick="sumar()">
       <input type="button" name="" value=" - " onclick="restar()">
       <input type="button" name="" value=" X " onclick="multiplicar()">
       <input type="button" name="" value=" / " onclick="dividir()"><br>

       <input type="text" name=result  size="12"><br><br>
       
	 </FORM> 
 
          
        <p></p>
      </div>
       <div class="tab-pane fade active in" id="Alumnos">
        <div class="row"><br>   
           	<?php echo form_open('Notificacion_controller/buscar_alumnos'); ?>
           <div class="col-md-1">
            
           </div>
           <div class="col-md-3">
            <input type="text" class="form-control" name="ci" placeholder="CI">
           </div>
           <div class="col-md-3">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
           </div><div class="col-md-3">
            <input type="text" class="form-control" name="apellido" placeholder="Apellido">
           </div>
           <INPUT VALUE='BUSCAR' class='btn btn-success' TYPE='submit'>
            </div>
            <div class="row">
            <div class="col-md-3">            
           </div>
           <div class="col-md-8">
               
               
               
        <?php 

   foreach ($alumnos as $alumno1)
          { echo "<br>";
           print_r($alumno1);
           echo "<br>";
             echo $alumno1['nombre_persona'];             
          }


          ?>
          <?php echo form_close() ?>
               </div>
                </div>
      </div>
      <div class="tab-pane fade" id="Padres">
        <p></p>
      </div>
      
    </div>
  </div>
  </div>  
    