<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Padre_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('estaLogeado'))
        {
           
            redirect('Sesion_controller/login_formulario', 'refresh');
        }
    }

    public function index()
	{
        $data['main_content'] = 'registrar_padre';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}  
    
    
    public function vaciar_padre()
    {
     return $padre = array(
                        'ci_persona'=> '',
                        'nombre_persona' => '',
                        'apellido_persona' => '',
                        'telefono' => '*',
                        'celular' => '*',
                        'direccion' => '',
                        'email' => '',
                        'tipo' => '',
                        'estado'=> '');     
    }
    public function cargar_padre()
    { 
         if (!isset($_SESSION['lista_registro'])) {
                  $_SESSION['lista_registro'] = array();
                 
                } 
     if( count($_SESSION['lista_registro'])==0){
            $tipo= "Padre";
     }
     else
     {
        $tipo= "Alumno";
     }
$telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
$celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
        
        return $padre = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $telefonos,
                    'celular' => $celular,
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => $tipo,
                    'estado'=> 'Activo'
                );   
    }

    public function registrar_padre()
    {    
       
        $padre = $this->cargar_padre();
        $usuario = array (
            'ci_persona' => $padre['ci_persona'],
            'login' => $this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
        ); 
      
        $registro = $this->padre_model->verificar_ci($padre);    
        //$registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;        
        if(strcmp( "registrar" ,$MSN)==0)
        {           
            $registro1 = $this->persona_model->verificar_usuario($usuario);
            if(empty($registro1)){
                $MSN = $registro1;
                if (!isset($_SESSION['lista_registro'])) {
                  $_SESSION['lista_registro'] = array();
                 
                } 
                if (!isset($_SESSION['usuarios'])) {
                  $_SESSION['usuarios'] = array();
                }
                 if(!empty($padre['ci_persona']))
                {
                if (!in_array($padre, $_SESSION['lista_registro'])) {
                    if(!empty($padre['ci_persona']))
                    {   
                    array_push($_SESSION['lista_registro'],$padre);
                    }
                }
                if (!in_array($_SESSION['usuarios'],$usuario)) 
                {
                    if(!empty($usuario['login']))
                    {                     
                        array_push($_SESSION['usuarios'],$usuario);
                    }
                }
                
                echo "usuario:  ";
                    print_r($usuario);
                echo "padre:   ";
                    print_r($padre);
                }
                $MSN = "Los datos son validos, puede continuar.";
             $padre  = $this->vaciar_padre(); 
                $usuario= array(
                 'id_persona' => '',
                 'login' =>'',
                 'password' =>''
                );
            }
            }
            $data['padre'] =$padre;                
            $data['MSN'] = $MSN;
            $data['usuario'] = $usuario;
            $data['main_content'] = 'padres/registrar_padres_views';
    
        $this->load->view('main_template', $data);  
    }
    
    public function terminar_registro()
    {    
        foreach($_SESSION['lista_registro'] as $persona)
        {
            $registro = $this->padre_model->registrar_padre($persona); 
        }
        foreach($_SESSION['usuarios'] as $persona)
        {
            $registro1 = $this->persona_model->registrar_usuario($persona);
        }
        $primero = array_shift($_SESSION['lista_registro']);
        foreach($_SESSION['lista_registro'] as $persona)
        {
            $padre_alumno = array(
                'ci_padre'=> $primero['ci_persona'],
                'ci_alumno'=> $persona['ci_persona']
            );
            $registro1 = $this->persona_model->registrar_padre_alumno($padre_alumno);
        }
        
        if (isset($_SESSION['lista_registro'])) {
        $_SESSION['lista_registro'] = array();
        } 
        $data['main_content'] = 'usuarios/fin_registro';        
		$this->load->view('main_template', $data);
    }
  
}

