<?php 
$data['title'] = "Club Tenis Cochabamba";
$this->load->view('template/header', $data);
$this->load->view($main_content);
$this->load->view('template/footer', $data);
?>