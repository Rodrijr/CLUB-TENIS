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
      <a class="navbar-brand" href="#">Club tenis CBBA: Alumno</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <!--   PERFIL  -->
	    <ul class="nav navbar-nav navbar-right">      
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> PERFIL <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Ver Perfil</a></li>
	            <li><a href="#">Modificar Perfil</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Cambiar contraceña</a></li>         
	          </ul>
	        </li>
	      
	        <!--   NOFICACIONES  -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> NOTIFICACIONES <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Ver lista notificaciones</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Buscar Notificaciones</a></li>            
	          </ul>
	        </li>
	        <li><a href="<?php echo base_url(); ?>index.php/Sesion_controller/login_formulario">Ingresar</a></li>
	        <li><a href="<?php echo base_url(); ?>index.php/Sesion_controller/cerrar_sesion">SALIR</a></li>
	    </ul>
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
