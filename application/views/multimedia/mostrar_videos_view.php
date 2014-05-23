
<div class="container">

<?php
 $ruta = './files';
$archivos = array();
// comprobamos si lo que nos pasan es un direcotrio
    if (is_dir('./files'))
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
    $direccion ="".$archivo; 
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
    
<?php 
$items = array();
foreach($archivos as $archivo)
    { 
        $item = '<div class="col-md-12"><div class="thumbnail product-item">
          <embed src="'.base_url()."/uplodas/".$archivo.'" width="680" height="600" autostart="false" preload/>
          <div class="label_skitter" style="width: 800px; display: block;">
                      <h4>ESCUELA TENIS</h4>
                      <p>'.$archivo.'</p>
                    </div>
          </div>
          </div>
        ';
    array_push($items,$item);
        
    }
?>
    <div class="jumbotron">  
    
    <div class="container">
        <h2> VIDEOS DE LA ESCUELA DE     TENIS</h2>
    <div id="myCarousel2" class="carousel slide" display=false>
        <!-- Carousel items --> 
   
        <div class="carousel-inner" display=none>
            <div class="item active" display=none>
               
                <div class="row text-center">
                    <!-- ITEM-->
                   <?php
                    if(isset($items[0]))
                    {
                        echo $items[0];
                        
                    }else
                    {
                        echo '<h1 aling ="center">NO HAY VIDEOS PARA MOSTRAR</h1>';
                    }
                    ?>
                    
                    <!-- ITEM-->
                </div>
            </div> <?php $count = 1; foreach($items as $archivo)
     { ?>
            <div class="item">
              
                <div class="row text-center">
                    <!-- ITEM-->
                   
                   <?php 
                    if(isset($items[$count]))
                    {
                        echo $items[$count];
                        $count = $count +1;
                    }
                    else
                    {
                        $count = 0;
                        echo $items[$count];
                    }
                         
                    ?>
                    
                    <!-- ITEM-->
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- /INNER-->
        <!-- Carousel nav -->

        
<a class="carousel-control left" href="#myCarousel2" data-slide="prev" display=none ></a>
        <a class="carousel-control right" href="#myCarousel2" data-slide="next" display=none></a>
    </div>
</div>
    
    </div>
