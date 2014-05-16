<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notificacion_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            #$data['main_content'] = 'sesiones/form_login_views';
            #$this->load->view('main_template', $data);
        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->folder = 'uploads/';
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}

    public function index()
	{
        $this->load->view('upload_form', array('error' => ' ' )); 
	}

    public function do_upload()
    {         
        $padres  = $this->persona_model->obtener_padres();
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
        $alumnos = $this->persona_model->obtener_alumnos();
        $data['padres'] = $padres;
        $data['grupos'] = $grupos;
        $data['alumnos'] = $alumnos;
        $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
    }
    public function seleccionar_destinatarios()
    {
         if (!isset($_SESSION['notificacion'])) {
       $_SESSION['notificacion'] = array('asunto' => $this->input->post('ASUNTO'),
            'cuerpo' => $this->input->post('CUERPO'),
            'fecha' => "ASDCA",
            'archivo' => 'falta cargar archivos');
         }
             else
             {
              $_SESSION['notificacion'] = array(
            'asunto' => $this->input->post('ASUNTO'),
            'cuerpo' => $this->input->post('CUERPO'),
            'fecha' => "ASDCA",
            'archivo' => 'falta cargar archivos'
              );
            }
    
        //print_r($_SESSION['notificacion']);
        $padres  = $this->persona_model->obtener_padres();
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
        $alumnos = $this->persona_model->obtener_alumnos();
        $data['padres'] = $padres;
        $data['grupos'] = $grupos;
        $data['alumnos'] = $alumnos;
        $data['main_content'] = 'notificaciones/seleccionar_destinatarios';
        $this->load->view('main_template', $data);        
    }
    public function buscar_alumnos()
    {/*$destinatarios = $this->input->post('destinatarios'); 
        if(count($destinatarios)>=1)
        {
            if (!isset($_SESSION['destinatarios'])) 
            {                
                $_SESSION['destinatarios'] = array();                
            }     
            print_r($destinatarios);
            array_push($_SESSION['destinatarios'],$destinatarios);
            
        }*/
        $persona = array(
        'ci_persona' => $this->input->post('ci'),
        'nombre_persona'=>$this->input->post('nombre_persona'),
        'apellido_persona'=>$this->input->post('apellido_persona')
        );
        //print_r($_SESSION['destinatarios']);
        $alumnos = array();
        $alumnos = $this->persona_model->persona_ci($persona);  
        $data['alumnos1'] = $alumnos;
        $data['main_content'] = 'notificaciones/seleccionar_destinatarios';
        $this->load->view('main_template', $data); 
    }
    
    
    public function info(){
   
    $files = get_filenames($this->folder, FALSE);
   
    if($files){
        $data['files']=$files;
            
        }else{
            $data['files']=NULL;
        }
   $this->load->view('filenames',$data);   

}
    public function enviar_notificacion()
    {       
        $destinatarios = $this->input->post('destinatarios'); 
        if(count($destinatarios)>=1)
        {
            $not = $_SESSION['notificacion'];
            $resp = $this->notificacion_model->registrar_notificacion($not);
            $resp = $this->notificacion_model->id_notificacion($not);
            $resp= $resp[0];
            foreach($destinatarios as $destinatario)
            {                
                $envio = array(
                    'id_notificacion' => $resp['id_notificacion'],
                    'ci_destinatario' => $destinatario,
                    'tipo' => 'asdc'
                );
             $this->notificacion_model->registrar_envio($envio);
            }          
            $data['main_content'] = 'notificaciones/envio_satisfactorio';
            $_SESSION['notificacion'] = null;
            $this->load->view('main_template', $data); 
        }
        else
        {
            
        }
    }
    
}