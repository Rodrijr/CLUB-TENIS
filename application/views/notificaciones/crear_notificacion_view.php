<div class="container">
    <div class="row"><br>
   <div class="col-md-4">
       </div>
    <div class="col-md-7">
                    <h1> CREAR NOTIFICACION</h1>    
    </div>
        
    
    </div>
<div class="row"><br>
    <br>
   
    <div class="col-md-1"></div>
  <div class="col-md-5">
      <?php
        echo form_open('Notificacion_controller/seleccionar_destinatarios');
      ?>
        <div class="input-group">
           <span class="input-group-btn"><button class="btn btn-default" type="button">ASUNTO</button></span>
          <input type="text" class="form-control">
        </div>
          <br>
         <div class="input-group">
  <span class="input-group-addon">CUERPO</span>
 <textarea class="form-control" rows="3">
        </textarea>

   
</div>
      
      
      <input class='btn btn-default'  type='button' value='ATRAS' onclick='history.back()'> 
    <INPUT VALUE='INSERTAR' class='btn btn-success' TYPE='submit'>
      
      
<?php echo form_close(); ?>
</div>
    

<div class="col-md-5">

    
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
        <?php 
            function buscaralumno()
            {
                
            }
          echo '<input type = "text" name="" value = "" size="12">';
           echo '  <input type="button" name="" value=" + " onclick="buscaralumno()">';
          foreach ($alumnos as $alumno)
          {
              echo $alumno['nombre_persona'];
              echo "<br>";
          }
          
          ?>
          
          
          <p></p>
      </div>
      <div class="tab-pane fade" id="Padres">
        <p></p>
      </div>
      
    </div>
  </div>
    
    
    
    
    
    
</div>
   
</div>
    
    <div class="row"><br>
   <div class="col-md-5">
       </div>
    <div class="col-md-7">
        <p>
            <a href="#" class="btn btn-default" role="button">CANCELAR</a>
            <a href="#" class="btn btn-primary" role="button">DESTINATARIOS</a>
        </p>   
    </div>
        
    
    </div>
    <br>
</div> 