<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno_controller extends CI_Controller {
	
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
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
        $this->load->library('form_validation');
	}

    
    public function registrar_alumno()
    {
    
        $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
        $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
         $alumno = array(
                    'ci_persona'=> $this->input->post('CI'),
                    'nombre_persona' => $this->input->post('NOMBRE'),
                    'apellido_persona' => $this->input->post('APELLIDO'),
                    'telefono' => $telefonos,
                    'celular' => $celular,
                    'direccion' => $this->input->post('DIRECCION'),  
                    'email' => $this->input->post('EMAIL'),
                    'tipo' => 'Alumno'
                );   
        $usuario = array (
            'login' =>$this->input->post('LOGIN'),
            'password' =>$this->input->post('CONTRACENA')
        ); 
        $registro = $this->alumno_model->verificar_ci($alumno);    
        echo $registro;
        $registro1 = $this->persona_model->verificar_usuario($usuario);
        $MSN = $registro;
        if(!empty($registro1)){
        $MSN = $registro1;
        }
        if(strcmp( "registrar" ,$MSN)==0)
        {
            $registro = $this->alumno_model->registrar_alumno($alumno);    
            $registro1 = $this->persona_model->registrar_usuario($usuario);
            $padre_alumno = array(
                'ci_padre' => $ci_padre,
                'ci_alumno' => $alumno['ci_persona']
                    
                                 );
            $padre_alumno = $this ->persona_model->registrar_padre_alumno($padre_alumno);
            $MSN = $registro;
            $MSN = $registro1;
            $alumno = array(
                    'ci_persona'=> '',
                    'nombre_persona' => '',
                    'apellido_persona' => '',
                    'telefono' => '*',
                    'celular' => '*',
                    'direccion' => '',
                    'email' => '',
                    'tipo' => 'Alumno');
            $data['alumno'] =$alumno;
            $data['MSN'] = $MSN;
            $data['main_content'] = 'alumnos/registrar_alumno_view';
        }
        else
        {
            $data['MSN'] = $MSN;
            $data['usuario'] = $usuario;
            $data['alumno'] =$alumno;
            $data['main_content'] = 'alumnos/registrar_alumno_view';
        }
        $this->load->view('main_template', $data);  
    }
    
    public function ver_lista_hijos()
	{        
        $padre_alumno = $this->alumno_model->obtener_Padre_Alumno_ID();
       
        $alumnos = array();
        if($padre_alumno >= 1 )
        {          
            foreach($padre_alumno as $Hijo)
             {    
                $alumno = $this->alumno_model->obtener_alumno_ID($Hijo['id_alumno']);
                array_push($alumnos,$alumno[0]);              
             }
         }
        $data['lista'] = $alumnos;
        $data['main_content'] = 'alumnos/lista_hijos_views';
		$this->load->view('main_template', $data);
    }
    public function obtener_alumno_ID($id)
    {
        return $this->alumno_model->obtener_Alumno_ID($id);
    }
    public function modificar_perfil($id)
    {    
         $telefonos = $this->input->post('TELEFONO1')."*".$this->input->post('TELEFONO2');
        $celular = $this->input->post('CELULAR1')."*".$this->input->post('CELULAR2');
        $persona = array(
            'id_persona' => $id,
            'ci_persona' => $this->input->post('CI'),
            'nombre_persona' =>$this->input->post('NOMBRE'),
            'apellido_persona' => $this->input->post('APELLIDO'),
            'telefono' => $telefonos,
            'celular' => $celular,
            'direccion' => $this->input->post('DIRECCION'),
            'email' => $this->input->post('EMAIL')
        );
        if(empty($persona['ci_persona']))
        {
           $persona= $this->persona_model->persona_by_id($id);
            $persona = $persona[0];
        }
        $actualizar = $this->persona_model->obtener_persona_CI($persona);

        if( $actualizar ==1 )
            {
                
                 $MSN ="El CI ya fue registrado.";
                 $tipo ="panel panel-danger";
            }
            else
            {
                $actualizar = $this->persona_model->modificar_mi_perfil($id,$persona);
                if($actualizar)
                {
                     $MSN ="Modificacion Exitosa.";
                     $tipo ="panel panel-success";
                }
                else
                {
                    $MSN = "Verifique los datos actual.";
                     $tipo ="panel panel-danger";
                }  
            }
            
    
           
        
        $persona = $this->alumno_model->ver_perfil($id);
        $data['MSN']= $MSN ;
        $data['persona'] = $persona[0];
        $data['perfil'] = "";        
        $data['tipo']=$tipo;
        $data['contracenia'] = "";
        $data['modificarPerfil'] = "active";
        $data['main_content'] = 'alumnos/ver_perfil_alumno_view';
		$this->load->view('main_template', $data);
        
    }
    public function ver_lista_alumnos()
    {
        $persona = $this->alumno_model->ver_lista_alumnos();
        $data['alumnos'] = $persona;
        $data['main_content'] = 'alumnos/lista_alumnos_views';
		$this->load->view('main_template', $data);
    }
}
?>