
<div class="container">

	<div class="row">
	    <div class="col-lg-12">
	      <div class="page-header">
	        <h1 id="forms"><center>Mis Videos</center></h1>
	      </div>
	    </div>
	</div>

	<?php
	$ruta = './video';
	$archivos = array();
	//comprobamos si lo que nos pasan es un direcotrio
    if (is_dir('./video'))
    {
        // Abrimos el directorio y comprobamos que
        if ($aux = opendir($ruta))
        {
            while (($archivo = readdir($aux)) !== false)
            {
                // Si quisieramos mostrar todo el contenido del directorio pondríamos lo siguiente:
                // echo '<br />' . $file . '<br />';
                // Pero como lo que queremos es mostrar todos los archivos excepto "." y ".."
                if ($archivo!="." && $archivo!="..")
                {
                    $ruta_completa = $ruta . '/' . $archivo;
                    // Comprobamos si la ruta más file es un directorio (es decir, que file es
                    // un directorio), y si lo es, decimos que es un directorio y volvemos a
                    // llamar a la función de manera recursiva.
                    if (is_dir($ruta_completa))
                    {
                        echo "<br /><strong>Directorio:</strong> " . $ruta_completa;
                        leer_archivos_y_directorios($ruta_completa . "/");
                    }
                    else
                    {
    					$direccion ="video/".$archivo; 
    					array_push($archivos,$direccion); 
                    }
                }
            }
            closedir($aux);
        }
    }
    else
    {
        echo $ruta;
        echo "<br />No es ruta valida";
    } 
    $count =0;
    ?>


	<div class="col-lg-6 col-lg-offset-3">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
		<?php 
			$count = 1;
			$id_user = $this->session->userdata('id_usuario');
			foreach ($archivos as $archivo) {
		?>
		
		  <li class=""><a href="#<?php echo $count;?>" data-toggle="tab">Video <?php echo $count;?></a></li>
		<?php
			$count++;
			}
		?>
		</ul>
		<div id="myTabContent" class="tab-content">
			<?php 
				$count = 1;
				$id_user = $this->session->userdata('id_usuario');
				foreach ($archivos as $archivo) {
			?>
				<div class="tab-pane fade" id="<?php echo $count;?>">
					<?php $arch = substr($archivo,0,-4);?>
	    			<p><?php echo substr($arch,6); ?></p>
	    			<? #echo base_url().$archivo;?>
				    <div class="container">
				    	<center><video controls="" name="media" width="100%" height="100%"><source src="<?php echo base_url().$archivo;?>" type="video/mp4"></video></center>
					</div>
	  			</div>
			<?php
				$count++;
				}
			?>
		</div>
	</div>
</div>