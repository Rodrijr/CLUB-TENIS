	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Vídeo en HTML5?</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=1024, initial-scale=1, maximum-scale=1">
	
	<!-- Core and extension CSS files -->
	<link rel="stylesheet" href="../core/deck.core.css">
	<link rel="stylesheet" href="../extensions/goto/deck.goto.css">
	<link rel="stylesheet" href="../extensions/menu/deck.menu.css">
	<link rel="stylesheet" href="../extensions/navigation/deck.navigation.css">
	<link rel="stylesheet" href="../extensions/status/deck.status.css">
	<link rel="stylesheet" href="../extensions/hash/deck.hash.css">
	
	<!-- Theme CSS files (menu swaps these out) -->
	<link rel="stylesheet" id="style-theme-link" href="../themes/style/swiss.css">
	<link rel="stylesheet" id="transition-theme-link" href="../themes/transition/horizontal-slide.css">
	
	<!-- Custom CSS just for this page -->
	<link rel="stylesheet" href="introduction.css">
	
	<script src="../modernizr.custom.js"></script>
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
    $direccion ="files/".$archivo; 
    array_push($archivos,$direccion); 
                        echo $direccion;
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
          <embed src="'.base_url()."/".$archivo.'" width="680" height="600" autostart="false"/></div></div>
        ';
    array_push($items,$item);
        
    }
?>
<body class="deck-container on-slide-slide-<?php echo count($items); ?> on-slide-<?php echo count($items); ?>">
	
    <?php $count = 1; foreach($items as $archivo)
     { ?>
            <section class="slide deck-before" id="slide-<?php
                                                   echo $count;?>">
                   <?php 
                    if(isset($items[$count]))
                    {echo $items[$count];
                       
                        $count = $count +1;
                    }
                    else
                    {$count = 0;
                     echo $items[$count];
                    }
                         
                    ?>
                    
                    <!-- ITEM-->
               </section>
            <?php } ?>
    
		<hgroup>
			<h1>¿Cómo insertar vídeo en unha página HTML5?</h1>
		</hgroup>
	

<a href="#slide-<?php echo count($items); ?>" class="deck-prev-link" title="Previous">←</a>
<a href="#" class="deck-next-link deck-nav-disabled" title="Next">→</a>

<p class="deck-status">
	<span class="deck-status-current"><?php echo count($items); ?></span>
	/
	<span class="deck-status-total"><?php echo count($items); ?></span>
</p>

<form action="." method="get" class="goto-form">
	<label for="goto-slide">Go to slide:</label>
	<input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
	<datalist id="goto-datalist">
       <?php $count = 0; foreach($items as $archivo)
     { ?>
        <option value="slide-<?php echo $count;?>">
            <?php $count = $count+1;} ?> 
        
        
    </datalist>
	<input type="submit" value="Go">
</form>
<a href="#slide-27" title="Permalink to this slide" class="deck-permalink">#</a>


  <!-- Grab CDN jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.min.js"></script>
  <script>window.jQuery || document.write('<script src="../jquery-1.7.min.js"><\/script>')</script>

<!-- Deck Core and extensions -->
<script src="../core/deck.core.js"></script>
<script src="../extensions/hash/deck.hash.js"></script>
<script src="../extensions/menu/deck.menu.js"></script>
<script src="../extensions/goto/deck.goto.js"></script>
<script src="../extensions/status/deck.status.js"></script>
<script src="../extensions/navigation/deck.navigation.js"></script>

<!-- Specific to this page -->
<script src="introduction.js"></script>
	<script type="text/javascript">
		$('a.demo,a.external').click(function(){
			window.open($(this).attr('href'));
			return false;
		});
	</script>

</body>