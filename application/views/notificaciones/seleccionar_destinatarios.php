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
        <p></p>
      </div>
      <div class="tab-pane fade" id="Padres">
        <p></p>
      </div>
      
    </div>
  </div>
  </div>  
    