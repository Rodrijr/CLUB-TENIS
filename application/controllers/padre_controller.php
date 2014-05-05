<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
class Padre_controller extends CI_Controller {

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
        $data['main_content'] = 'registrar_padre';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
   
    public function registrar_padre()
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
                    'tipo' => 'Padre'
                );   
        $usuario = array (
            'login' =>$this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
        ); 
        $registro = $this->padre_model->verificar_ci($padre);    
        echo $registro;
        $registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;
        if(!empty($registro1)){
        $MSN = $registro1;
        }
        if(strcmp( "registrar" ,$MSN)==0)
        {
            $registro = $this->padre_model->registrar_padre($padre);    
            $registro1 = $this->persona_model->registrar_usuario($usuario);
            $MSN = $registro;
            $MSN = $registro1;
            $padre = array(
                    'ci_persona'=> '',
                    'nombre_persona' => '',
                    'apellido_persona' => '',
                    'telefono' => '*',
                    'celular' => '*',
                    'direccion' => '',
                    'email' => '',
                    'tipo' => 'Entrenador');
            $data['padre'] =$padre;
            $data['MSN'] = $MSN;
            $this->alumno_controller->id_padre($padre['ci_persona']);// como enviar a otra pag
            
            $data['main_content'] = 'alumno_controller/registrar_alumno';
        }
        else
        {
            $data['MSN'] = $MSN;
            $data['usuario'] = $usuario;
            $data['padre'] =$padre;
            $data['main_content'] = 'padres/registrar_padres_views';
        }
        $this->load->view('main_template', $data);  
    }
}

