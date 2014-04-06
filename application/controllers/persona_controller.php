<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            $data['main_content'] = 'sesiones/form_login_views';
            $this->load->view('main_template', $data);
        }
	}
    
    public function index()
	{
	}
    
    public function ver_mi_perfil()
	{       
        $persona = $this->persona_model->ver_mi_perfil();
        $data['persona'] = $persona[0];
        $data['main_content'] = 'usuarios/ver_perfil_views';
		$this->load->view('main_template', $data);
    }
    public function obtener_alumno_ID($id)
    {
        return $this->alumno_model->obtener_Alumno_ID();
    }
    public function modificar_mi_perfil()
    {
        
    }
}
?>