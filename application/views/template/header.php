
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>    
	<link href="<?php echo base_url(); ?>dist/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>dist/css/bootswatch.min.css" rel="stylesheet">
	<!-- <link href="<?php #echo base_url(); ?>dist/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->

	<!--<link href="<?php #echo base_url(); ?>dist/css/bootstrap-theme.css" rel="stylesheet" >-->
	<!--<link href="<?php #echo base_url(); ?>dist/css/bootstrap-theme.min.css" rel="stylesheet" >-->
	<!-- <script type="text/javascript" src="<?php #echo base_url(); ?>dist/js/jquery-1.10.2.min.js"></script> -->

	<!--<style>
		table,th,td
		{
		border:1px solid black;
		border-collapse:collapse;
		}
	</style>-->

	<script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>

</head>

<body>
	<script src="<?php echo base_url(); ?>dist/js/bsa.js"></script>
    
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
            <li><a href="#">Registrar Alumno</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>index.php/Entrenador_controller/registrar_entrenador">Registrar Entrenador</a></li>
          </ul> 
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
         <!--   MULTIMEDIA  -->
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MULTIMEDIA <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Subir fotos</a></li> <!--   solo el entrenador  -->
                <li><a href="#">Ver fotos</a></li> 
                  <li class="divider"></li>
                <li><a href="#">Subir videos</a></li><!--   solo el entrenador  -->
                <li><a href="#">Ver videos</a></li>
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
        
        <li><a href="#">SALIR</a></li>
      </ul>
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
