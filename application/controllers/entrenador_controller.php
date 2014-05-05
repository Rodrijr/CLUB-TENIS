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
         $padre = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $telefonos,
                    'celular' => $celular,
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => 'Entrenador'
                );   
       $usuario = array (
            'login' =>$this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
                ); 
        $registro = $this->padre_model->verificar_ci($padre);    
        $registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;       
        if(!empty($registro1)){
        $MSN = $registro1;
        }
        if(strcmp( "registrar" ,$MSN)==0 && empty($registro1) )
        {
            $registro = $this->padre_model->registrar_padre($padre);    
            $per = $this->persona_model->retornar_persona_por_ci($padre);                   $per  = $per[0];
            print_r($per);
            $usuario = array (
            'id_persona' => $per['id_persona'],
            'login' =>$this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
                ); 
            print_r($usuario);
            $registro1 = $this->persona_model->registrar_usuario($usuario);
            $MSN = $registro;
            if(!empty($registro1)){
        $MSN = $registro1;
          
        }
            $padre = array(
                    'ci_persona'=> '',
                    'nombre_persona' => '',
                    'apellido_persona' => '',
                    'telefono' => '*',
                    'celular' => '*',
                    'direccion' => '',
                    'email' => '',
                    'tipo' => 'Entrenador');
            $data['entrenador'] =$padre;
             
            $data['MSN'] = $MSN;
            $data['main_content'] = 'entrenadores/registrar_entrenador_views';
            
        }
        else
        {
            $data['MSN'] = $MSN;
            $data['usuario'] = $usuario;
            $data['entrenador'] =$padre;
            $data['main_content'] = 'entrenadores/registrar_entrenador_views';
        }
        $this->load->view('main_template', $data); 
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      
        
    
    }
}

