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
        $notificacion = array(
            'asunsto' => $this->input->post('ASUNTO'),
            'cuerpo' => $this->input->post('CUERPO')
        );
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
    {
        $persona = array(
        'ci_persona' => $this->input->post('ci'),
        'nombre_persona'=>$this->input->post('nombre_persona'),
        'apellido_persona'=>$this->input->post('apellido_persona')
        );
        $alumnos = array();
        $alumnos = $this->persona_model->persona_ci($persona);  
        $data['alumnos'] = $alumnos;
        $data['main_content'] = 'notificaciones/seleccionar_destinatarios';
        $this->load->view('main_template', $data); 
    }
    
}