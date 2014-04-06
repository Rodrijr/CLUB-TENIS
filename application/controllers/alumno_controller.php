<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        if(!isset($this->session->userdata['username']))
        {
            $data['main_content'] = 'sesiones/form_login_views';
            $this->load->view('main_template', $data);
        }
	}
    public function index()
	{
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}
    
    public function ver_lista_hijos()
	{        
        $padre_alumno = $this->alumno_model->obtener_Padre_Alumno_ID();
        $alumnos = array();
         foreach($padre_alumno as $Hijo)
         {    
            $alumno = $this->alumno_model->obtener_alumno_ID($Hijo['id_alumno']);
            array_push($alumnos,$alumno[0]);              
         }
        $data['lista_hijos'] = $alumnos;
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
    }
    public function obtener_alumno_ID($id)
    {
        return $this->alumno_model->obtener_Alumno_ID();
    }
}
?>