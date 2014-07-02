<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      </button>
      <a class="navbar-brand" href="#">Club tenis CBBA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <!--   MULTIMEDIA  -->
    	<ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">MULTIMEDIA <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	             <li><a href="<?php echo base_url(); ?>index.php/multimedia_controller/mostrar">Ver Fotos</a></li> <!--   solo el entrenador  -->
	              <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/multimedia_controller/mostrar_video">Ver Videos</a></li><!--   solo el entrenador  -->
	          </ul>        
	        </li>
        </ul>

        <!--   EVALUACION PLANTILLAS  -->
    	<ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">EVALUACIONES <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url(); ?>index.php/planilla_controller/ver_objetivos_de_jugador/<?php echo $this->session->userdata('identificador_usuario') ?>">Objetivos De Jugador</a></li> <!--   solo el entrenador  -->
	            <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/planilla_controller/ver_perfil_de_jugador/<?php echo $this->session->userdata('identificador_usuario') ?>">Perfil de Jugador</a></li><!--   solo el entrenador  -->
	            <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/planilla_controller/ver_evaluacion_personal/<?php echo $this->session->userdata('identificador_usuario') ?>">Evaluación Personal</a></li> <!--   solo el entrenador  -->
	            <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/planilla_controller/ver_objetivos_individuales/<?php echo $this->session->userdata('identificador_usuario') ?>">Objetivos Individuales</a></li> <!--   solo el entrenador  -->
	          </ul>        
	        </li>
        </ul>

        <!--   PERFIL  -->
	    <ul class="nav navbar-nav navbar-right">   

	    	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> NOTIFICACIONES  <?php 
    if($_SESSION['notif']>0){?>
                  <span class="badge pull-right"><?php 
                   
                     echo $_SESSION['notif'];
                  ?></span>
                  <?php } ?>
                  
                  
                  
                  <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url(); ?>index.php/notificacion_controller/ver_notificaciones">Ver lista Notificaciones
                    </a></li>
	            
	          </ul>
	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
	          	<span class="glyphicon glyphicon-user"></span> 
	          	<?php echo $this->session->userdata('nombre_usuario') ?>
	          	<b class="caret"></b>
	          </a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url(); ?>index.php/persona_controller/ver_mi_perfil">Ver Perfil</a></li>
	            <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/sesion_controller/cerrar_sesion">Cerrar Sesión</a></li>   
	          </ul>
	        </li> 
	        <!--   NOFICACIONES  -->
	    </ul>       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
