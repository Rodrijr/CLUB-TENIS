<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entrenador_controller extends CI_Controller{

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
        $data['main_content'] = 'registrar_entrenador';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
   
    public function registrar_entrenador()
    {
        $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
        $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
         $entrenador = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $telefonos,
                    'celular' => $celular,
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => 'Entrenador'
                );      
                        
        $registro = $this->padre_model->registrar_padre($entrenador);    
        $MSN = $registro;                    
        $data['MSN'] = $MSN;
        $data['entrenador'] =$entrenador;
        $data['main_content'] = 'entrenadores/registrar_entrenador_views';
        $this->load->view('main_template', $data);
        
        
        
        
    }
}

