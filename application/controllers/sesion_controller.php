<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesion_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	//vista del visitante
  	public function index()
	{	
		$data['main_content'] = 'sesiones/index_bienvenida_view';
		$this->load->view('main_template', $data);
	}

	// esta funcion solo muestra el formulario para ingresar login y password
	public function login_formulario()
	{
		$data['main_content'] = 'sesiones/form_login_views';
		$this->load->view('main_template', $data);
	}

	public function verificar_login()
	{
		if(!isset($_POST['username']))
		{
			$this->login_formulario(); //si no recibimos datos por post, cargamos la vista del formulario
		}
		else
		{
			//pasamos los valores al modelo para que compruebe si existe el usuario con ese password
			$user = $this->input->post('username');
			$password = $this->input->post('password');
			$esLoginValido = $this->sesion_model->login($user,$password); 
			if($esLoginValido)
			{
				$this->iniciar_sesion($user, $password);
			}
			else
			{
				$data['error'] = TRUE;
				$data['main_content'] = 'sesiones/form_login_views';
				$this->load->view('main_template', $data);
			}
		}
	}

	function iniciar_sesion($username, $password)
	{
		$persona_usuario = $this->sesion_model->obtenerPersonaPorUsernamePassword($username,$password);
		$datos_de_session = array(
			'id_usuario' => $persona_usuario['ci_persona'],
			'nombre_usuario' => $persona_usuario['nombre_persona'].' '.$persona_usuario['apellido_persona'],
			'tipo_usuario'=> $persona_usuario['tipo']
		);
		$this->session->set_userdata($datos_de_session);
		$this->session->set_userdata('estaLogeado', TRUE);
        if(strcmp($datos_de_session['tipo_usuario'],"Padre") ||strcmp($datos_de_session['tipo_usuario'],"Alumno") )
        {
           $count = count($this->notificacion_model->ver_notificaciones());
                  $_SESSION['notif'] = $count;
              
        }
		$data['main_content'] = 'sesiones/index_bienvenida_view';
		$this->load->view('main_template', $data);
	}

	public function cerrar_sesion()
	{
		$this->session->sess_destroy();
		$datos_de_session = array(
			'estaLogeado'=> FALSE
		);
        
       if (isset($_SESSION['lista_registro'])) {
        $_SESSION['lista_registro'] = array();
       } 
        if (isset($_SESSION['count'])) {
        $_SESSION['count'] =0;
       } 
      
		$this->session->set_userdata($datos_de_session);
		$data['main_content'] = 'sesiones/index_bienvenida_view';
		$this->load->view('main_template', $data);
	}
}

?>