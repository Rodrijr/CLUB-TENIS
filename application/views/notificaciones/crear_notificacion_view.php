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
   
    <div class="col-md-3"></div>
  <div class="col-md-5">
      <?php

        echo form_open('notificacion_controller/seleccionar_destinatarios');
      ?>
        <div class="input-group">
           <span class="input-group-btn"><button class="btn btn-default" type="button">ASUNTO</button></span>
          <input type="text" class="form-control" 
                 required="required"
                 name='ASUNTO'
                  VALUE=''>
        </div>
          <br>
         <div class="input-group">
  <span class="input-group-addon">CUERPO</span>
 <textarea class="form-control" rows="3" 
           required="required"
           name ='CUERPO'
           VALUE=''
           >
        </textarea>

   
</div>
      <br>
      <input class='btn btn-default'  type='button' value='ATRAS' onclick='history.back()'> 
    <INPUT VALUE='DESTINATARIOS' class='btn btn-success' TYPE='submit'>
      
      
<?php echo form_close(); ?>
      <br><br>
</div>
    

<div class="col-md-5">

  </div>
    
    
    
    
<br>
    
    <div class="row"><br>
   <div class="col-md-5">
       </div>
    <div class="col-md-7">
          
    </div>  </div>
        
    
    </div>
      </div>
