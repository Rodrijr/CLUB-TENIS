<div class="container">
<?php  echo   form_open_multipart('Multimedia_controller/upload','class="form-horizontal"'); 
  ?>
    
     <div class="col-lg-2"> 
         <div class="row"></div>
         </div><h1> SUBIR FOTOS DE EVENTOS</h1>
             <div class="col-lg-4">   
                 <div class="row">
            <?php if(isset($msn)&& !empty($msn))
              {
                 
                    echo"<div class='panel panel-".$tipo."'>";
							echo '<div class="panel-heading">';
                            echo' <h3 class="panel-title">ALERTA!</h3></div>';
							echo"<div class='panel-body'><input  readonly='readonly' type='text_Rodri' name='numero' value='$msn' style=' border:none; width:350px; height:30px'>";
                            
							echo" </div></div>"; 
                
              }
            ?>

                     <div id="fileUpload1">
   
   <input type="file" name="userfile" multiple />
<input type="submit" value="upload" class ="btn btn-success"/>
         </div>
                 <?php  echo form_close(); ?>
</div>
    </div></div>