<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planilla_controller extends CI_Controller{

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
        $data['main_content'] = 'entrenadores/lista_planillas';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
    public function lista_planillas()
	{
        $data['main_content'] = 'entrenadores/lista_planillas_view';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
    public function alumnos_entrenador()
    {
        $alumnos_horario = $this->persona_model->lista_alumno_horario();
       $lista = array(); 
       // print_r($alumnos_horario);
        foreach($alumnos_horario as $alumno_horario )
        {
            foreach($alumno_horario as $alumno_ho)
            {
                $id_alumno = $alumno_ho['id_alumno'];
            $alumno = $this->alumno_model->obtener_alumno_ID($id_alumno);
           array_push($lista,$alumno[0]);
            }
        }
        $data['lista']=$lista;
        $data['main_content'] = 'entrenadores/mis_alumnos_view';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
    }
    public function registrar_evaluacion_personal($id_alumno)
    {       
        $planilla = array();
        $data['planilla']=$planilla;
        $data['main_content'] = 'planillas/evaluacion_persoanl_view';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
    }
   
        
}
?>

