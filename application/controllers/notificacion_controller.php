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
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
	}

    public function index()
	{
	}

    public function crear_notificacion()
    {
        $data['main_content'] = 'notificaciones/crear_notificacion_view';
        $this->load->view('main_template', $data);
    }
    public function seleccionar_destinatarios()
    {
        $notificacion = array(
            'asunsto' => $this->input->post('ASUNTO'),
            'cuerpo' => $this->input->post('CUERPO')
        );
        $padres  = $this->persona_model->obtener_padres();
        $grupos = $this->grupo_model->obtener_todos_los_grupos();
        $alumnos = $this->persona_model->obtener_alumnos();
        $data['main_content'] = 'notificaciones/seleccionar_destinatarios';
        $this->load->view('main_template', $data);        
    }
    
}