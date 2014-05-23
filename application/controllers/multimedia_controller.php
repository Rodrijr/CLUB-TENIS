<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multimedia_controller extends CI_Controller
{
	
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

  public function subir_video()
  {
    $data['main_content'] = 'multimedia/subir_videos_view';
    $this->load->view('main_template', $data);
  }

  public function upload_video()
  {
    #$id=$this->session->userdata('id_usuario');
    $id = $this->input->post('descripcion');
    if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '')
    {
        unset($config);
        $date = date("ymd");
        $configVideo['upload_path'] = './video';
        $configVideo['max_size'] = '100240'; //100mb
        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $configVideo['overwrite'] = TRUE;
        $configVideo['remove_spaces'] = TRUE;
        //$video_name = $date.$_FILES['video']['name'];
        //$configVideo['file_name'] = $video_name;
        $configVideo['file_name'] = $id.".mp4";

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if (!$this->upload->do_upload('video'))
        {
          echo $this->upload->display_errors();
        }
        else
        {
          $videoDetails = $this->upload->data();
          echo "Successfully Uploaded";
        }
        $data['main_content'] = 'multimedia/mostrar_videos_view';
        $this->load->view('main_template', $data);
    }
  }

  public function mostrar_video()
  {
    $data['main_content'] = 'multimedia/mostrar_videos_alumnos_view';
    $this->load->view('main_template', $data);
  }

  public function mostrar_videos()
  {
      $data['main_content'] = 'multimedia/mostrar_videos_view';
	$this->load->view('main_template', $data);  
  }

}
