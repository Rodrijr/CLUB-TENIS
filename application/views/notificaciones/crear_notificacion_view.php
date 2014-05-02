<?php 

function sumar()
{
    
}

?>


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