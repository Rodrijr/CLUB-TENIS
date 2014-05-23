<div class="container">
<?php  echo   form_open_multipart('Multimedia_controller/upload','class="form-horizontal"'); 
  ?>
    
     <div class="col-lg-2"> 
         <div class="row"></div>
         </div><h1> SUBIR FOTOS DE EVENTOS</h1>
             <div class="col-lg-4">   
                 <div class="row">
<div id="fileUpload1">
   
   <input type="file" name="userfile" />
<input type="submit" value="upload" class ="btn btn-success"/>
         </div>
                 <?php  echo form_close(); ?>
</div>
    </div></div>