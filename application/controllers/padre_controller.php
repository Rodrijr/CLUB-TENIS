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
        $registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;
        if(!empty($registro1)){
        $MSN = $registro1;
        }
        if(strcmp( "registrar" ,$MSN)==0)
        {
            
            array_push($lista_registro,$padre);
            //$registro = $this->padre_model->registrar_padre($padre);    
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
    

    public function registrar_padre1()
    {
        $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
        $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
        $tipo= "Padre";
         if (!isset($_SESSION['count'])) {
              $_SESSION['count'] = 0;
             $tipo= "Alumno";
            } 
            else { 
                 $tipo = "Padre";
            }
         $padre = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $telefonos,
                    'celular' => $celular,
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => $tipo
                );   
        $usuario = array (
            'login' =>$this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
        ); 
        $registro = $this->padre_model->verificar_ci($padre);    
        //$registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;
        
        if(strcmp( "registrar" ,$MSN)==0)
        {
            
            $registro1 = $this->persona_model->verificar_usuario($usuario);
            if(!empty($registro1)){
                $MSN = $registro1;
            }
            else
            {
                if (!isset($_SESSION['lista_registro'])) {
                  $_SESSION['lista_registro'] = array();
                } 
                else {   
                    if (!in_array($padre, $_SESSION['lista_registro'])) {
                       array_push($_SESSION['lista_registro'],$padre);
                    }                
                }
                if (!isset($_SESSION['usuarios'])) {
                  $_SESSION['usuarios'] = array();
                } 
                else {   
                    if (!in_array($_SESSION['usuarios'],$usuario)) { 
                        array_push($_SESSION['usuarios'],$usuario);
                    }                
                }
                $_SESSION['count']++;            
                $MSN = "Los datos son validos, puede continuar.";
                 $padre = array(
                    'ci_persona'=> '',
                    'nombre_persona' => '',
                    'apellido_persona' => '',
                    'telefono' => '*',
                    'celular' => '*',
                    'direccion' => '',
                    'email' => '',
                    'tipo' => '');
            }
           
            $data['padre'] =$padre;
            $data['MSN'] = $MSN;
            print_r($_SESSION['lista_registro']);
            $data['main_content'] = 'padres/registrar_padres_views';
        
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
    
    public function terminar_registro()
    {
        
       print_r($_SESSION['lista_registro']);
        echo "<br>";
        
        echo "<br>";
        print_r($_SESSION['usuarios']);
     echo "<br>";
            echo "holasd";
            foreach($_SESSION['lista_registro'] as $persona)
            {
               $registro = $this->padre_model->registrar_padre($persona); 
                
               $aux= $_SESSION['usuarios'];
                print_r($aux[0]);
                 echo "<br>";
            $per = $this->persona_model->retornar_persona_por_ci($persona);   
                $per  = $per[0];
                $usuario1 = array (
                'id_persona' => $per['id_persona'],
                'login' =>$aux['login'],
                'password' =>$aux['password']
                    ); 
            $registro1 = $this->persona_model->registrar_usuario($usuario1);
                    
            }
      
        
         
        $data['main_content'] = 'usuarios/fin_registro';
        
		$this->load->view('main_template', $data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

