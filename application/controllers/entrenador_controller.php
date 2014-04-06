<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entrenador_controller extends CI_Controller{

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
        $data['main_content'] = 'registrar_entrenador';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
   
    public function registrar_entrenador()
    {
         $this->form_validation->set_rules('CI','CI','trim|required|xss_clean|numeric');
         $this->form_validation->set_rules('NOMBRE','NOMBRE','trim|required|xss_clean');
         $this->form_validation->set_rules('APELLIDO','APELLIDO','trim|required|xss_clean');        
         $this->form_validation->set_rules('TELEFONO','TELEFONO','trim|required|xss_clean|numeric');  
         $this->form_validation->set_rules('DIRECCION','DIRECCION','trim|required|xss_clean'); 
         //$this->form_validation->set_rules('EMAIL', 'E-MAIL', 'valid_email|is_unique[users.email]|required');
         $entrenador = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $this->input->post('TELEFONO'),
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => 'Entrenador',
                );      
        if($this->form_validation->run())
        {                  
                $registro = $this->padre_model->registrar_padre($entrenador);    
                $MSN = $registro;                    
        }
        else
        {
                $MSN = $this->form_validation->run();
        }      
        $data['MSN'] = $MSN;
        $data['Entrenador'] =$entrenador;
        $data['main_content'] = 'entrenadores/registrar_entrenador_views';
        $this->load->view('main_template', $data);
        
        
        
        
    }
}

