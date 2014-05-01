<div class="container">
	<?php 
		$count = 1;
		for ($i=0; $i<count($horarios_seleccionados); $i++) {
        	echo $horarios_seleccionados[$i]."<br>";
        	$count++;
    	}

		//foreach ($horarios_seleccionados as $horario) {
		//	echo 'seccionado'.$horario['desde'].'<br>';
		//}
		echo 'cantidad: '.count($horarios_seleccionados).'<br>';
    	echo 'ciclos: '.$count.'<br>';
		echo 'menaje: '.$msj;
		

	?>
</div>