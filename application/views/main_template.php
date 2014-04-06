<?php 

$data['title'] = "Club Tenis Cochabamba"; // Capitaliza la primera letra
#$this->load->helper('url');
//$data['nombre']= $this->session->userdata('nombre');
$this->load->view('template/header', $data);
$this->load->view($main_content);
$this->load->view('template/footer', $data);
#$this->load->view('templates/footer', $data);

?>