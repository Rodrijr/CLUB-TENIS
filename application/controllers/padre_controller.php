<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
class Padre_controller extends CI_Controller {

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
        $data['main_content'] = 'registrar_padre';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
   
    public function registrar_padre()
    {
         $this->form_validation->set_rules('CI','CI','trim|required|xss_clean|numeric');
         $this->form_validation->set_rules('NOMBRE','NOMBRE','trim|required|xss_clean');
         $this->form_validation->set_rules('APELLIDO','APELLIDO','trim|required|xss_clean');        
         $this->form_validation->set_rules('TELEFONO','TELEFONO','trim|required|xss_clean|numeric');  
         $this->form_validation->set_rules('DIRECCION','DIRECCION','trim|required|xss_clean'); 
      //  $this->form_validation->set_rules('EMAIL','E-MAIL','valid_email|is_unique[users.email]|required');
         
          $padre = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $this->input->post('TELEFONO'),
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => 'Padre',
                );      
        if($this->form_validation->run())
        {
                  
                $registro = $this->padre_model->registrar_padre($padre);    
                $MSN = $registro;
                $data['MSN'] = $MSN;
                $data['padre'] =$padre;
                $data['main_content'] = 'padres/registrar_padres_views';
                $this->load->view('main_template', $data);            
        }
        else
        {
                $MSN = $this->form_validation->run();
                $data['MSN'] = $MSN;
                $data['padre'] =$padre;
                $data['main_content'] = 'padres/registrar_padres_views';
                $this->load->view('main_template', $data);
        }      
    }
}

