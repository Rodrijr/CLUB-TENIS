<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multimedia_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            #$data['main_content'] = 'sesiones/form_login_views';
            #$this->load->view('main_template', $data);
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}
    public function index()
    {
    
        $data['main_content'] = 'multimedia/subir_fotos_view';
		$this->load->view('main_template', $data);   
    
    }
    public function upload()
	{
		//crear la ruta absoluta
      
        $config_file = array(
       
           'upload_path' => './uploads',
           'allowed_types' => 'gif|jpg|png',
           //'file_name' => $id.".jpg",
           'overwrite' => true,
           'max_size' => 0,
           'max_filename'=>0,
            'max-width'=> 1300,
            'max-height'=>1200,
           'encrypt_name'=> false,
           'remove_spaces' => false
       );
        $msn ="";
        $this->upload->initialize($config_file);
        if(!$this->upload->do_upload('userfile'))
        {
            $msn = "EL ARCHIVO DEBE SER UNA IMAGEN.";  
            $tipo = "danger";
        }   
        else        
        {
            $msn = "El archivo se cargo exitosamente.";
            $tipo = "success";
        }
        $data['tipo'] = $tipo;
        $data['msn'] = $msn;
        $data['main_content'] = 'multimedia/subir_fotos_view';
		$this->load->view('main_template', $data);  
    }
    public function mostrar()
    {
        $data['main_content'] = 'multimedia/mostrar_fotos_view';
		$this->load->view('main_template', $data);  
    }
     public function mostrar_videos()
    {
        $data['main_content'] = 'multimedia/mostrar_videos_view';
		$this->load->view('main_template', $data);  
    }
}
