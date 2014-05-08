<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planilla_controller extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
    }

    public function ver_lista_de_alumnos()
    {
        $data['lista_alumnos'] = $this->alumno_model->ver_lista_alumnos();
        $data['main_content'] = 'planillas/lista_alumnos_view';
        $this->load->view('main_template', $data);
    }

    public function llenar_objetivos_de_jugador($id_alumno)
    {
        $data['id_alumno'] = $id_alumno;
        $data['main_content'] = 'planillas/objetivos_de_jugador_view';
        $this->load->view('main_template', $data);
    }
        
}
?>

