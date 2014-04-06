<?php 
	$data['title'] = "Club Tenis Cochabamba";
	$tipo = $this->session->userdata('tipo_usuario');
	if($tipo=='Secretaria')
		$menu = 'template/menu_secretaria';
	else if ($tipo=='Entrenador') 
		$menu = 'template/menu_entrenador';
	else if ($tipo=='Padre') 
		$menu = 'template/menu_padres';
	else if ($tipo=='Alumno') 
		$menu = 'template/menu_alumno';
	else
		$menu = 'template/menu_visitantes';

	$this->load->view('template/header', $data);
	$this->load->view($menu);
	$this->load->view($main_content);
	$this->load->view('template/footer', $data);

?>