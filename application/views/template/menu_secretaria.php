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
        
        <!-- REGISTROS  -->
	    <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">REGISTROS <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url(); ?>index.php/Padre_controller/registrar_padre">Registrar Padre</a></li>              
	            <li><a href="<?php echo base_url(); ?>index.php/Alumno_controller/registrar_alumno">Registrar Alumno</a></li>
	            <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/Entrenador_controller/registrar_entrenador">Registrar Entrenador</a></li>
	          </ul> 
	        </li>
	    </ul>
        <!--   PLANILLAS  -->
        
        <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">GRUPOS <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Crear Grupo</a></li> 
	              <li class="divider"></li>
	            <li><a href="#">Ver lista de grupos</a></li>
	              <li class="divider"></li>
	            <li><a href="#">Seleccionar Planilla</a></li>
	          </ul>        
	        </li>
        </ul>       
        
          <!--   REPORTES   -->
        <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">REPORTES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <!--   solo el padres  -->
                <li><a href="<?php echo base_url(); ?>index.php/Alumno_controller/ver_lista_hijos">Ver lista de hijos</a></li> 
                <li><a href="#">Ver lista entrenadores</a></li> <!--  secretaria y administrador -->
                <li><a href="#">Ver lista de alumnos</a></li><!--   solo el administrador  -->
              </ul>        
            </li>
        </ul>
        <!--   PERFIL  -->
        <ul class="nav navbar-nav navbar-right">      
	        <!--   NOFICACIONES  -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> NOTIFICACIONES <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Ver lista notificaciones</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Buscar Notificaciones</a></li>            
	          </ul>
	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
	          	<span class="glyphicon glyphicon-user"></span> 
	          	<strong>Secretaria: </strong><?php echo $this->session->userdata('nombre_usuario') ?>
	          	<b class="caret"></b>
	          </a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Ver Perfil</a></li>
	            <li><a href="#">Modificar Perfil</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Cambiar contraceña</a></li>
	            <li class="divider"></li>
	            <li><a href="<?php echo base_url(); ?>index.php/Sesion_controller/cerrar_sesion">Cerrar Sesion</a></li>                 
	          </ul>
	        </li>
        </ul>
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
