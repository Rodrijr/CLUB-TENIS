<div class="container">
	<div class="row">
	    <div class="col-lg-12">
	      <div class="page-header">
	        <h1 id="forms"><center>Subir Videos</center></h1>
	      </div>
	    </div>
	 </div>
	 <div class="row">
	    <div class="col-lg-10 col-lg-offset-3">
	       <?php echo form_open_multipart('Multimedia_controller/upload_video'); ?>
				Seleccionar Video :
				<br>
			    <input type="file" id="video" name="video">
			    <br>Descripcion:<br>
			    <input type="text" id="descripcion" name="descripcion">
			    <input type="submit" id="button" name="submit" value="Subir Video" class ="btn btn-success"/>
			<?php echo form_close();?>
	    </div>
	 </div>
	
</div>