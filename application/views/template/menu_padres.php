<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Club tenis CBBA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav navbar-left"> 
        <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> REPORTES <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="<?php echo base_url(); ?>index.php/Alumno_controller/ver_lista_hijos">Ver lista de hijos</a></li>           
	        </ul>
	    </li>
        </ul>
       <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">MULTIMEDIA <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url(); ?>index.php/Multimedia_controller/mostrar">Ver Fotos</a></li> <!--   solo el entrenador  -->
	            <li><a href="<?php echo base_url(); ?>index.php/Multimedia_controller/mostrar_video">Ver Videos</a></li><!--   solo el entrenador  -->
	          </ul>        
	        </li>
	        <li>
	            <a href="<?php echo base_url(); ?>index.php/Padres_controller/ingresar_codigo">INGRESAR CÓDIGO</a>
            </li>  
        </ul>
	    <ul class="nav navbar-nav navbar-right">      
	        <!--   NOFICACIONES  -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> NOTIFICACIONES
                  <?php 
    if($_SESSION['notif']>0){?>
                  <span class="badge pull-right"><?php 
                   
                     echo $_SESSION['notif'];
                  ?></span>
                  <?php } ?>
                  
                  
                  
                 <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	            	<a href="<?php echo base_url(); ?>index.php/Notificacion_controller/ver_notificaciones">Ver Lista Notifiaciones</a>
                </li>         
	          </ul>
	        </li>
	        <!--   PERFIL  -->
	        <li>
	          <a href="<?php echo base_url(); ?>index.php/Persona_controller/ver_mi_perfil" > 
	          	<span class="glyphicon glyphicon-user"></span>
	          	<?php echo $this->session->userdata('nombre_usuario') ?>
	          	<b class="caret"></b>
	          </a>	         
	        </li>
            <li><a href="<?php echo base_url(); ?>index.php/Sesion_controller/cerrar_sesion">Cerrar Sesión</a></li>   
	    </ul>
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<li>