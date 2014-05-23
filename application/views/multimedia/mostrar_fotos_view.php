
<div class="container">
<?php
 $ruta = './uploads';
$archivos = array();
// comprobamos si lo que nos pasan es un direcotrio
    if (is_dir('./uploads'))
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
    $direccion ="uploads/".$archivo; 
    array_push($archivos,$direccion); 
                      ?>
    
<?php
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
    } $count =0;?>
   <div class="jumbotron">
        
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
        <?php foreach($archivos as $archivo){ ?>
            <li data-target="#myCarousel" 
                data-slide-to=" <?php echo $count; ?>">
            </li>
      
           <?php $count++;}?>
          </ol>  
          <!-- Carousel items -->
      
              
          <div class="carousel slide"><?php $count = 0;foreach($archivos as $archivo){?>
              <div class="item" aling = "center">
              
<img src="<?php echo base_url(); ?><?php echo $archivo;?>" aling ="center" alt="uploads/<?php echo $archivo;?>">
                  <div class="carousel-caption">
                      <h4>Clasificados</h4>
                      <p>¡asdcasdc</p>
                    </div>
              </div>
            <?php }?>
          </div> 
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    